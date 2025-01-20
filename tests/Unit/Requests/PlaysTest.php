<?php

use cdburgess\bggapi\Requests\Plays;

it('sets allowed parameters correctly', function () {
    $plays = new Plays();
    expect($plays->getAllowedParameters())->toBe([
        'id',
        'username',
        'type',
        'mindate',
        'maxdate',
        'subtype',
        'page',
    ]);
});

it('sets allowed types correctly', function () {
    $plays = new Plays();
    expect($plays->getAllowedTypes())->toBe([
        'thing',
        'family',
    ]);
});

it('sets allowed subtypes correctly', function () {
    $plays = new Plays();
    expect($plays->getAllowedSubTypes())->toBe([
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
});

it('returns correct endpoint', function () {
    $plays = new Plays();
    expect($plays->getEndpoint())->toBe('plays');
});