<?php

namespace cdburgess\bggapi\Validation;

use cdburgess\bggapi\Contracts\ValidationStrategy;
use cdburgess\bggapi\Requests\RequestBuilder;

class ExcludeSubtypeValidationStrategy implements ValidationStrategy
{

    public function valueIsValid(RequestBuilder $requestBuilder, $value): bool
    {
        if (!in_array($value, $requestBuilder->getExcludeSubTypes())) {
            return false;
        }
        return true;
    }
}
