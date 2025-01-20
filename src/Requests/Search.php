<?php

namespace cdburgess\bggapi\Requests;

use cdburgess\bggapi\Concerns\HasTypes;

/**
 * Class Search
 *
 * @method $this query(string $value)
 * @method $this type(string $value)
 * @method $this exact(int $value)
 * https://boardgamegeek.com/wiki/page/BGG_XML_API2#toc15
 */
class Search extends RequestBuilder
{

    use HasTypes;

    public function __construct()
    {
        $this->setAllowedParameters([
            'query',
            'type',
            'exact',
        ]);
        $this->setAllowedTypes([
            'rpgitem',
            'videogame',
            'boardgame',
            'boardgameaccessory',
            'boardgameexpansion',
            'boardgamedesigner',
        ]);
    }

    public function getEndpoint(): string
    {
        return 'search';
    }
}
