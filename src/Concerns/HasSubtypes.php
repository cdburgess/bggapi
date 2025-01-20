<?php

namespace cdburgess\bggapi\Concerns;

trait HasSubtypes
{
    protected array $allowedSubTypes;

    public function getAllowedSubTypes(): array
    {
        return $this->allowedSubTypes;
    }

    public function setAllowedSubTypes(array $value): void
    {
        $this->allowedSubTypes = $value;
    }
}
