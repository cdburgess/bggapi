<?php

use cdburgess\bggapi\Requests\RequestBuilder;
use cdburgess\bggapi\Validation\ExcludeSubtypeValidationStrategy;

it('validates excluded subtype', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getExcludeSubTypes')->andReturn(['subtype1', 'subtype2']);
    $strategy = new ExcludeSubtypeValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, 'subtype1'))->toBeTrue();
});

it('invalidates non-excluded subtype', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getExcludeSubTypes')->andReturn(['subtype1', 'subtype2']);
    $strategy = new ExcludeSubtypeValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, 'subtype3'))->toBeFalse();
});

it('invalidates empty subtype', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getExcludeSubTypes')->andReturn(['subtype1', 'subtype2']);
    $strategy = new ExcludeSubtypeValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, ''))->toBeFalse();
});

it('invalidates null subtype', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getExcludeSubTypes')->andReturn(['subtype1', 'subtype2']);
    $strategy = new ExcludeSubtypeValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, null))->toBeFalse();
});