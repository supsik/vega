<?php

namespace App\Menu;

use App\Support\Traits\Makeable;
use Illuminate\Support\Collection;

class MenuItem
{
    use Makeable;

    public function __construct(
        protected string $label,
        protected string|null $link = null,
        protected array $children = []
    )
    {
    }

    public function label(): string
    {
        return $this->label;
    }

    public function link(): string|null
    {
        return $this->link;
    }

    public function isDropdown(): bool
    {
        return $this->children()->count() > 0;
    }

    public function children(): Collection
    {
        return collect($this->children);
    }
}
