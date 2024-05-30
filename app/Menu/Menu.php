<?php

namespace App\Menu;

use App\Support\Traits\Makeable;
use Countable;
use Illuminate\Support\Collection;
use IteratorAggregate;
use Traversable;

class Menu implements IteratorAggregate, Countable
{
    use Makeable;

    protected array $items;

    public function __construct(MenuItem ...$items)
    {
        $this->items = $items;
    }

    public function all(): Collection
    {
        return Collection::make($this->items);
    }

    public function add(MenuItem $item): static
    {
        $this->items[] = $item;

        return $this;
    }

    public function addIf(bool|callable $condition, MenuItem $item): static
    {
        if (is_callable($condition) ? $condition() : $condition) {
            $this->items[] = $item;
        }

        return $this;
    }

    public function remove(MenuItem $item): static
    {
        $this->items = $this->all()
            ->filter(fn(MenuItem $current) => $current !== $item)
            ->toArray();

        return $this;
    }

    public function removeByLink(string $link): static
    {
        $this->items = $this->all()
            ->filter(fn(MenuItem $current) => $current->link() !== $link)
            ->toArray();

        return $this;
    }

    public function getIterator(): Traversable
    {
        return $this->all();
    }

    public function count(): int
    {
        return count($this->items);
    }
}