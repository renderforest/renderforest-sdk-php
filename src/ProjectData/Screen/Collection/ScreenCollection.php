<?php

namespace Renderforest\ProjectData\Screen\Collection;

use Renderforest\ProjectData\Screen\Entity\Screen;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class ScreenCollection
 * @package Renderforest\ProjectData\Screen\Collection
 */
class ScreenCollection implements ArraySerializableInterface
{
    /**
     * @var Screen[]
     */
    private $screens;

    /**
     * @var Screen[]
     */
    private $screensAssocArray;

    /**
     * ScreenCollection constructor.
     */
    public function __construct()
    {
        $this->screens = [];
        $this->screensAssocArray = [];
    }

    /**
     * @param Screen $screen
     * @return ScreenCollection
     */
    public function add(Screen $screen): ScreenCollection
    {
        $this->screens[] = $screen;
        $this->screensAssocArray[$screen->getId()] = $screen;

        return $this;
    }

    /**
     * @param array $screenCollectionArrayData
     */
    public function exchangeArray(array $screenCollectionArrayData)
    {
        foreach ($screenCollectionArrayData as $screenArrayData) {
            $screen = new Screen();
            $screen->exchangeArray($screenArrayData);

            $this->add($screen);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->screens as $screen) {
            $arrayCopy[] = $screen->getArrayCopy();
        }

        return $arrayCopy;
    }

    /**
     * @param int $screenId
     * @return Screen
     */
    public function getScreenById(int $screenId): Screen
    {
        if (false === array_key_exists($screenId, $this->screensAssocArray)) {
            // throw not found exception
        }

        return $this->screensAssocArray[$screenId];
    }
}
