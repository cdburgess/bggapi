<?php

use cdburgess\bggapi\Requests\RequestBuilder;
use cdburgess\bggapi\Validation\DomainValidationStrategy;

it('validates allowed domain', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getAllowedDomains')->andReturn(['domain1', 'domain2']);
    $strategy = new DomainValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, 'domain1'))->toBeTrue();
});

it('invalidates disallowed domain', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getAllowedDomains')->andReturn(['domain1', 'domain2']);
    $strategy = new DomainValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, 'domain3'))->toBeFalse();
});

it('invalidates empty domain', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getAllowedDomains')->andReturn(['domain1', 'domain2']);
    $strategy = new DomainValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, ''))->toBeFalse();
});

it('invalidates null domain', function () {
    $requestBuilder = Mockery::mock(RequestBuilder::class);
    $requestBuilder->shouldReceive('getAllowedDomains')->andReturn(['domain1', 'domain2']);
    $strategy = new DomainValidationStrategy();
    expect($strategy->valueIsValid($requestBuilder, null))->toBeFalse();
});