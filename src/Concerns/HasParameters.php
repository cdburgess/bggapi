<?php

namespace cdburgess\bggapi\Concerns;

trait HasParameters
{
    protected array $allowedParameters;

    public function getAllowedParameters(): array
    {
        return $this->allowedParameters;
    }

    public function setAllowedParameters(array $value): void
    {
        $this->allowedParameters = $value;
    }
}
