<?php

namespace Renderforest\ProjectData\Color\Collection;

use Renderforest\ProjectData\Color\Entity\Color;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class ColorCollection
 *
 * @package Renderforest\ProjectData\Color\Collection
 */
class ColorCollection implements ArraySerializableInterface
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
    }

    /**
     * @param Color $color
     * @return ColorCollection
     */
    public function add(Color $color): ColorCollection
    {
        $this->colors[] = $color;

        return $this;
    }

    /**
     * @param array $colorCollectionArrayData
     */
    public function exchangeArray(array $colorCollectionArrayData)
    {
        foreach ($colorCollectionArrayData as $colorArrayData) {
            $color = new Color();
            $color->exchangeArray($colorArrayData);

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
            $arrayCopy[] = $color->getArrayCopy();
        }

        return $arrayCopy;
    }
}
