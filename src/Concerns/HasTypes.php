<?php

namespace cdburgess\bggapi\Concerns;

trait HasTypes
{
    protected array $allowedTypes;

    public function getAllowedTypes(): array
    {
        return $this->allowedTypes;
    }

    public function setAllowedTypes(array $value): void
    {
        $this->allowedTypes = $value;
    }
}
