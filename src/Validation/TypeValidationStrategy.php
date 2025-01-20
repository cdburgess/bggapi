<?php

namespace cdburgess\bggapi\Validation;

use cdburgess\bggapi\Contracts\ValidationStrategy;
use cdburgess\bggapi\Requests\RequestBuilder;

class TypeValidationStrategy implements ValidationStrategy
{

    public function valueIsValid(RequestBuilder $requestBuilder, $value): bool
    {
        if (!in_array($value, $requestBuilder->getAllowedTypes())) {
            return false;
        }
        return true;
    }
}
