<?php

use cdburgess\bggapi\Requests\RequestBuilder;
use cdburgess\bggapi\Validation\SubTypeValidationStrategy;

it('validates allowed subtype', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getAllowedSubTypes')->andReturn(['subtype1', 'subtype2']);
    $strategy = new SubTypeValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, 'subtype1'))->toBeTrue();
});

it('invalidates disallowed subtype', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getAllowedSubTypes')->andReturn(['subtype1', 'subtype2']);
    $strategy = new SubTypeValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, 'subtype3'))->toBeFalse();
});

it('invalidates empty subtype', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getAllowedSubTypes')->andReturn(['subtype1', 'subtype2']);
    $strategy = new SubTypeValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, ''))->toBeFalse();
});

it('invalidates null subtype', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getAllowedSubTypes')->andReturn(['subtype1', 'subtype2']);
    $strategy = new SubTypeValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, null))->toBeFalse();
});
