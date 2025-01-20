<?php

use cdburgess\bggapi\Concerns\HasDomains;

it('returns allowed domains', function () {
    $trait = new class {
        use HasDomains;
    };
    $trait->setAllowedDomains(['family', 'thing']);
    expect($trait->getAllowedDomains())->toBe(['family', 'thing']);
});

it('sets allowed domains', function () {
    $trait = new class {
        use HasDomains;
    };
    $trait->setAllowedDomains(['family', 'thing']);
    expect($trait->getAllowedDomains())->toBe(['family', 'thing']);
});

it('handles empty allowed domains', function () {
    $trait = new class {
        use HasDomains;
    };
    $trait->setAllowedDomains([]);
    expect($trait->getAllowedDomains())->toBe([]);
});

it('overwrites existing allowed domains', function () {
    $trait = new class {
        use HasDomains;
    };
    $trait->setAllowedDomains(['family']);
    $trait->setAllowedDomains(['thing']);
    expect($trait->getAllowedDomains())->toBe(['thing']);
});