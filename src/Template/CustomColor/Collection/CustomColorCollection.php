<?php

namespace Renderforest\Template\CustomColor\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\Template\CustomColor\CustomColor;

/**
 * Class CustomColorCollection
 * @package Renderforest\Template\CustomColor\Collection
 */
class CustomColorCollection extends CollectionBase
{
    /**
     * @var CustomColor[]
     */
    private $customColors;

    /**
     * @var CustomColor[]
     */
    private $customColorsAssocArray;

    /**
     * CustomColorCollection constructor.
     */
    public function __construct()
    {
        $this->customColors = [];
        $this->customColorsAssocArray = [];
    }

    /**
     * @return CustomColor[]
     */
    public function getItems(): array
    {
        return $this->customColors;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->customColors);
    }

    /**
     * @param CustomColor $customColor
     * @return CustomColorCollection
     */
    public function add(CustomColor $customColor): CustomColorCollection
    {
        $this->customColors[] = $customColor;
        $this->customColorsAssocArray[$customColor->getId()] = $customColor;

        return $this;
    }

    /**
     * @param string $customColorCollectionJson
     */
    public function exchangeJson(string $customColorCollectionJson)
    {
        $customColorCollectionArrayData = json_decode($customColorCollectionJson, true);

        $customColorCollectionArrayData = $customColorCollectionArrayData['data'][0];

        $this->exchangeArray($customColorCollectionArrayData);
    }

    /**
     * @param array $customColorCollectionArrayData
     */
    public function exchangeArray(array $customColorCollectionArrayData)
    {
        foreach ($customColorCollectionArrayData as $customColorArrayData) {
            $customColor = new CustomColor();
            $customColor->exchangeArray($customColorArrayData);

            $this->add($customColor);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->customColors as $customColor) {
            $arrayCopy[] = $customColor->getArrayCopy();
        }

        return $arrayCopy;
    }

    /**
     * @param int $customColorId
     * @return CustomColor
     */
    public function getCustomColorById(int $customColorId)
    {
        if (false === array_key_exists($customColorId, $this->customColorsAssocArray)) {
            // throw not found exception
        }

        return $this->customColorsAssocArray[$customColorId];
    }
}
