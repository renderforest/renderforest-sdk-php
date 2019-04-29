<?php

namespace Renderforest\ProjectData\Screen\Entity;

use Renderforest\Base\EntityBase;
use Renderforest\ProjectData\Screen\Area\Collection\AreaCollection;

/**
 * Class Screen
 * @package Renderforest\ProjectData\Screen\Entity
 */
class Screen extends EntityBase
{
    /**
     * Example JSON
     *  {
     *      "id": 1,
     *      "characterBasedDuration": false,
     *      "compositionName": "192_man_Show_Photo_1",
     *      "duration": 6,
     *      "extraVideoSecond": 0,
     *      "gifBigPath": "https://example.com/media/Screens_2016/3rd_gen_2016/Explainer-Video-Toolkit-3gen/Gif/Big-Gif/192_man_Show_Photo_1_1.gif",
     *      "gifPath": "https://example.com/media/Screens_2016/3rd_gen_2016/Explainer-Video-Toolkit-3gen/Gif/192_man_Show_Photo_1_1.gif",
     *      "gifThumbnailPath": "https://example.com/media/Screens_2016/3rd_gen_2016/Explainer-Video-Toolkit-3gen/Gif/Gif-thumb/192_man_Show_Photo_1_n.jpg",
     *      "hidden": false,
     *      "iconAdjustable": 0,
     *      "isFull": true,
     *      "maxDuration": 0,
     *      "order": 1,
     *      "path": "https://static.rfstat.com/media/Screens_2016/3rd_gen_2016/Explainer-Video-Toolkit-3gen/Screen/192_man_Show_Photo_1_n.jpg",
     *      "tags": "agent, boss, business, businessman, character, corporate, employee, necktie, office, pointing, presentation, professional, showing, teaching, tie, worker,",
     *      "title": "Scene with office worker pointing out the image /1 image holder ",
     *      "type": 1,
     *  }
     */

    const KEY_ID = 'id';
    const KEY_CHARACTER_BASED_DURATION = 'characterBasedDuration';
    const KEY_COMPOSITION_NAME = 'compositionName';
    const KEY_DURATION = 'duration';
    const KEY_EXTRA_VIDEO_SECOND = 'extraVideoSecond';
    const KEY_GIF_BIG_PATH = 'gifBigPath';
    const KEY_GIF_PATH = 'gifPath';
    const KEY_GIF_THUMBNAIL_PATH = 'gifThumbnailPath';
    const KEY_HIDDEN = 'hidden';
    const KEY_ICON_ADJUSTABLE = 'iconAdjustable';
    const KEY_IS_FULL = 'isFull';
    const KEY_MAX_DURATION = 'maxDuration';
    const KEY_ORDER = 'order';
    const KEY_PATH = 'path';
    const KEY_TAGS = 'tags';
    const KEY_TITLE = 'title';
    const KEY_TYPE = 'type';
    const KEY_AREAS = 'areas';

    /** @var int */
    protected $id;

    /** @var bool */
    protected $characterBasedDuration;

    /** @var string */
    protected $compositionName;

    /** @var int */
    protected $duration;

    /** @var int */
    protected $extraVideoSecond;

    /** @var string */
    protected $gifBigPath;

    /** @var string */
    protected $gifPath;

    /** @var string */
    protected $gifThumbnailPath;

    /** @var bool */
    protected $hidden;

    /** @var int */
    protected $iconAdjustable;

    /** @var bool */
    protected $isFull;

    /** @var int */
    protected $maxDuration;

    /** @var int */
    protected $order;

    /** @var string */
    protected $path;

    /** @var string */
    protected $tags;

    /** @var string */
    protected $title;

    /** @var int */
    protected $type;

    /** @var AreaCollection */
    protected $areas;

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
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return bool
     */
    public function isCharacterBasedDuration(): bool
    {
        return $this->characterBasedDuration;
    }

    /**
     * @param bool $characterBasedDuration
     */
    public function setCharacterBasedDuration(bool $characterBasedDuration)
    {
        $this->characterBasedDuration = $characterBasedDuration;
    }

    /**
     * @return string
     */
    public function getCompositionName(): string
    {
        return $this->compositionName;
    }

    /**
     * @param string $compositionName
     */
    public function setCompositionName(string $compositionName)
    {
        $this->compositionName = $compositionName;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration(int $duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    public function getExtraVideoSecond(): int
    {
        return $this->extraVideoSecond;
    }

    /**
     * @param int $extraVideoSecond
     */
    public function setExtraVideoSecond(int $extraVideoSecond)
    {
        $this->extraVideoSecond = $extraVideoSecond;
    }

    /**
     * @return string
     */
    public function getGifBigPath(): string
    {
        return $this->gifBigPath;
    }

    /**
     * @param string $gifBigPath
     */
    public function setGifBigPath(string $gifBigPath)
    {
        $this->gifBigPath = $gifBigPath;
    }

    /**
     * @return string
     */
    public function getGifPath(): string
    {
        return $this->gifPath;
    }

    /**
     * @param string $gifPath
     */
    public function setGifPath(string $gifPath)
    {
        $this->gifPath = $gifPath;
    }

    /**
     * @return string
     */
    public function getGifThumbnailPath(): string
    {
        return $this->gifThumbnailPath;
    }

    /**
     * @param string $gifThumbnailPath
     */
    public function setGifThumbnailPath(string $gifThumbnailPath)
    {
        $this->gifThumbnailPath = $gifThumbnailPath;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }

    /**
     * @param bool $hidden
     */
    public function setHidden(bool $hidden)
    {
        $this->hidden = $hidden;
    }

    /**
     * @return int
     */
    public function getIconAdjustable(): int
    {
        return $this->iconAdjustable;
    }

    /**
     * @param int $iconAdjustable
     */
    public function setIconAdjustable(int $iconAdjustable)
    {
        $this->iconAdjustable = $iconAdjustable;
    }

    /**
     * @return bool
     */
    public function isFull(): bool
    {
        return $this->isFull;
    }

    /**
     * @param bool $isFull
     */
    public function setIsFull(bool $isFull)
    {
        $this->isFull = $isFull;
    }

    /**
     * @return int
     */
    public function getMaxDuration(): int
    {
        return $this->maxDuration;
    }

    /**
     * @param int $maxDuration
     */
    public function setMaxDuration(int $maxDuration)
    {
        $this->maxDuration = $maxDuration;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder(int $order)
    {
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getTags(): string
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     */
    public function setTags(string $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type)
    {
        $this->type = $type;
    }

    /**
     * @return AreaCollection
     */
    public function getAreas(): AreaCollection
    {
        return $this->areas;
    }

    /**
     * @param AreaCollection $areas
     */
    public function setAreas(AreaCollection $areas)
    {
        $this->areas = $areas;
    }

    /**
     * @param array $screenArrayData
     */
    public function exchangeArray(array $screenArrayData)
    {
//        if (false === array_key_exists(self::KEY_ID, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_CHARACTER_BASED_DURATION, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_COMPOSITION_NAME, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_DURATION, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_EXTRA_VIDEO_SECOND, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_GIF_BIG_PATH, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_GIF_PATH, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_GIF_THUMBNAIL_PATH, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_HIDDEN, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_ICON_ADJUSTABLE, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_IS_FULL, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_MAX_DURATION, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_ORDER, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_PATH, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_TAGS, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_TITLE, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_TYPE, $screenArrayData)) {
//            return;
//        }
//
//        if (false === array_key_exists(self::KEY_AREAS, $screenArrayData)) {
//            return;
//        }

        $screenId = $screenArrayData[self::KEY_ID];
        $screenCharacterBasedDuration = $screenArrayData[self::KEY_CHARACTER_BASED_DURATION];
        $screenCompositionName = $screenArrayData[self::KEY_COMPOSITION_NAME];
        $screenDuration = $screenArrayData[self::KEY_DURATION];
        $screenExtraVideoSecond = $screenArrayData[self::KEY_EXTRA_VIDEO_SECOND];
        $screenGifBigPath = $screenArrayData[self::KEY_GIF_BIG_PATH];
        $screenGifPath = $screenArrayData[self::KEY_GIF_PATH];
        $screenGifThumbnailPath = $screenArrayData[self::KEY_GIF_THUMBNAIL_PATH];
        $screenHidden = $screenArrayData[self::KEY_HIDDEN];
        $screenIconAdjustable = $screenArrayData[self::KEY_ICON_ADJUSTABLE];
        $screenIsFull = $screenArrayData[self::KEY_IS_FULL];
        $screenMaxDuration = $screenArrayData[self::KEY_MAX_DURATION];
        $screenOrder = $screenArrayData[self::KEY_ORDER];
        $screenPath = $screenArrayData[self::KEY_PATH];
        $screenTags = $screenArrayData[self::KEY_TAGS];
        $screenTitle = $screenArrayData[self::KEY_TITLE];
        $screenType = $screenArrayData[self::KEY_TYPE];

        $this->setId($screenId);
//        $this->setCharacterBasedDuration($screenCharacterBasedDuration);
        $this->setCharacterBasedDuration(false);
//        $this->setCompositionName($screenCompositionName);
        $this->setCompositionName('');
        $this->setDuration($screenDuration);
        $this->setExtraVideoSecond($screenExtraVideoSecond);
//        $this->setGifBigPath($screenGifBigPath);
        $this->setGifBigPath('');
//        $this->setGifPath($screenGifPath);
        $this->setGifPath('');
//        $this->setGifThumbnailPath($screenGifThumbnailPath);
        $this->setGifThumbnailPath('');
        $this->setHidden($screenHidden);
//        $this->setIconAdjustable($screenIconAdjustable);
        $this->setIconAdjustable(false);
//        $this->setIsFull($screenIsFull);
        $this->setIsFull(false);
//        $this->setMaxDuration($screenMaxDuration);
        $this->setMaxDuration(false);
        $this->setOrder($screenOrder);
        $this->setPath($screenPath);
//        $this->setTags($screenTags);
        $this->setTags('');
//        $this->setTitle($screenTitle);
        $this->setTitle('');
//        $this->setType($screenType);
        $this->setType(1);

        $areasArrayData = $screenArrayData[self::KEY_AREAS];
        $areaCollection = new AreaCollection();
        $areaCollection->exchangeArray($areasArrayData);
        $this->setAreas($areaCollection);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_ID => $this->getId(),
            self::KEY_CHARACTER_BASED_DURATION => $this->isCharacterBasedDuration(),
            self::KEY_COMPOSITION_NAME => $this->getCompositionName(),
            self::KEY_DURATION => $this->getDuration(),
            self::KEY_EXTRA_VIDEO_SECOND => $this->getExtraVideoSecond(),
            self::KEY_GIF_BIG_PATH => $this->getGifBigPath(),
            self::KEY_GIF_PATH => $this->getGifPath(),
            self::KEY_GIF_THUMBNAIL_PATH => $this->getGifThumbnailPath(),
            self::KEY_HIDDEN => $this->isHidden(),
            self::KEY_ICON_ADJUSTABLE => $this->getIconAdjustable(),
            self::KEY_IS_FULL => $this->isFull(),
            self::KEY_MAX_DURATION => $this->getMaxDuration(),
            self::KEY_ORDER => $this->getOrder(),
            self::KEY_PATH => $this->getPath(),
            self::KEY_TAGS => $this->getTags(),
            self::KEY_TITLE => $this->getTitle(),
            self::KEY_TYPE => $this->getType(),
            self::KEY_AREAS => $this->getAreas()->getArrayCopy(),
        ];
    }
}
