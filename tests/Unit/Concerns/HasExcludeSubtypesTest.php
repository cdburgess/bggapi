<?php

use cdburgess\bggapi\Concerns\HasExcludeSubtypes;

it('returns exclude subtypes', function () {
    $trait = new class {
        use HasExcludeSubtypes;
    };
    $trait->setExcludeSubTypes(['type1', 'type2']);
    expect($trait->getExcludeSubTypes())->toBe(['type1', 'type2']);
});

it('sets exclude subtypes', function () {
    $trait = new class {
        use HasExcludeSubtypes;
    };
    $trait->setExcludeSubTypes(['type1', 'type2']);
    expect($trait->getExcludeSubTypes())->toBe(['type1', 'type2']);
});

it('handles empty exclude subtypes', function () {
    $trait = new class {
        use HasExcludeSubtypes;
    };
    $trait->setExcludeSubTypes([]);
    expect($trait->getExcludeSubTypes())->toBe([]);
});

it('overwrites existing exclude subtypes', function () {
    $trait = new class {
        use HasExcludeSubtypes;
    };
    $trait->setExcludeSubTypes(['type1']);
    $trait->setExcludeSubTypes(['type2']);
    expect($trait->getExcludeSubTypes())->toBe(['type2']);
});
