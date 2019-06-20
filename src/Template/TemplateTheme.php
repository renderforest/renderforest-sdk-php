<?php

namespace Renderforest\Template;

use Renderforest\Base\EntityBase;
use Renderforest\Template\GenericData\Collection\GenericDataCollection;

/**
 * Class TemplateTheme
 * @package Renderforest\Template
 */
class TemplateTheme extends EntityBase
{
    const KEY_ID = 'id';
    const KEY_THEME_NAME = 'themeName';
    const KEY_VARIABLE_NAME = 'variableName';
    const KEY_DATA = 'data';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_THEME_NAME,
        self::KEY_VARIABLE_NAME,
        self::KEY_DATA,
    ];

    /** @var int */
    protected $id;

    /** @var string */
    protected $themeName;

    /** @var string */
    protected $variableName;

    /** @var GenericDataCollection */
    protected $data;

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
    public function getThemeName(): string
    {
        return $this->themeName;
    }

    /**
     * @param string $themeName
     */
    private function setThemeName(string $themeName)
    {
        $this->themeName = $themeName;
    }

    /**
     * @return string
     */
    public function getVariableName(): string
    {
        return $this->variableName;
    }

    /**
     * @param string $variableName
     */
    private function setVariableName(string $variableName)
    {
        $this->variableName = $variableName;
    }

    /**
     * @return GenericDataCollection
     */
    public function getData(): GenericDataCollection
    {
        return $this->data;
    }

    /**
     * @param GenericDataCollection $data
     */
    private function setData(GenericDataCollection $data)
    {
        $this->data = $data;
    }

    /**
     * @param string $templateThemeJsonData
     */
    public function exchangeJson(string $templateThemeJsonData)
    {
        $templateThemeArrayData = json_decode($templateThemeJsonData, true);

        $templateThemeArrayData = $templateThemeArrayData['data'];

        $this->exchangeArray($templateThemeArrayData);
    }

    /**
     * @param array $templateTransitionsArrayData
     */
    public function exchangeArray(array $templateTransitionsArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $templateTransitionsArrayData)) {
                // throw exceptions
            }
        }

        $templateThemeId = $templateTransitionsArrayData[self::KEY_ID];
        $templateThemeThemeNAme = $templateTransitionsArrayData[self::KEY_THEME_NAME];
        $templateThemeVariableName = $templateTransitionsArrayData[self::KEY_VARIABLE_NAME];

        $this->setId($templateThemeId);
        $this->setThemeName($templateThemeThemeNAme);
        $this->setVariableName($templateThemeVariableName);

        $dataArray = $templateTransitionsArrayData[self::KEY_DATA];
        $genericDataCollection = new GenericDataCollection();
        $genericDataCollection->exchangeArray($dataArray);

        $this->setData($genericDataCollection);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_THEME_NAME => $this->getThemeName(),
            self::KEY_VARIABLE_NAME => $this->getVariableName(),
            self::KEY_DATA => $this->getData()->getArrayCopy(),
        ];
    }
}
