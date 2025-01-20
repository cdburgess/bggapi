<?php

namespace cdburgess\bggapi\Requests;

use cdburgess\bggapi\Concerns\HasDomains;

class User extends RequestBuilder
{
    use HasDomains;

    public function __construct()
    {
        $this->setAllowedParameters([
            'name',
            'buddies',
            'guilds',
            'hot',
            'top',
            'domain',
            'page',
        ]);
        $this->setAllowedDomains([
            'boardgame',
            'rpg',
            'videogame',
        ]);
    }

    public function getEndpoint(): string
    {
        return 'user';
    }
}
