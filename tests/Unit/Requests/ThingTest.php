<?php

use cdburgess\bggapi\Requests\Thing;

it('sets allowed parameters correctly', function () {
    $thing = new Thing();
    $allowedParameters = $thing->getAllowedParameters();
    expect($allowedParameters)->toBe([
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
});

it('sets ID in parameters list', function () {
    $thing = new Thing();
    $thing->id(123);
    expect($thing->getParam('id'))->toBe(123);
});

it('sets TYPE in parameters list', function () {
    $thing = new Thing();
    $thing->type('boardgame');
    expect($thing->getParam('type'))->toBe('boardgame');
});

it('sets allowed types correctly', function () {
    $thing = new Thing();
    $allowedTypes = $thing->getAllowedTypes();
    expect($allowedTypes)->toBe([
        'boardgame',
        'boardgameexpansion',
        'boardgameaccessory',
        'videogame',
        'rpgitem',
        'rpgissue',
    ]);
});

it('returns correct endpoint', function () {
    $thing = new Thing();
    $endpoint = $thing->getEndpoint();
    expect($endpoint)->toBe('thing');
});

it('throws exception for invalid parameter', function () {
    $thing = new Thing();
    expect(fn() => $thing->invalidParameterMethod('value'))->toThrow(\InvalidArgumentException::class);
});

it('throws exception for invalid type', function () {
    $thing = new Thing();
    expect(fn() => $thing->type('invalidType'))->toThrow(\InvalidArgumentException::class);
});
