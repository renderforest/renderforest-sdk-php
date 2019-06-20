<?php

namespace Renderforest\ProjectData\Color\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\ProjectData\Color\Entity\Color;

/**
 * Class ColorCollection
 *
 * @package Renderforest\ProjectData\Color\Collection
 */
class ColorCollection extends CollectionBase
{
    /**
     * @var Color[]
     */
    private $colors;

    /**
     * ColorCollection constructor.
     */
    public function __construct()
    {
        $this->colors = [];

        parent::__construct();
    }

    /**
     * @param Color $color
     * @return ColorCollection
     */
    private function add(Color $color): ColorCollection
    {
        $this->iteratorItems[] = $color;
        $this->colors[] = $color;

        return $this;
    }

    /**
     * @param array $colorCollectionArrayData
     */
    public function exchangeArray(array $colorCollectionArrayData)
    {
        foreach ($colorCollectionArrayData as $colorHexCode) {
            $color = new Color();
            $color->setHexCode($colorHexCode);

            $this->add($color);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->colors as $color) {
            $arrayCopy[] = $color->getHexCode();
        }

        return $arrayCopy;
    }
}
