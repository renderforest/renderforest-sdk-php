<?php

namespace Renderforest\ProjectData\ProjectDataFont;

use Renderforest\Base\ApiEntityBase;
use Renderforest\ProjectData\ProjectDataFont\Collection\ProjectDataFontCollection;

/**
 * Class ProjectDataFontCollectionGroup
 * @package Renderforest\ProjectData\ProjectDataFont
 */
class ProjectDataFontCollectionGroup extends ApiEntityBase
{
    /**
     *  Example JSON
     *  "defaults": {
     *      "0": {
     *          "id": 322,
     *          "name": "Default",
     *          "characterSize": 19
     *      },
     *      "1": {
     *          "id": 322,
     *          "name": "Default",
     *          "characterSize": 19
     *      }
     *  },
     *  "selected": {
     *      "0": {
     *          "id": 322,
     *          "name": "Default",
     *          "characterSize": 19
     *      },
     *      "1": {
     *          "id": 322,
     *          "name": "Default",
     *          "characterSize": 19
     *      }
     *  }
     */

    const KEY_DEFAULTS = 'defaults';
    const KEY_SELECTED = 'selected';

    const REQUIRED_KEYS = [
        self::KEY_DEFAULTS,
        self::KEY_SELECTED,
    ];

    /** @var ProjectDataFontCollection */
    protected $defaults;

    /** @var ProjectDataFontCollection */
    protected $selected;

    /**
     * @return ProjectDataFontCollection
     */
    public function getDefaults(): ProjectDataFontCollection
    {
        return $this->defaults;
    }

    /**
     * @param ProjectDataFontCollection $defaults
     * @return ProjectDataFontCollectionGroup
     */
    public function setDefaults(ProjectDataFontCollection $defaults): ProjectDataFontCollectionGroup
    {
        $this->defaults = $defaults;

        return $this;
    }

    /**
     * @return ProjectDataFontCollection
     */
    public function getSelected(): ProjectDataFontCollection
    {
        return $this->selected;
    }

    /**
     * @param ProjectDataFontCollection $selected
     * @return ProjectDataFontCollectionGroup
     */
    public function setSelected(ProjectDataFontCollection $selected): ProjectDataFontCollectionGroup
    {
        $this->selected = $selected;

        return $this;
    }

    /**
     * @param array $projectDataFontCollectionGroupArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $projectDataFontCollectionGroupArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $projectDataFontCollectionGroupArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in project data fonts array data');
            }
        }

        $defaults = $projectDataFontCollectionGroupArrayData[self::KEY_DEFAULTS];
        $defaultsCollection = new ProjectDataFontCollection();
        $defaultsCollection->exchangeArray($defaults);

        $selected = $projectDataFontCollectionGroupArrayData[self::KEY_SELECTED];
        $selectedCollection = new ProjectDataFontCollection();
        $selectedCollection->exchangeArray($selected);

        $this
            ->setDefaults($defaultsCollection)
            ->setSelected($selectedCollection);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_DEFAULTS => (object) $this->getDefaults()->getArrayCopy(),
            self::KEY_SELECTED => (object) $this->getSelected()->getArrayCopy(),
        ];

        return $arrayCopy;
    }
}
