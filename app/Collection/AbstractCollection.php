<?php

declare(strict_types=1);

namespace App\Collection;

use App\Model\ModelInterface;

abstract class AbstractCollection implements CollectionInterface
{
    /**
     * @var int
     */
    protected $offset = 0;

    /**
     * @var int
     */
    protected $limit = self::LIMIT;

    /**
     * @var ModelInterface[]
     */
    protected $items = [];

    /**
     * @var int
     */
    protected $count = 0;

    /**
     * @param int $offset
     */
    public function setOffset(int $offset)
    {
        $this->offset = $offset;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $limit
     */
    public function setLimit(int $limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $count
     */
    public function setCount(int $count)
    {
        $this->count = $count;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param ModelInterface[]
     */
    public function setItems(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return ModelInterface[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
