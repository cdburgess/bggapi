<?php

use cdburgess\bggapi\Concerns\HasParameters;

it('returns allowed parameters', function () {
    $trait = new class {
        use HasParameters;
    };
    $trait->setAllowedParameters(['param1', 'param2']);
    expect($trait->getAllowedParameters())->toBe(['param1', 'param2']);
});

it('sets allowed parameters', function () {
    $trait = new class {
        use HasParameters;
    };
    $trait->setAllowedParameters(['param1', 'param2']);
    expect($trait->getAllowedParameters())->toBe(['param1', 'param2']);
});

it('handles empty allowed parameters', function () {
    $trait = new class {
        use HasParameters;
    };
    $trait->setAllowedParameters([]);
    expect($trait->getAllowedParameters())->toBe([]);
});

it('overwrites existing allowed parameters', function () {
    $trait = new class {
        use HasParameters;
    };
    $trait->setAllowedParameters(['param1']);
    $trait->setAllowedParameters(['param2']);
    expect($trait->getAllowedParameters())->toBe(['param2']);
});
