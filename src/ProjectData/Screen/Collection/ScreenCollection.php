<?php

namespace Renderforest\ProjectData\Screen\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\ProjectData\Screen\Entity\Screen;

/**
 * Class ScreenCollection
 * @package Renderforest\ProjectData\Screen\Collection
 */
class ScreenCollection extends CollectionBase
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

        parent::__construct();
    }

    /**
     * @param Screen $screen
     * @return ScreenCollection
     */
    public function add(Screen $screen): ScreenCollection
    {
        $this->iteratorItems[] = $screen;
        $this->screens[] = $screen;
        $this->screensAssocArray[$screen->getOrder()] = $screen;

        $this->reOrderScreens();

        return $this;
    }

    private function reOrderScreens()
    {
        ksort($this->screensAssocArray);

        $normalized = [];

        $index = 0;
        foreach ($this->screensAssocArray as $screen) {
            $screen->setOrder($index);
            $normalized[$index] = $screen;

            $index++;
        }

        $this->screensAssocArray = $normalized;

        $this->screens = array_values($this->screensAssocArray);
        $this->iteratorItems = array_values($this->screensAssocArray);
    }

    /**
     * @param array $screenCollectionArrayData
     * @throws \Exception
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
     * @param int $screenOrder
     * @return Screen
     * @throws \Exception
     */
    public function getScreenByOrder(int $screenOrder): Screen
    {
        if (false === array_key_exists($screenOrder, $this->screensAssocArray)) {
            throw new \Exception(
                sprintf(
                    'Screen with Order: %d was not found.',
                    $screenOrder
                )
            );
        }

        return $this->screensAssocArray[$screenOrder];
    }
}
