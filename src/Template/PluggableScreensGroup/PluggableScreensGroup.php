<?php

namespace Renderforest\Template\PluggableScreensGroup;

use Renderforest\Base\EntityBase;
use Renderforest\ProjectData\Screen\Collection\ScreenCollection;

/**
 * Class PluggableScreensGroup
 * @package Renderforest\Template\PluggableScreensGroup
 */
class PluggableScreensGroup extends EntityBase
{
    const KEY_ID = 'id';
    const KEY_NAME = 'name';
    const KEY_ORDER = 'order';
    const KEY_SCREENS = 'screens';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_NAME,
        self::KEY_ORDER,
        self::KEY_SCREENS,
    ];

    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var int */
    protected $order;

    /** @var ScreenCollection */
    protected $screens;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    private function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    private function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    private function setOrder(int $order)
    {
        $this->order = $order;
    }

    /**
     * @return ScreenCollection
     */
    public function getScreens(): ScreenCollection
    {
        return $this->screens;
    }

    /**
     * @param ScreenCollection $screens
     */
    private function setScreens(ScreenCollection $screens)
    {
        $this->screens = $screens;
    }

    /**
     * @param array $pluggableScreensGroupArrayData
     */
    public function exchangeArray(array $pluggableScreensGroupArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $pluggableScreensGroupArrayData)) {
                // throw exception
            }
        }

        $id = $pluggableScreensGroupArrayData[self::KEY_ID];
        $name = $pluggableScreensGroupArrayData[self::KEY_NAME];
        $order = $pluggableScreensGroupArrayData[self::KEY_ORDER];
        $screens = $pluggableScreensGroupArrayData[self::KEY_SCREENS];

        $this->setId($id);
        $this->setName($name);
        $this->setOrder($order);

        $screenCollection = new ScreenCollection();
        $screenCollection->exchangeArray($screens);
        $this->setScreens($screenCollection);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_ID => $this->getId(),
            self::KEY_NAME => $this->getName(),
            self::KEY_ORDER => $this->getOrder(),
        ];

        return $arrayCopy;
    }
}
