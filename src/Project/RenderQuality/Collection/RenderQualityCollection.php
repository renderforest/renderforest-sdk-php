<?php

namespace Renderforest\Project\RenderQuality\Collection;

use Renderforest\Project\RenderQuality\Entity\RenderQuality;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class RenderQualityCollection
 *
 * @package Renderforest\Project\RenderQuality\Collection
 */
class RenderQualityCollection implements ArraySerializableInterface
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
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->renderQualities);
    }

    /**
     * @return RenderQuality[]
     */
    public function getItems(): array
    {
        return $this->renderQualities;
    }

    /**
     * @param RenderQuality $renderQuality
     * @return RenderQualityCollection
     */
    public function add(RenderQuality $renderQuality): RenderQualityCollection
    {
        $this->renderQualities[] = $renderQuality;
        $this->renderQualitiesAssocArray[$renderQuality->getName()] = $renderQuality;

        return $this;
    }

    /**
     * @param array $renderQualityCollectionArrayData
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
     */
    public function getRenderQualityByName(string $renderQualityName): RenderQuality
    {
        if (false === array_key_exists($renderQualityName, RenderQuality::VALID_RENDER_QUALITY_NAMES)) {
            // throw invalid exception
        }

        if (false === array_key_exists($renderQualityName, $this->renderQualitiesAssocArray)) {
            // throw not found exception
        }

        return $this->renderQualitiesAssocArray[$renderQualityName];
    }
}
