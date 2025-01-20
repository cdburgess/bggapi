<?php

use cdburgess\bggapi\Requests\Collection;

it('sets allowed parameters correctly', function () {
    $collection = new Collection();
    expect($collection->getAllowedParameters())->toBe([
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
});

it('sets allowed subtypes correctly', function () {
    $collection = new Collection();
    expect($collection->getAllowedSubTypes())->toBe([
        'boardgame',
        'boardgameexpansion',
        'boardgameaccessory',
        'rpgitem',
        'rpgissue',
        'videogame',
    ]);
});

it('sets exclude subtypes correctly', function () {
    $collection = new Collection();
    expect($collection->getExcludeSubTypes())->toBe([
        'boardgame',
        'boardgameexpansion',
        'boardgameaccessory',
        'rpgitem',
        'rpgissue',
        'videogame',
    ]);
});

it('returns correct endpoint', function () {
    $collection = new Collection();
    expect($collection->getEndpoint())->toBe('collection');
});


