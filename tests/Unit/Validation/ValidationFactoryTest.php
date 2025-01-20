<?php

use cdburgess\bggapi\Validation\DomainValidationStrategy;
use cdburgess\bggapi\Validation\ExcludeSubtypeValidationStrategy;
use cdburgess\bggapi\Validation\SubTypeValidationStrategy;
use cdburgess\bggapi\Validation\TypeValidationStrategy;
use cdburgess\bggapi\Validation\ValidationFactory;

it('returns DomainValidationStrategy for domain', function () {
    $validation = ValidationFactory::getValidation('domain');
    expect($validation)->toBeInstanceOf(DomainValidationStrategy::class);
});

it('returns TypeValidationStrategy for type', function () {
    $validation = ValidationFactory::getValidation('type');
    expect($validation)->toBeInstanceOf(TypeValidationStrategy::class);
});

it('returns SubTypeValidationStrategy for subtype', function () {
    $validation = ValidationFactory::getValidation('subtype');
    expect($validation)->toBeInstanceOf(SubTypeValidationStrategy::class);
});

it('returns ExcludeSubtypeValidationStrategy for excludesubtype', function () {
    $validation = ValidationFactory::getValidation('excludesubtype');
    expect($validation)->toBeInstanceOf(ExcludeSubtypeValidationStrategy::class);
});

it('throws exception for unknown validation strategy', function () {
    expect(fn() => ValidationFactory::getValidation('unknown'))
        ->toThrow(\Exception::class, 'Validation strategy does not exist.');
});