<?php

use cdburgess\bggapi\Concerns\HasSubtypes;

it('returns allowed subtypes', function () {
    $trait = new class {
        use HasSubtypes;
    };
    $trait->setAllowedSubTypes(['subtype1', 'subtype2']);
    expect($trait->getAllowedSubTypes())->toBe(['subtype1', 'subtype2']);
});

it('sets allowed subtypes', function () {
    $trait = new class {
        use HasSubtypes;
    };
    $trait->setAllowedSubTypes(['subtype1', 'subtype2']);
    expect($trait->getAllowedSubTypes())->toBe(['subtype1', 'subtype2']);
});

it('handles empty allowed subtypes', function () {
    $trait = new class {
        use HasSubtypes;
    };
    $trait->setAllowedSubTypes([]);
    expect($trait->getAllowedSubTypes())->toBe([]);
});

it('overwrites existing allowed subtypes', function () {
    $trait = new class {
        use HasSubtypes;
    };
    $trait->setAllowedSubTypes(['subtype1']);
    $trait->setAllowedSubTypes(['subtype2']);
    expect($trait->getAllowedSubTypes())->toBe(['subtype2']);
});
