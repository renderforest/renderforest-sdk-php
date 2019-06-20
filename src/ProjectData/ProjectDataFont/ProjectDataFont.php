<?php

namespace Renderforest\ProjectData\ProjectDataFont;

use Renderforest\Base\ApiEntityBase;

/**
 * Class ProjectDataFont
 * @package Renderforest\ProjectData\ProjectDataFont
 */
class ProjectDataFont extends ApiEntityBase
{
    /**
     *  Example JSON
     *  "0": {
     *      "id": 322,
     *      "name": "Default",
     *      "characterSize": 19
     *  }
     */

    const KEY_ID = 'id';
    const KEY_NAME = 'name';
    const KEY_CHARACTER_SIZE = 'characterSize';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_NAME,
        self::KEY_CHARACTER_SIZE,
    ];

    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var int */
    protected $characterSize;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ProjectDataFont
     */
    public function setId(int $id): ProjectDataFont
    {
        $this->id = $id;

        return $this;
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
     * @return ProjectDataFont
     */
    public function setName(string $name): ProjectDataFont
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getCharacterSize(): int
    {
        return $this->characterSize;
    }

    /**
     * @param int $characterSize
     * @return ProjectDataFont
     */
    public function setCharacterSize(int $characterSize): ProjectDataFont
    {
        $this->characterSize = $characterSize;

        return $this;
    }

    /**
     * @param array $projectDataFontArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $projectDataFontArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $projectDataFontArrayData)) {
                throw new \Exception('Missing `' . $requiredKey . '` in project data font array data');
            }
        }

        $projectDataFontId = $projectDataFontArrayData[self::KEY_ID];
        $projectDataFontName = $projectDataFontArrayData[self::KEY_NAME];
        $projectDataFontCharacterSize = $projectDataFontArrayData[self::KEY_CHARACTER_SIZE];

        $this->setId($projectDataFontId);
        $this->setName($projectDataFontName);
        $this->setCharacterSize($projectDataFontCharacterSize);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [
            self::KEY_ID => $this->getId(),
            self::KEY_NAME => $this->getName(),
            self::KEY_CHARACTER_SIZE => $this->getCharacterSize(),
        ];

        return $arrayCopy;
    }
}
