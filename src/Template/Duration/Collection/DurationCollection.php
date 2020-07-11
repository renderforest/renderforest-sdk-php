<?php

namespace Renderforest\Template\Duration\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\Template\Duration\Duration;

/**
 * Class DurationCollection
 * @package Renderforest\Template\Duration\Collection
 */
class DurationCollection extends CollectionBase
{
    /**
     * @var Duration[]
     */
    private $durations;

    /**
     * @var Duration[]
     */
    private $durationsAssocArray;

    /**
     * DurationCollection constructor.
     */
    public function __construct()
    {
        $this->durations = [];
        $this->durationsAssocArray = [];

        parent::__construct();
    }

    /**
     * @param Duration $duration
     * @return DurationCollection
     */
    private function add(Duration $duration): DurationCollection
    {
        $this->iteratorItems[] = $duration;
        $this->durations[] = $duration;

        return $this;
    }

    /**
     * @param string $durationCollectionJson
     */
    public function exchangeJson(string $durationCollectionJson)
    {
        $durationCollectionArrayData = json_decode($durationCollectionJson, true);

        $durationCollectionArrayData = $durationCollectionArrayData['data'];

        $this->exchangeArray($durationCollectionArrayData);
    }

    /**
     * @param array $durationCollectionArrayData
     */
    public function exchangeArray(array $durationCollectionArrayData)
    {
        foreach ($durationCollectionArrayData as $durationArrayData) {
            $duration = new Duration();
            $duration->exchangeArray($durationArrayData);

            $this->add($duration);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->durations as $duration) {
            $arrayCopy[] = $duration->getArrayCopy();
        }

        return $arrayCopy;
    }
}
