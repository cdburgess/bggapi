<?php

namespace cdburgess\bggapi\Requests;

use cdburgess\bggapi\Concerns\HasExcludeSubtypes;
use cdburgess\bggapi\Concerns\HasSubtypes;

/**
 * Class Collection
 *
 * @method $this username(string $value)
 * @method $this version(bool $value)
 * @method $this subtype(bool $value)
 * @method $this excludesubtype(bool $value)
 * @method $this id(int|string $value)
 * @method $this brief(int $value)
 * @method $this stats(int $value)
 * @method $this own(int $value)
 * @method $this rated(int $value)
 * @method $this played(int $value)
 * @method $this comment(int $value)
 * @method $this trade(int $value)
 * @method $this want(int $value)
 * @method $this wishlist(int $value)
 * @method $this wishlistpriority(int $value)
 * @method $this preordered(int $value)
 * @method $this wanttoplay(int $value)
 * @method $this wanttobuy(int $value)
 * @method $this prevowned(int $value)
 * @method $this hasparts(int $value)
 * @method $this wantparts(int $value)
 * @method $this minrating(int $value)
 * @method $this rating(int $value)
 * @method $this minbggrating(int $value)
 * @method $this bggrating(int $value)
 * @method $this minplays(int $value)
 * @method $this maxplays(int $value)
 * @method $this showprivate(int $value)
 * @method $this collid(int $value)
 * @method $this modifiedsince(string $value)
 * https://boardgamegeek.com/wiki/page/BGG_XML_API2#toc12
 */
class Collection extends RequestBuilder
{
    use HasSubtypes;
    use HasExcludeSubtypes;

    public function __construct()
    {
        $this->setAllowedParameters([
            'username',
            'version',
            'subtype',
            'excludesubtype',
            'id',
            'brief',
            'stats',
            'own',
            'rated',
            'played',
            'comment',
            'trade',
            'want',
            'wishlist',
            'wishlistpriority',
            'preordered',
            'wanttoplay',
            'wanttobuy',
            'prevowned',
            'hasparts',
            'wantparts',
            'minrating',
            'rating',
            'minbggrating',
            'bggrating',
            'minplays',
            'maxplays',
            'showprivate',
            'collid',
            'modifiedsince',
        ]);
        $this->setAllowedSubTypes([
            'boardgame',
            'boardgameexpansion',
            'boardgameaccessory',
            'rpgitem',
            'rpgissue',
            'videogame',
        ]);
        $this->setExcludeSubTypes([
            'boardgame',
            'boardgameexpansion',
            'boardgameaccessory',
            'rpgitem',
            'rpgissue',
            'videogame',
        ]);
    }

    public function getEndpoint(): string
    {
        return 'collection';
    }
}
