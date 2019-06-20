<?php

namespace Renderforest\ProjectData;

use Renderforest\Base\ApiEntityBase;

/**
 * Class ProjectDataStyles
 * @package Renderforest\ProjectData
 */
class ProjectDataStyles extends ApiEntityBase
{
    /**
     *  Example JSON
     *  {
     *      "transition": "3",
     *      "theme": "1"
     *  }
     */

    const KEY_THEME = 'theme';
    const KEY_TRANSITION = 'transition';

    const REQUIRED_KEYS = [
        self::KEY_THEME,
        self::KEY_TRANSITION,
    ];

    /** @var string */
    protected $theme;

    /** @var string */
    protected $transition;

    /**
     * @return string
     */
    public function getTheme(): string
    {
        return $this->theme;
    }

    /**
     * @param string $theme
     * @return ProjectDataStyles
     */
    public function setTheme(string $theme): ProjectDataStyles
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return string
     */
    public function getTransition(): string
    {
        return $this->transition;
    }

    /**
     * @param string $transition
     * @return ProjectDataStyles
     */
    public function setTransition(string $transition): ProjectDataStyles
    {
        $this->transition = $transition;

        return $this;
    }

    /**
     * @param array $projectDataStylesArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $projectDataStylesArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $projectDataStylesArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in project data styles array data');
            }
        }

        $projectDataStylesTheme = $projectDataStylesArrayData[self::KEY_THEME];
        $projectDataStylesTransition = $projectDataStylesArrayData[self::KEY_TRANSITION];

        $this->setTheme($projectDataStylesTheme);
        $this->setTransition($projectDataStylesTransition);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_THEME => $this->getTheme(),
            self::KEY_TRANSITION => $this->getTransition(),
        ];

        return $arrayCopy;
    }
}
