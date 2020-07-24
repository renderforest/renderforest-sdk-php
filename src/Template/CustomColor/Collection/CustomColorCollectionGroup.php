<?php

namespace Renderforest\Template\CustomColor\Collection;

use Renderforest\Base\CollectionBase;

/**
 * Class CustomColorCollectionGroup
 * @package Renderforest\Template\CustomColor\Collection
 */
class CustomColorCollectionGroup extends CollectionBase
{
    /**
     * @var CustomColorCollection[]
     */
    private $customColorCollections;

    /**
     * CustomColorCollectionGroup constructor.
     */
    public function __construct()
    {
        $this->customColorCollections = [];

        parent::__construct();
    }

    /**
     * @param CustomColorCollection $customColorCollection
     * @return CustomColorCollectionGroup
     */
    private function add(CustomColorCollection $customColorCollection): CustomColorCollectionGroup
    {
        $this->iteratorItems[] = $customColorCollection;
        $this->customColorCollections[] = $customColorCollection;

        return $this;
    }

    /**
     * @param string $customColorCollectionGroupJson
     */
    public function exchangeJson(string $customColorCollectionGroupJson)
    {
        $customColorCollectionGroupArrayData = json_decode(
            $customColorCollectionGroupJson,
            true
        );

        if (array_key_exists('data', $customColorCollectionGroupArrayData)) {
            $customColorCollectionGroupArrayData = $customColorCollectionGroupArrayData['data'];

            $this->exchangeArray($customColorCollectionGroupArrayData);
        }
    }

    /**
     * @param array $customColorCollectionGroupArrayData
     */
    public function exchangeArray(array $customColorCollectionGroupArrayData)
    {
        foreach ($customColorCollectionGroupArrayData as $customColorCollectionArrayData) {
            $customColorCollection = new CustomColorCollection();
            $customColorCollection->exchangeArray($customColorCollectionArrayData);

            $this->add($customColorCollection);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->customColorCollections as $customColorCollection) {
            $arrayCopy[] = $customColorCollection->getArrayCopy();
        }

        return $arrayCopy;
    }
}
