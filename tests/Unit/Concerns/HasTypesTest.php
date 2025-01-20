<?php

use cdburgess\bggapi\Concerns\HasTypes;

it('returns allowed types', function () {
    $trait = new class {
        use HasTypes;
    };
    $trait->setAllowedTypes(['type1', 'type2']);
    expect($trait->getAllowedTypes())->toBe(['type1', 'type2']);
});

it('sets allowed types', function () {
    $trait = new class {
        use HasTypes;
    };
    $trait->setAllowedTypes(['type1', 'type2']);
    expect($trait->getAllowedTypes())->toBe(['type1', 'type2']);
});

it('handles empty allowed types', function () {
    $trait = new class {
        use HasTypes;
    };
    $trait->setAllowedTypes([]);
    expect($trait->getAllowedTypes())->toBe([]);
});

it('overwrites existing allowed types', function () {
    $trait = new class {
        use HasTypes;
    };
    $trait->setAllowedTypes(['type1']);
    $trait->setAllowedTypes(['type2']);
    expect($trait->getAllowedTypes())->toBe(['type2']);
});
