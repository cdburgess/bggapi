<?php

use cdburgess\bggapi\Requests\RequestBuilder;
use cdburgess\bggapi\Validation\TypeValidationStrategy;

it('validates allowed type', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getAllowedTypes')->andReturn(['type1', 'type2']);
    $strategy = new TypeValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, 'type1'))->toBeTrue();
});

it('invalidates disallowed type', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getAllowedTypes')->andReturn(['type1', 'type2']);
    $strategy = new TypeValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, 'type3'))->toBeFalse();
});

it('invalidates empty type', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getAllowedTypes')->andReturn(['type1', 'type2']);
    $strategy = new TypeValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, ''))->toBeFalse();
});

it('invalidates null type', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getAllowedTypes')->andReturn(['type1', 'type2']);
    $strategy = new TypeValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, null))->toBeFalse();
});
