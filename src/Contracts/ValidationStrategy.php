<?php

namespace cdburgess\bggapi\Contracts;

use cdburgess\bggapi\Requests\RequestBuilder;

interface ValidationStrategy
{
    public function valueIsValid(RequestBuilder $requestBuilder, $value): bool;
}
