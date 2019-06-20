<?php

namespace Renderforest\Template;

use Renderforest\Base\EntityBase;
use Renderforest\Template\GenericData\Collection\GenericDataCollection;

/**
 * Class TemplateTransitions
 * @package Renderforest\Template
 */
class TemplateTransitions extends EntityBase
{
    const KEY_ID = 'id';
    const KEY_TRANSITION_NAME = 'transitionName';
    const KEY_VARIABLE_NAME = 'variableName';
    const KEY_DATA = 'data';

    const REQUIRED_KEYS = [
        self::KEY_ID,
        self::KEY_TRANSITION_NAME,
        self::KEY_VARIABLE_NAME,
        self::KEY_DATA,
    ];

    /** @var int */
    protected $id;

    /** @var string */
    protected $transitionName;

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
    public function getTransitionName(): string
    {
        return $this->transitionName;
    }

    /**
     * @param string $themeName
     */
    private function setThemeName(string $themeName)
    {
        $this->transitionName = $themeName;
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
     * @param string $templateTransitionsJsonData
     */
    public function exchangeJson(string $templateTransitionsJsonData)
    {
        $templateTransitionsArrayData = json_decode($templateTransitionsJsonData, true);

        $templateTransitionsArrayData = $templateTransitionsArrayData['data'];

        $this->exchangeArray($templateTransitionsArrayData);
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
        $templateThemeThemeNAme = $templateTransitionsArrayData[self::KEY_TRANSITION_NAME];
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
            self::KEY_TRANSITION_NAME => $this->getTransitionName(),
            self::KEY_VARIABLE_NAME => $this->getVariableName(),
            self::KEY_DATA => $this->getData()->getArrayCopy(),
        ];
    }
}
