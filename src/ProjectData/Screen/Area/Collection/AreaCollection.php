<?php

namespace Renderforest\ProjectData\Screen\Area\Collection;

use Renderforest\Base\CollectionBase;
use Renderforest\ProjectData\Screen\Area\Entity\AbstractArea;
use Renderforest\ProjectData\Screen\Area\Entity\ImageArea;
use Renderforest\ProjectData\Screen\Area\Entity\TextArea;
use Renderforest\ProjectData\Screen\Area\Entity\VideoArea;

/**
 * Class AreaCollection
 * @package Renderforest\ProjectData\Screen\Area\Collection
 */
class AreaCollection extends CollectionBase
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
     * AreaCollection constructor.
     */
    public function __construct()
    {
        $this->areas = [];
        $this->areasAssocArray = [];

        parent::__construct();
    }

    /**
     * @param AbstractArea $area
     * @return AreaCollection
     */
    private function add(AbstractArea $area): AreaCollection
    {
        $this->iteratorItems[] = $area;
        $this->areas[] = $area;
        $this->areasAssocArray[$area->getOrder()] = $area;

        return $this;
    }

    /**
     * @param array $areaCollectionArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $areaCollectionArrayData)
    {
        foreach ($areaCollectionArrayData as $areaArrayData) {
            $areaType = $areaArrayData[AbstractArea::KEY_TYPE];
            if (false === in_array($areaType, AbstractArea::AREA_TYPES)) {
                throw new \Exception(
                    sprintf(
                        'Invalid area type `%s`, should be one of [%s]',
                        $areaType,
                        implode(', ', AbstractArea::AREA_TYPES)
                    )
                );
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
     * @param int $order
     * @return AbstractArea
     * @throws \Exception
     */
    public function getAreaByOrder(int $order): AbstractArea
    {
        if (false === array_key_exists($order, $this->areasAssocArray)) {
            throw new \Exception(
                sprintf(
                    'Area with Order: %d was not found.',
                    $order
                )
            );
        }

        return $this->areasAssocArray[$order];
    }
}
