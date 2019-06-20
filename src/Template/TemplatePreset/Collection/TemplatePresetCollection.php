<?php

namespace Renderforest\Template\TemplatePreset\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\Template\TemplatePreset\TemplatePreset;

/**
 * Class TemplatePresetCollection
 * @package Renderforest\Template\TemplatePreset\Collection
 */
class TemplatePresetCollection extends CollectionBase
{
    /**
     * @var TemplatePreset[]
     */
    private $templatePresets;

    /**
     * @var TemplatePreset[]
     */
    private $templatePresetsAssocArray;

    /**
     * TemplatePresetCollection constructor.
     */
    public function __construct()
    {
        $this->templatePresets = [];
        $this->templatePresetsAssocArray = [];

        parent::__construct();
    }

    /**
     * @param TemplatePreset $templatePreset
     * @return TemplatePresetCollection
     */
    private function add(TemplatePreset $templatePreset): TemplatePresetCollection
    {
        $this->iteratorItems[] = $templatePreset;
        $this->templatePresets[] = $templatePreset;
        $this->templatePresetsAssocArray[$templatePreset->getId()] = $templatePreset;

        return $this;
    }

    /**
     * @param string $templatePresetCollectionJson
     */
    public function exchangeJson(string $templatePresetCollectionJson)
    {
        $templatePresetCollectionArrayData = json_decode($templatePresetCollectionJson, true);

        $templatePresetCollectionArrayData = $templatePresetCollectionArrayData['data'];

        $this->exchangeArray($templatePresetCollectionArrayData);
    }

    /**
     * @param array $templatePresetCollectionArrayData
     */
    public function exchangeArray(array $templatePresetCollectionArrayData)
    {
        foreach ($templatePresetCollectionArrayData as $templatePresetArrayData) {
            $templatePreset = new TemplatePreset();
            $templatePreset->exchangeArray($templatePresetArrayData);

            $this->add($templatePreset);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->templatePresets as $templatePreset) {
            $arrayCopy[] = $templatePreset->getArrayCopy();
        }

        return $arrayCopy;
    }

    /**
     * @param int $templatePresetId
     * @return TemplatePreset
     * @throws \Exception
     */
    public function getTemplatePresetById(int $templatePresetId)
    {
        if (false === array_key_exists($templatePresetId, $this->templatePresetsAssocArray)) {
            throw new \Exception(
                sprintf(
                    'Template Preset with ID: %d was not found.',
                    $templatePresetId
                )
            );
        }

        return $this->templatePresetsAssocArray[$templatePresetId];
    }
}
