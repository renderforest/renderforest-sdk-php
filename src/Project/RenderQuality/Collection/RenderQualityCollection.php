<?php

namespace Renderforest\Project\RenderQuality\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\Project\RenderQuality\Entity\RenderQuality;

/**
 * Class RenderQualityCollection
 * @package Renderforest\Project\RenderQuality\Collection
 */
class RenderQualityCollection extends CollectionBase
{
    /**
     * @var RenderQuality[]
     */
    private $renderQualities;

    /**
     * @var RenderQuality[]
     */
    private $renderQualitiesAssocArray;

    /**
     * RenderQualityCollection constructor.
     */
    public function __construct()
    {
        $this->renderQualities = [];
        $this->renderQualitiesAssocArray = [];

        parent::__construct();
    }

    /**
     * @param RenderQuality $renderQuality
     * @return RenderQualityCollection
     */
    private function add(RenderQuality $renderQuality): RenderQualityCollection
    {
        $this->iteratorItems[] = $renderQuality;
        $this->renderQualities[] = $renderQuality;
        $this->renderQualitiesAssocArray[$renderQuality->getName()] = $renderQuality;

        return $this;
    }

    /**
     * @param array $renderQualityCollectionArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $renderQualityCollectionArrayData)
    {
        foreach ($renderQualityCollectionArrayData as $name => $value) {
            $renderQuality = new RenderQuality();
            $renderQuality->setName($name);
            $renderQuality->setValue($value);

            $this->add($renderQuality);
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->renderQualities as $renderQuality) {
            $arrayCopy[$renderQuality->getName()] = $renderQuality->getValue();
        }

        return $arrayCopy;
    }

    /**
     * @return array
     */
    public function getRenderQualityNames(): array
    {
        return array_keys($this->renderQualitiesAssocArray);
    }

    /**
     * @param string $renderQualityName
     * @return RenderQuality
     * @throws \Exception
     */
    public function getRenderQualityByName(string $renderQualityName): RenderQuality
    {
        if (false === array_key_exists($renderQualityName, RenderQuality::VALID_RENDER_QUALITY_NAMES)) {
            // @todo throw invalid exception
        }

        if (false === array_key_exists($renderQualityName, $this->renderQualitiesAssocArray)) {
            throw new \Exception(
                sprintf(
                    'Render Quality with Name: %s was not found.',
                    $renderQualityName
                )
            );
        }

        return $this->renderQualitiesAssocArray[$renderQualityName];
    }
}
