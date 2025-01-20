<?php

use cdburgess\bggapi\Requests\Family;

it('sets allowed parameters correctly', function () {
    $family = new Family();
    expect($family->getAllowedParameters())->toBe([
        'id',
        'type',
    ]);
});

it('sets allowed types correctly', function () {
    $family = new Family();
    expect($family->getAllowedTypes())->toBe([
        'rpg',
        'rpgperiodical',
        'boardgamefamily',
    ]);
});

it('returns correct endpoint', function () {
    $family = new Family();
    expect($family->getEndpoint())->toBe('family');
});
