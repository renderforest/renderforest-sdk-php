<?php

namespace Renderforest\ProjectData\Screen\Area\Collection;

use Renderforest\ProjectData\Screen\Area\Entity\AbstractArea;
use Renderforest\ProjectData\Screen\Area\Entity\ImageArea;
use Renderforest\ProjectData\Screen\Area\Entity\TextArea;
use Renderforest\ProjectData\Screen\Area\Entity\VideoArea;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class AreaCollection
 * @package Renderforest\ProjectData\Screen\Area\Collection
 */
class AreaCollection implements ArraySerializableInterface
{
    /**
     * @var AbstractArea[]
     */
    private $areas;

    /**
     * @var AbstractArea[]
     */
    private $areasAssocArray;

    /**
     * RenderQualityCollection constructor.
     */
    public function __construct()
    {
        $this->areas = [];
        $this->areasAssocArray = [];
    }

    /**
     * @param AbstractArea $area
     * @return AreaCollection
     */
    public function add(AbstractArea $area): AreaCollection
    {
        $this->areas[] = $area;
        $this->areasAssocArray[$area->getId()] = $area;

        return $this;
    }

    /**
     * @param array $areaCollectionArrayData
     */
    public function exchangeArray(array $areaCollectionArrayData)
    {
        foreach ($areaCollectionArrayData as $areaArrayData) {
            // @todo switch

            $areaType = $areaArrayData[AbstractArea::KEY_TYPE];

            if (false === in_array($areaType, AbstractArea::AREA_TYPES)) {
                // throw exception
            }

            $area = null;

            switch ($areaType) {
                case AbstractArea::AREA_TYPE_TEXT:
                    $area = new TextArea();
                    break;
                case AbstractArea::AREA_TYPE_IMAGE:
                    $area = new ImageArea();
                    break;
                case AbstractArea::AREA_TYPE_VIDEO:
                    $area = new VideoArea();
                    break;
            }

            if (false === is_null($area)) {
                $area->exchangeArray($areaArrayData);

                $this->add($area);
            }
        }
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $arrayCopy = [];

        foreach ($this->areas as $area) {
            $arrayCopy[] = $area->getArrayCopy();
        }

        return $arrayCopy;
    }

    /**
     * @param int $areaId
     * @return AbstractArea
     */
    public function getAreaById(int $areaId): AbstractArea
    {
        if (false === array_key_exists($areaId, $this->areasAssocArray)) {
            // throw not found exception
        }

        return $this->areasAssocArray[$areaId];
    }
}
