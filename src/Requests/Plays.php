<?php

namespace cdburgess\bggapi\Requests;

use cdburgess\bggapi\Concerns\HasSubtypes;
use cdburgess\bggapi\Concerns\HasTypes;

class Plays extends RequestBuilder
{
    use HasTypes;
    use HasSubtypes;

    public function __construct()
    {
        $this->setAllowedParameters([
            'id',
            'username',
            'type',
            'mindate',
            'maxdate',
            'subtype',
            'page',
        ]);
        $this->setAllowedTypes([
            'thing',
            'family',
        ]);
        $this->setAllowedSubTypes([
            'boardgame',
            'boardgameexpansion',
            'boardgameaccessory',
            'boardgameintegration',
            'boardgamecompilation',
            'boardgameimplementation',
            'rpg',
            'rpgitem',
            'videogame',
        ]);
    }

    public function getEndpoint(): string
    {
        return 'plays';
    }
}
