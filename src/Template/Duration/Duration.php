<?php

namespace Renderforest\Template\Duration;

use Renderforest\Base\EntityBase;

/**
 * Class Duration
 * @package Renderforest\Template\Duration
 */
class Duration extends EntityBase
{
    const KEY_TEMPLATE_ID = 'templateId';
    const KEY_DURATION = 'duration';
    const KEY_NAME = 'name';
    const KEY_LINK_NAME = 'linkName';
    const KEY_VIDEO_URL = 'videoUrl';

    const REQUIRED_KEYS = [
        self::KEY_TEMPLATE_ID,
        self::KEY_DURATION,
        self::KEY_NAME,
        self::KEY_LINK_NAME,
        self::KEY_VIDEO_URL,
    ];

    /** @var int */
    protected $templateId;

    /** @var int */
    protected $duration;

    /** @var string */
    protected $name;

    /** @var string */
    protected $linkName;

    /** @var string */
    protected $videoUrl;

    /**
     * @return int
     */
    public function getTemplateId(): int
    {
        return $this->templateId;
    }

    /**
     * @param int $templateId
     * @return Duration
     */
    public function setTemplateId(int $templateId): Duration
    {
        $this->templateId = $templateId;

        return $this;
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
     * @return Duration
     */
    public function setDuration(int $duration): Duration
    {
        $this->duration = $duration;

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
     * @return Duration
     */
    public function setName(string $name): Duration
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getLinkName(): string
    {
        return $this->linkName;
    }

    /**
     * @param string $linkName
     * @return Duration
     */
    public function setLinkName(string $linkName): Duration
    {
        $this->linkName = $linkName;

        return $this;
    }

    /**
     * @return string
     */
    public function getVideoUrl(): string
    {
        return $this->videoUrl;
    }

    /**
     * @param string $videoUrl
     * @return Duration
     */
    public function setVideoUrl(string $videoUrl): Duration
    {
        $this->videoUrl = $videoUrl;

        return $this;
    }

    /**
     * @param array $durationArrayData
     */
    public function exchangeArray(array $durationArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $durationArrayData)) {
                // throw exception
            }
        }

        $durationTemplateId = $durationArrayData[self::KEY_TEMPLATE_ID];
        $durationDuration = $durationArrayData[self::KEY_DURATION];
        $durationName = $durationArrayData[self::KEY_NAME];
        $durationLinkName = $durationArrayData[self::KEY_LINK_NAME];
        $durationVideoUrl = $durationArrayData[self::KEY_VIDEO_URL];

        $this
            ->setTemplateId($durationTemplateId)
            ->setDuration($durationDuration)
            ->setName($durationName)
            ->setLinkName($durationLinkName)
            ->setVideoUrl($durationVideoUrl);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_TEMPLATE_ID => $this->getTemplateId(),
            self::KEY_DURATION => $this->getDuration(),
            self::KEY_NAME => $this->getName(),
            self::KEY_LINK_NAME => $this->getLinkName(),
            self::KEY_VIDEO_URL => $this->getVideoUrl(),
        ];
    }
}
