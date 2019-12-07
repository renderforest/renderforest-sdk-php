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

    /** @var string */
    protected $theme;

    /** @var string */
    protected $transition;

    /**
     * @return string
     */
    public function getTheme(): string
    {
        return $this->theme || '';
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
        return $this->transition || '';
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
     */
    public function exchangeArray(array $projectDataStylesArrayData)
    {
        if (true === array_key_exists(self::KEY_THEME, $projectDataStylesArrayData)) {
            $projectDataStylesTheme = $projectDataStylesArrayData[self::KEY_THEME];
            $this->setTheme($projectDataStylesTheme);
        }

        if (true === array_key_exists(self::KEY_TRANSITION, $projectDataStylesArrayData)) {
            $projectDataStylesTransition = $projectDataStylesArrayData[self::KEY_TRANSITION];
            $this->setTransition($projectDataStylesTransition);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];
        $theme = $this->getTheme();
        $transition = $this->getTransition();
        
        if ($theme !== '') {
            $arrayCopy[self::KEY_THEME] = $theme;
        }

        if ($transition) {
            $arrayCopy[self::KEY_TRANSITION] = $transition;
        }

        return $arrayCopy;
    }
}
