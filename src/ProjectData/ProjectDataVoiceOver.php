<?php

namespace Renderforest\ProjectData;

use Renderforest\Base\ApiEntityBase;

/**
 * Class ProjectDataVoiceOver
 * @package Renderforest\ProjectData
 */
class ProjectDataVoiceOver extends ApiEntityBase
{
    /**
     *  Example JSON
     *  {
     *      "path": "https://example.com/voice-ower.mp3"
     *  }
     */

    const KEY_PATH = 'path';

    const REQUIRED_KEYS = [
        self::KEY_PATH,
    ];

    /** @var string */
    protected $path;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return ProjectDataVoiceOver
     */
    public function setPath(string $path): ProjectDataVoiceOver
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @param array $projectDataVoiceOverArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $projectDataVoiceOverArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $projectDataVoiceOverArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in project data voice over array data');
            }
        }

        $projectDataVoiceOverPath = $projectDataVoiceOverArrayData[self::KEY_PATH];

        $this->setPath($projectDataVoiceOverPath);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_PATH => $this->getPath(),
        ];

        return $arrayCopy;
    }
}
