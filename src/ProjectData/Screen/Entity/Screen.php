<?php

namespace Renderforest\ProjectData\Screen\Entity;

use Renderforest\Base\EntityBase;
use Renderforest\ProjectData\Screen\Area\Collection\AreaCollection;
use Renderforest\ProjectData\Screen\Area\Entity\AbstractArea;
use Renderforest\ProjectData\Screen\Area\Entity\VideoArea;

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


    const KEY_SELECTED_DURATION = 'selectedDuration';
    const KEY_LOWER_THIRD_ADJUSTABLE = 'lowerThirdAdjustable';
    const KEY_LOWER_THIRD_START = 'lowerThirdStart';
    const KEY_LOWER_THIRD_DURATION = 'lowerThirdDuration';

    /**
     * Screen constructor.
     */
    public function __construct()
    {
        $this->areas = new AreaCollection();
    }

    /**
     * @return bool
     */
    private function hasVideoArea(): bool
    {
        foreach ($this->areas as $area) {
            if ($area instanceof VideoArea) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return int|mixed|null
     */
    public function calculateScreenDuration()
    {
        $this->characterBasedDuration;
        $this->selectedDuration;
        $this->extraVideoSecond;
        $this->areas;
        $this->duration;


        if (false === is_null($this->characterBasedDuration) && false === is_null($this->selectedDuration)) {
            return $this->selectedDuration;
        }

        $extra = 0;

        if (false === is_null($this->extraVideoSecond)) {
            $extra = $this->extraVideoSecond;
        }

        $conditionScreenDuration = 0;
        if (false === $this->hasVideoArea()) {
            $conditionScreenDuration = $this->duration;
        }

        return $this->calculateScreenAreaDuration() + $extra + $conditionScreenDuration;
    }

    /**
     * @return int
     */
    public function getMaxPossibleDuration(): int
    {
        $acc = 0;

        if ($this->hasVideoArea()) {
            foreach ($this->areas as $area) {
                if ($area instanceof VideoArea) {
                    $acc += $area->getWordCount();
                }
            }

            return $acc;
        }

        if (false === is_null($this->getMaxDuration())) {
            return $this->getMaxDuration();
        }

        return $this->getDuration();
    }

    /**
     * @return int|mixed
     */
    private function calculateScreenAreaDuration()
    {
        $acc = 0;

        foreach ($this->areas as $area) {

            $videoCropParams = null;
            if ($area instanceof VideoArea) {
                $videoCropParams = $area->getVideoCropParams();
            }

            if (is_null($videoCropParams)) {
                continue;
            } elseif ($videoCropParams->getDuration()) {
                $acc += $this->calculateVideoTrimsDuration($area);
            }
        }

        return $acc;
    }

    /**
     * @param VideoArea $area
     * @return mixed
     */
    private function calculateVideoTrimsDuration(VideoArea $area)
    {
        $trims = $area->getVideoCropParams()->getTrims();

        return array_reduce($trims, function ($acc, $element, $index) use ($trims) {
            if (0 === $index % 2) {
                return $acc + $trims[$index + 1] - $element;
            }

            return $acc;
        }, 0);
    }

    /**
     * @param int $start
     * @param int $duration
     * @return $this
     * @throws \Exception
     */
    public function setLowerThirdSettings(int $start, int $duration): Screen
    {
        if (1 === $this->lowerThirdAdjustable) {
            $this->lowerThirdStart = $start;
            $this->lowerThirdDuration = $duration;
        } else {
            throw new \Exception('Lower third settings are not adjustable.');
        }

        return $this;
    }

    /**
     * @return Screen
     * @throws \Exception
     */
    public function toggleIconPosition(): Screen
    {
        if (0 === $this->iconAdjustable || is_null($this->iconAdjustable)) {
            throw new \Exception('Icon position is not adjustable.');
        }

        $this->iconAdjustable = 3 - $this->iconAdjustable;

        return $this;
    }

    /** @var int */
    protected $id;

    /** @var bool */
    protected $characterBasedDuration;

    /** @var string|null */
    protected $compositionName;

    /** @var int */
    protected $duration;

    /** @var int */
    protected $extraVideoSecond;

    /** @var string|null */
    protected $gifBigPath;

    /** @var string|null */
    protected $gifPath;

    /** @var string|null */
    protected $gifThumbnailPath;

    /** @var bool|null */
    protected $hidden;

    /** @var int|null */
    protected $iconAdjustable;

    /** @var bool|null */
    protected $isFull;

    /** @var int|null */
    protected $maxDuration;

    /** @var int */
    protected $order;

    /** @var string */
    protected $path;

    /** @var string|null */
    protected $tags;

    /** @var string|null */
    protected $title;

    /** @var int */
    protected $type;

    /** @var AreaCollection */
    protected $areas;




    /** @var int|null */
    protected $selectedDuration;

    /** @var bool|null */
    protected $lowerThirdAdjustable;

    /** @var bool|null */
    protected $lowerThirdStart;

    /** @var bool|null */
    protected $lowerThirdDuration;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Screen
     */
    public function setId(int $id): Screen
    {
        $this->id = $id;

        return $this;
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
     * @return Screen
     */
    private function setCharacterBasedDuration(bool $characterBasedDuration): Screen
    {
        $this->characterBasedDuration = $characterBasedDuration;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompositionName()
    {
        return $this->compositionName;
    }

    /**
     * @param string|null $compositionName
     * @return Screen
     */
    public function setCompositionName($compositionName): Screen
    {
        $this->compositionName = $compositionName;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     * @return $this
     * @throws \Exception
     */
    public function setDuration(int $duration): Screen
    {
        if ($this->hasVideoArea()) {
            throw new \Exception('The screen has video area.');
        }

        if ($this->characterBasedDuration !== true) {
            throw new \Exception('Current screen\'s duration is not adjustable.');
        }

        if ($this->duration > $this->getMaxPossibleDuration()) {
            throw new \Exception('Given value is greater than maximum possible duration.');
        }

        $this->selectedDuration = $duration;

        return $this;
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
     * @return Screen
     */
    public function setExtraVideoSecond(int $extraVideoSecond): Screen
    {
        $this->extraVideoSecond = $extraVideoSecond;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGifBigPath()
    {
        return $this->gifBigPath;
    }

    /**
     * @param string|null $gifBigPath
     * @return Screen
     */
    public function setGifBigPath($gifBigPath): Screen
    {
        $this->gifBigPath = $gifBigPath;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGifPath()
    {
        return $this->gifPath;
    }

    /**
     * @param string|null $gifPath
     * @return Screen
     */
    public function setGifPath($gifPath): Screen
    {
        $this->gifPath = $gifPath;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGifThumbnailPath()
    {
        return $this->gifThumbnailPath;
    }

    /**
     * @param string|null $gifThumbnailPath
     * @return Screen
     */
    public function setGifThumbnailPath($gifThumbnailPath): Screen
    {
        $this->gifThumbnailPath = $gifThumbnailPath;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * @param bool|null $hidden
     * @return Screen
     */
    public function setHidden($hidden): Screen
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getIconAdjustable()
    {
        return $this->iconAdjustable;
    }

    /**
     * @param int $iconAdjustable
     * @return Screen
     */
    private function setIconAdjustable(int $iconAdjustable): Screen
    {
        $this->iconAdjustable = $iconAdjustable;

        return $this;
    }

    /**
     * @param int $lowerThirdAdjustable
     * @return Screen
     */
    private function setLowerThirdAdjustable(int $lowerThirdAdjustable): Screen
    {
        $this->lowerThirdAdjustable = $lowerThirdAdjustable;

        return $this;
    }

    /**
     * @param int $lowerThirdStart
     * @return Screen
     */
    private function setLowerThirdStart(int $lowerThirdStart): Screen
    {
        $this->lowerThirdStart = $lowerThirdStart;

        return $this;
    }

    /**
     * @param int $lowerThirdDuration
     * @return Screen
     */
    private function setLowerThirdDuration(int $lowerThirdDuration): Screen
    {
        $this->lowerThirdDuration = $lowerThirdDuration;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsFull()
    {
        return $this->isFull;
    }

    /**
     * @param bool|null $isFull
     * @return Screen
     */
    private function setIsFull($isFull): Screen
    {
        $this->isFull = $isFull;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxDuration()
    {
        return $this->maxDuration;
    }

    /**
     * @param int|null $maxDuration
     * @return Screen
     */
    private function setMaxDuration($maxDuration): Screen
    {
        $this->maxDuration = $maxDuration;

        return $this;
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
     * @return Screen
     */
    public function setOrder(int $order): Screen
    {
        $this->order = $order;

        return $this;
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
     * @return Screen
     */
    public function setPath(string $path): Screen
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string|null $tags
     * @return Screen
     */
    public function setTags($tags): Screen
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return Screen
     */
    private function setTitle($title): Screen
    {
        $this->title = $title;

        return $this;
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
     * @return Screen
     */
    public function setType(int $type): Screen
    {
        $this->type = $type;

        return $this;
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
     * @return Screen
     */
    public function setAreas(AreaCollection $areas): Screen
    {
        $this->areas = $areas;

        return $this;
    }

    /**
     * @param array $screenArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $screenArrayData)
    {
        $screenId = $screenArrayData[self::KEY_ID];
        $this->setId($screenId);

        if (array_key_exists(self::KEY_CHARACTER_BASED_DURATION, $screenArrayData)) {
            $this->setCharacterBasedDuration($screenArrayData[self::KEY_CHARACTER_BASED_DURATION]);
        } else {
            $this->setCharacterBasedDuration(false);
        }

        if (array_key_exists(self::KEY_COMPOSITION_NAME, $screenArrayData)) {
            $this->setCompositionName($screenArrayData[self::KEY_COMPOSITION_NAME]);
        }

        $screenDuration = $screenArrayData[self::KEY_DURATION];
        $this->duration = $screenDuration;

        $screenExtraVideoSecond = $screenArrayData[self::KEY_EXTRA_VIDEO_SECOND];
        $this->setExtraVideoSecond($screenExtraVideoSecond);


        if (array_key_exists(self::KEY_GIF_BIG_PATH, $screenArrayData)) {
            $this->setGifBigPath($screenArrayData[self::KEY_GIF_BIG_PATH]);
        }

        if (array_key_exists(self::KEY_GIF_PATH, $screenArrayData)) {
            $this->setGifPath($screenArrayData[self::KEY_GIF_PATH]);
        }

        if (array_key_exists(self::KEY_GIF_THUMBNAIL_PATH, $screenArrayData)) {
            $this->setGifThumbnailPath($screenArrayData[self::KEY_GIF_THUMBNAIL_PATH]);
        }

        if (array_key_exists(self::KEY_HIDDEN, $screenArrayData)) {
            $this->setHidden($screenArrayData[self::KEY_HIDDEN]);
        }

        if (array_key_exists(self::KEY_ICON_ADJUSTABLE, $screenArrayData)) {
            $this->setIconAdjustable($screenArrayData[self::KEY_ICON_ADJUSTABLE]);
        }

        if (array_key_exists(self::KEY_LOWER_THIRD_ADJUSTABLE, $screenArrayData)) {
            $this->setLowerThirdAdjustable($screenArrayData[self::KEY_LOWER_THIRD_ADJUSTABLE]);
        }


        if (array_key_exists(self::KEY_LOWER_THIRD_START, $screenArrayData)) {
            $this->setLowerThirdStart($screenArrayData[self::KEY_LOWER_THIRD_START]);
        }

        if (array_key_exists(self::KEY_LOWER_THIRD_DURATION, $screenArrayData)) {
            $this->setLowerThirdDuration($screenArrayData[self::KEY_LOWER_THIRD_DURATION]);
        }

        if (array_key_exists(self::KEY_IS_FULL, $screenArrayData)) {
            $this->setIsFull($screenArrayData[self::KEY_IS_FULL]);
        }

        if (array_key_exists(self::KEY_MAX_DURATION, $screenArrayData)) {
            $this->setMaxDuration($screenArrayData[self::KEY_MAX_DURATION]);
        }

        $screenOrder = $screenArrayData[self::KEY_ORDER];
        $this->setOrder($screenOrder);

        $screenPath = $screenArrayData[self::KEY_PATH];
        $this->setPath($screenPath);

        if (array_key_exists(self::KEY_TAGS, $screenArrayData)) {
            $this->setTags($screenArrayData[self::KEY_TAGS]);
        }

        if (array_key_exists(self::KEY_TITLE, $screenArrayData)) {
            $this->setTitle($screenArrayData[self::KEY_TITLE]);
        }

        if (array_key_exists(self::KEY_TYPE, $screenArrayData)) {
            $this->setType($screenArrayData[self::KEY_TYPE]);
        }

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
        $arrayCopy = [
            self::KEY_ID => $this->getId(),
            self::KEY_CHARACTER_BASED_DURATION => $this->isCharacterBasedDuration(),
            self::KEY_COMPOSITION_NAME => $this->getCompositionName(),
            self::KEY_DURATION => $this->getDuration(),
            self::KEY_EXTRA_VIDEO_SECOND => $this->getExtraVideoSecond(),
            self::KEY_GIF_BIG_PATH => $this->getGifBigPath(),
            self::KEY_GIF_PATH => $this->getGifPath(),
            self::KEY_GIF_THUMBNAIL_PATH => $this->getGifThumbnailPath(),
            self::KEY_HIDDEN => $this->getHidden(),
            self::KEY_MAX_DURATION => $this->getMaxDuration(),
            self::KEY_ORDER => $this->getOrder(),
            self::KEY_PATH => $this->getPath(),
            self::KEY_TAGS => $this->getTags(),
            self::KEY_TYPE => $this->getType(),
            self::KEY_AREAS => $this->areas->getArrayCopy(),
        ];

        if (false === is_null($this->getTitle())) {
            $arrayCopy[self::KEY_TITLE] = $this->getTitle();
        }

        if (false === is_null($this->getIsFull())) {
            $arrayCopy[self::KEY_IS_FULL] = $this->getIsFull();
        }

        if (false === is_null($this->getIconAdjustable())) {
            $arrayCopy[self::KEY_ICON_ADJUSTABLE] = $this->getIconAdjustable();
        }

        if (
            false === is_null($this->lowerThirdStart)
            &&
            false === is_null($this->lowerThirdDuration)
        ) {
            $arrayCopy[self::KEY_LOWER_THIRD_START] = $this->lowerThirdStart;
            $arrayCopy[self::KEY_LOWER_THIRD_DURATION] = $this->lowerThirdDuration;
        }

        if (false === is_null($this->selectedDuration)) {
            $arrayCopy[self::KEY_SELECTED_DURATION] = $this->selectedDuration;
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
        return $this->areas->getAreaByOrder($order);
    }
}
