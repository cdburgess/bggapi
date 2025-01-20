<?php

use cdburgess\bggapi\Requests\Search;

it('sets allowed parameters correctly', function () {
    $search = new Search();
    expect($search->getAllowedParameters())->toBe([
        'query',
        'type',
        'exact',
    ]);
});

it('sets allowed types correctly', function () {
    $search = new Search();
    expect($search->getAllowedTypes())->toBe([
        'rpgitem',
        'videogame',
        'boardgame',
        'boardgameaccessory',
        'boardgameexpansion',
        'boardgamedesigner',
    ]);
});

it('returns correct endpoint', function () {
    $search = new Search();
    expect($search->getEndpoint())->toBe('search');
});