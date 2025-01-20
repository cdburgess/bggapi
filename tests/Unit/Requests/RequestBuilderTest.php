<?php

use cdburgess\bggapi\Requests\RequestBuilder;

it('adds valid query parameter', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class)->makePartial();
    $requestBuilder->shouldReceive('getAllowedParameters')->andReturn(['validparam']);
    $requestBuilder->addQueryParam('validparam', 'value');
    expect($requestBuilder->getParam('validparam'))->toBe('value');
});

it('throws exception for invalid query parameter', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class)->makePartial();
    $requestBuilder->shouldReceive('getAllowedParameters')->andReturn(['validparam']);
    expect(fn() => $requestBuilder->addQueryParam('invalidparam', 'value'))->toThrow(InvalidArgumentException::class);
});

it('formats data to array', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class)->makePartial();
    $requestBuilder->toArray();
    $xml = new SimpleXMLElement('<root><child>value</child></root>');
    expect($requestBuilder->formatData($xml))->toBe(['child' => 'value']);
});

it('formats data to json', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class)->makePartial();
    $requestBuilder->toJson();
    $xml = new SimpleXMLElement('<root><child>value</child></root>');
    expect($requestBuilder->formatData($xml))->toBe('{"child":"value"}');
});

it('formats data to xml by default', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class)->makePartial();
    $xml = new SimpleXMLElement('<root><child>value</child></root>');
    expect($requestBuilder->formatData($xml))->toBe($xml);
});

it('returns true when response is not 200 OK and retry count is less than max retries', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class)->makePartial();
    $requestBuilder->shouldAllowMockingProtectedMethods();
    $reflection = new ReflectionClass($requestBuilder);

    $sleep = $reflection->getProperty('sleep');
    $sleep->setAccessible(true);
    $sleep->setValue($requestBuilder, 0);

    $retryCount = $reflection->getProperty('retryCount');
    $retryCount->setAccessible(true);
    $retryCount->setValue($requestBuilder,1);

    $response = ['HTTP/1.1 202 Accepted'];
    expect($requestBuilder->shouldRetry($response))->toBeTrue();
});

it('returns false when response is 200 OK', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class)->makePartial();
    $requestBuilder->shouldAllowMockingProtectedMethods();
    $response = ['HTTP/1.1 200 OK'];
    expect($requestBuilder->shouldRetry($response))->toBeFalse();
});

it('throws exception when max retries is exceeded', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class)->makePartial();
    $requestBuilder->shouldAllowMockingProtectedMethods();
    $reflection = new ReflectionClass($requestBuilder);

    $sleep = $reflection->getProperty('sleep');
    $sleep->setAccessible(true);
    $sleep->setValue($requestBuilder, 0);

    $retryCount = $reflection->getProperty('retryCount');
    $retryCount->setAccessible(true);
    $retryCount->setValue($requestBuilder,500);

    $response = ['HTTP/1.1 202 Accepted'];
    expect(fn() => $requestBuilder->shouldRetry($response))->toThrow(Exception::class, 'Retry max reached!');
});

