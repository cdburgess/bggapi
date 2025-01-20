<?php

namespace cdburgess\bggapi\Requests;

use cdburgess\bggapi\Concerns\HasTypes;

class ForumList extends RequestBuilder
{
    use HasTypes;

    /**
     * Class ForumList
     *
     * @method $this id(int $value)
     * @method $this type(string $value)
     * https://boardgamegeek.com/wiki/page/BGG_XML_API2#toc6
     */
    public function __construct()
    {
        $this->setAllowedParameters([
            'id',
            'type',
        ]);
        $this->setAllowedTypes([
            'thing',
            'family',
        ]);
    }

    public function getEndpoint(): string
    {
        return 'forumlist';
    }
}
