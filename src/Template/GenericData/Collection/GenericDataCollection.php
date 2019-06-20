<?php

namespace Renderforest\Template\GenericData\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\Template\GenericData\GenericData;

/**
 * Class GenericDataCollection
 * @package Renderforest\Template\GenericData\Collection
 */
class GenericDataCollection extends CollectionBase
{
    /**
     * @var GenericData[]
     */
    private $genericDataItems;

    /**
     * CustomColorCollection constructor.
     */
    public function __construct()
    {
        $this->genericDataItems = [];

        parent::__construct();
    }

    /**
     * @param GenericData $genericData
     * @return GenericDataCollection
     */
    private function add(GenericData $genericData): GenericDataCollection
    {
        $this->iteratorItems[] = $genericData;
        $this->genericDataItems[] = $genericData;

        return $this;
    }

    /**
     * @param string $genericDataCollectionJson
     */
    public function exchangeJson(string $genericDataCollectionJson)
    {
        $genericDataCollectionArrayData = json_decode($genericDataCollectionJson, true);

        $genericDataCollectionArrayData = $genericDataCollectionArrayData['data'][0];

        $this->exchangeArray($genericDataCollectionArrayData);
    }

    /**
     * @param array $genericDataCollectionArrayData
     */
    public function exchangeArray(array $genericDataCollectionArrayData)
    {
        foreach ($genericDataCollectionArrayData as $genericDataArrayData) {
            $genericData = new GenericData();
            $genericData->exchangeArray($genericDataArrayData);

            $this->add($genericData);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->genericDataItems as $genericData) {
            $arrayCopy[] = $genericData->getArrayCopy();
        }

        return $arrayCopy;
    }
}
