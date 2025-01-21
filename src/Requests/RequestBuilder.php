<?php

namespace cdburgess\bggapi\Requests;

use cdburgess\bggapi\Concerns\HasParameters;
use cdburgess\bggapi\Validation\ValidationFactory;
use InvalidArgumentException;
use SimpleXMLElement;

abstract class RequestBuilder
{
    use HasParameters;

    protected array $params = [];
    protected string $baseUrl = 'https://www.boardgamegeek.com/xmlapi2';
    protected int $retries = 2;
    protected int $retryCount = 0;
    protected string $format = 'xml';
    protected int $sleep = 4;

    abstract public function getEndpoint(): string;

    /**
     * __call
     *
     * @param $name
     * @param $arguments
     * @return $this|self
     */
    public function __call($name, $arguments)
    {
        if (is_array($arguments[0])) {
            $arguments[0] = implode(',', $arguments[0]);
        }
        return $this->addQueryParam($name, $arguments[0]);
    }

    /**
     * getParam
     *
     * @param  string  $paramName
     * @return mixed
     */
    public function getParam(string $paramName): mixed
    {
        return $this->params[$paramName] ?? null;
    }

    /**
     * addQueryParam
     *
     * @param $param
     * @param $value
     * @return $this
     */
    public function addQueryParam($param, $value): self
    {
        $key = strtolower($param);

        if (!$this->paramIsValid($key)) {
            throw new InvalidArgumentException("Invalid query parameter key: " . $param);
        }

        // not all values are validated
        if (!$this->hasValidValue($key, $value)) {
            throw new InvalidArgumentException("Invalid value for param: " . $key . '=>' . $value);
        }

        $this->params[$param] = $value;
        return $this;
    }

    /**
     * paramIsValid
     *
     * @param  string  $key
     * @return bool
     */
    private function paramIsValid(string $key): bool
    {
        return in_array($key, $this->getAllowedParameters());
    }

    /**
     * hasValidValue
     *
     * @param  string  $key
     * @param $value
     * @return bool
     */
    private function hasValidValue(string $key, $value): bool
    {
        try {
            $validation = ValidationFactory::getValidation($key);
            return $validation->valueIsValid($this, $value);
        } catch (\Exception $e) {
            // validation is not implemented for this parameter
        }
        return true;
    }

    /**
     * toArray
     * - set output format to Array
     * @return $this
     */
    public function toArray(): self
    {
        $this->format = 'array';
        return $this;
    }

    /**
     * toJson
     * - set output format to Json
     * @return $this
     */
    public function toJson(): self
    {
        $this->format = 'json';
        return $this;
    }

    /**
     * formatData
     * - Format the data to the specified format (XML default)
     * @param  SimpleXMLElement  $xml
     * @return array|false|SimpleXMLElement|string
     */
    protected function formatData(\SimpleXMLElement $xml)
    {
        return match ($this->format) {
            'array' => $this->toArrayFormat($xml),
            'json' => json_encode($this->toArrayFormat($xml)),
            default => $xml,
        };
    }

    /**
     * sendRequest
     *
     * @return \SimpleXMLElement
     * @throws \Exception
     */
    public function send()
    {
        $url = sprintf('%s/%s?%s', $this->baseUrl, $this->getEndpoint(), http_build_query($this->params));
        $xml = simplexml_load_file($url);
        if ($this->shouldRetry($http_response_header)) {
            return $this->send();
        }
        if (!$xml instanceof \SimpleXMLElement) {
            throw new \Exception('API call failed');
        }
        $this->retryCount = 0;
        return $this->formatData($xml);
    }

    /**
     * shouldRetry
     * This is specifically for the Collection request, but it's ok to check all requests
     *
     * @param  array  $response
     * @return bool
     * https://boardgamegeek.com/wiki/page/BGG_XML_API2#toc12
     */
    protected function shouldRetry(array $response): bool
    {
        if (in_array('HTTP/1.1 200 OK', $response)) {
            return false;
        }
        if ($this->retryCount >= $this->retries) {
            throw new \Exception('Retry max reached!');
        }
        $this->retryCount++;
        sleep($this->sleep);
        return true;
    }

    /**
     * toArrayFormat
     *
     * @param $sxe
     * @return array|string
     */
    private function toArrayFormat(SimpleXMLElement $sxe)
    {
        $extract = [];

        // Extract attributes
        foreach ($sxe->attributes() as $key => $value) {
            $extract[$key] = strval($value);
        }

        // Extract children
        foreach ($sxe->children() as $key => $value) {
            if (isset($extract[$key])) {
                if (!isset($extract[$key][0])) {
                    $tmp_extract = $extract[$key];
                    $extract[$key] = array();
                    $extract[$key][0] = $tmp_extract;
                }
                $extract[$key][] = $this->toArrayFormat($value);
            } else {
                $extract[$key] =  $this->toArrayFormat($value);
            }
        }

        // Extract text content if no children
        if (empty($extract) && strval($sxe) !== '') {
            $extract = strval($sxe);
        }

        return $extract;
    }
}
