<?php

namespace cdburgess\bggapi\Concerns;

trait HasDomains
{
    protected array $allowedDomains;

    public function getAllowedDomains(): array
    {
        return $this->allowedDomains;
    }

    public function setAllowedDomains(array $value): void
    {
        $this->allowedDomains = $value;
    }
}
