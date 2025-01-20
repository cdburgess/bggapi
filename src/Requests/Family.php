<?php

namespace cdburgess\bggapi\Requests;

use cdburgess\bggapi\Concerns\HasTypes;

class Family extends RequestBuilder
{

    use HasTypes;

    /**
     * Class Family
     *
     * @method $this id(int|string $value)
     * @method $this type(string $value)
     * https://boardgamegeek.com/wiki/page/BGG_XML_API2#toc5
     */
    public function __construct()
    {
        $this->setAllowedParameters([
            'id',
            'type',
        ]);
        $this->setAllowedTypes([
            'rpg',
            'rpgperiodical',
            'boardgamefamily',
        ]);
    }

    public function getEndpoint(): string
    {
        return 'family';
    }
}
