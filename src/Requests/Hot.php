<?php

namespace cdburgess\bggapi\Requests;

use cdburgess\bggapi\Concerns\HasTypes;

/**
 * Class Hot
 *
 * @method $this type(string $value)
 * https://boardgamegeek.com/wiki/page/BGG_XML_API2#toc13
 */
class Hot extends RequestBuilder
{
    use HasTypes;

    public function __construct()
    {
        $this->setAllowedParameters([
            'type',
        ]);
        $this->setAllowedTypes([
            'boardgame',
            'rpg',
            'videogame',
            'boardgameperson',
            'rpgperson',
            'boardgamecompany',
            'rpgcompany',
            'videogamecompany',
        ]);
    }

    public function getEndpoint(): string
    {
        return 'hot';
    }
}
