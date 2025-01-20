<?php

namespace cdburgess\bggapi\Requests;

/**
 * Class Forum
 *
 * @method $this id(int $value)
 * @method $this page(int $value)
 * https://boardgamegeek.com/wiki/page/BGG_XML_API2#toc7
 */
class Forum extends RequestBuilder
{
    public function __construct()
    {
        $this->setAllowedParameters([
            'id',
            'page',
        ]);
    }

    public function getEndpoint(): string
    {
        return 'forum';
    }
}
