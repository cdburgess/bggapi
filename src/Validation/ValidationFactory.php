<?php

namespace cdburgess\bggapi\Validation;

use cdburgess\bggapi\Contracts\ValidationStrategy;

class ValidationFactory
{
    public static function getValidation(string $name): ValidationStrategy
    {
        return match ($name) {
            'domain' => new DomainValidationStrategy(),
            'type' => new TypeValidationStrategy(),
            'subtype' => new SubTypeValidationStrategy(),
            'excludesubtype' => new ExcludeSubtypeValidationStrategy(),
            default => throw new \Exception('Validation strategy does not exist.'),
        };
    }
}
