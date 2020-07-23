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

        parent::__construct();
    }

    /**
     * @param CustomColor $customColor
     * @return CustomColorCollection
     */
    private function add(CustomColor $customColor): CustomColorCollection
    {
        $this->iteratorItems[] = $customColor;
        $this->customColors[] = $customColor;
        $this->customColorsAssocArray[$customColor->getId()] = $customColor;

        return $this;
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
}
