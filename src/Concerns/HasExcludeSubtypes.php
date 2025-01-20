<?php

namespace cdburgess\bggapi\Concerns;

trait HasExcludeSubtypes
{
    protected array $excludeSubTypes;

    public function getExcludeSubTypes(): array
    {
        return $this->excludeSubTypes;
    }

    public function setExcludeSubTypes(array $value): void
    {
        $this->excludeSubTypes = $value;
    }
}
