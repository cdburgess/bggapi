<?php

use cdburgess\bggapi\Validation\DomainValidationStrategy;
use cdburgess\bggapi\Validation\ExcludeSubtypeValidationStrategy;
use cdburgess\bggapi\Validation\SubTypeValidationStrategy;
use cdburgess\bggapi\Validation\TypeValidationStrategy;
use cdburgess\bggapi\Validation\ValidationFactory;

it('returns domain validation strategy', function () {
    $strategy = ValidationFactory::getValidation('domain');
    expect($strategy)->toBeInstanceOf(DomainValidationStrategy::class);
});

it('returns type validation strategy', function () {
    $strategy = ValidationFactory::getValidation('type');
    expect($strategy)->toBeInstanceOf(TypeValidationStrategy::class);
});

it('returns subtype validation strategy', function () {
    $strategy = ValidationFactory::getValidation('subtype');
    expect($strategy)->toBeInstanceOf(SubTypeValidationStrategy::class);
});

it('returns exclude subtype validation strategy', function () {
    $strategy = ValidationFactory::getValidation('excludesubtype');
    expect($strategy)->toBeInstanceOf(ExcludeSubtypeValidationStrategy::class);
});

it('throws exception for unknown validation strategy', function () {
    expect(fn() => ValidationFactory::getValidation('unknown'))
        ->toThrow(\Exception::class, 'Validation strategy does not exist.');
});