<?php

namespace cdburgess\bggapi\Requests;

use cdburgess\bggapi\Concerns\HasTypes;

/**
 * Class Thing
 *
 * @method $this id(int|string $value)
 * @method $this type(string $value)
 * @method $this versions(bool $value)
 * @method $this videos(bool $value)
 * @method $this stats(bool $value)
 * @method $this marketplace(bool $value)
 * @method $this comments(bool $value)
 * @method $this ratingcomments(bool $value)
 * @method $this page(int $value)
 * @method $this pagesize(int $value)
 * @link https://boardgamegeek.com/wiki/page/BGG_XML_API2#toc4
 */
class Thing extends RequestBuilder
{
    use HasTypes;

    public function __construct()
    {
        $this->setAllowedParameters([
            'id',
            'type',
            'versions',
            'videos',
            'stats',
            'marketplace',
            'comments',
            'ratingcomments',
            'page',
            'pagesize',
        ]);
        $this->setAllowedTypes([
            'boardgame',
            'boardgameexpansion',
            'boardgameaccessory',
            'videogame',
            'rpgitem',
            'rpgissue',
        ]);
    }

    public function getEndpoint(): string
    {
        return 'thing';
    }
}
