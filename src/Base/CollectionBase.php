<?php

namespace Renderforest\Base;

use Laminas\Stdlib\ArraySerializableInterface;

/**
 * Class CollectionBase
 * @package Renderforest\Base
 */
abstract class CollectionBase implements ArraySerializableInterface, \Countable, \Iterator
{
    /** @var int */
    protected $iteratorPosition;

    /** @var int */
    protected $iteratorItems;

    /**
     * CollectionBase constructor.
     */
    public function __construct()
    {
        $this->iteratorPosition = 0;
        $this->iteratorItems = [];
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->iteratorItems);
    }

    public function current(): mixed
    {
        return $this->iteratorItems[$this->iteratorPosition];
    }

    public function next(): void
    {
        ++$this->iteratorPosition;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->iteratorPosition;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->iteratorItems[$this->iteratorPosition]);
    }

    public function rewind(): void
    {
        $this->iteratorPosition = 0;
    }
}
