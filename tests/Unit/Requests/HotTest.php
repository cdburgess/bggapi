<?php

use cdburgess\bggapi\Requests\Hot;

it('sets allowed parameters correctly', function () {
    $hot = new Hot();
    expect($hot->getAllowedParameters())->toBe([
        'type',
    ]);
});

it('sets allowed types correctly', function () {
    $hot = new Hot();
    expect($hot->getAllowedTypes())->toBe([
        'boardgame',
        'rpg',
        'videogame',
        'boardgameperson',
        'rpgperson',
        'boardgamecompany',
        'rpgcompany',
        'videogamecompany',
    ]);
});

it('returns correct endpoint', function () {
    $hot = new Hot();
    expect($hot->getEndpoint())->toBe('hot');
});