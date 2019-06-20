<?php

namespace Renderforest\Template\PluggableScreensGroup\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\Template\PluggableScreensGroup\PluggableScreensGroup;

/**
 * Class PluggableScreensGroupCollection
 * @package Renderforest\Template\PluggableScreensGroup\Collection
 */
class PluggableScreensGroupCollection extends CollectionBase
{
    /**
     * @var PluggableScreensGroup[]
     */
    private $pluggableScreensGroups;

    /**
     * PluggableScreensGroupCollection constructor.
     */
    public function __construct()
    {
        $this->pluggableScreensGroups = [];

        parent::__construct();
    }

    /**
     * @param PluggableScreensGroup $pluggableScreensGroup
     * @return PluggableScreensGroupCollection
     */
    private function add(PluggableScreensGroup $pluggableScreensGroup): PluggableScreensGroupCollection
    {
        $this->iteratorItems[] = $pluggableScreensGroup;
        $this->pluggableScreensGroups[] = $pluggableScreensGroup;

        return $this;
    }

    /**
     * @param string $pluggableScreensGroupCollectionJson
     */
    public function exchangeJson(string $pluggableScreensGroupCollectionJson)
    {
        $pluggableScreensGroupCollectionArrayData = json_decode($pluggableScreensGroupCollectionJson, true);

        $pluggableScreensGroupCollectionArrayData = $pluggableScreensGroupCollectionArrayData['data'];

        $this->exchangeArray($pluggableScreensGroupCollectionArrayData);
    }

    /**
     * @param array $pluggableScreensGroupCollectionArrayData
     */
    public function exchangeArray(array $pluggableScreensGroupCollectionArrayData)
    {
        foreach ($pluggableScreensGroupCollectionArrayData as $pluggableScreensGroupArrayData) {
            $pluggableScreensGroup = new PluggableScreensGroup();
            $pluggableScreensGroup->exchangeArray($pluggableScreensGroupArrayData);

            $this->add($pluggableScreensGroup);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->pluggableScreensGroups as $pluggableScreensGroup) {
            $arrayCopy[] = $pluggableScreensGroup->getArrayCopy();
        }

        return $arrayCopy;
    }
}
