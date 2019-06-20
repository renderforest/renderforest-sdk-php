<?php

namespace Renderforest\Base;

use Zend\Stdlib\ArraySerializableInterface;

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

    public function current()
    {
        return $this->iteratorItems[$this->iteratorPosition];
    }

    public function next()
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

    public function rewind()
    {
        $this->iteratorPosition = 0;
    }
}
