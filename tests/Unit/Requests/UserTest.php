<?php

use cdburgess\bggapi\Requests\User;

it('sets allowed parameters correctly', function () {
    $user = new User();
    expect($user->getAllowedParameters())->toBe([
        'name',
        'buddies',
        'guilds',
        'hot',
        'top',
        'domain',
        'page',
    ]);
});

it('sets allowed domains correctly', function () {
    $user = new User();
    expect($user->getAllowedDomains())->toBe([
        'boardgame',
        'rpg',
        'videogame',
    ]);
});

it('returns correct endpoint', function () {
    $user = new User();
    expect($user->getEndpoint())->toBe('user');
});