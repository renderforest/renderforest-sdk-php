<?php

namespace Renderforest\Project\Rendering\Entity;

use Renderforest\Base\EntityBase;

/**
 * Class Rendering
 *
 * @package Renderforest\Project\Rendering\Entity
 */
class Rendering extends EntityBase
{
    /**
     *  Example JSON
     *  {
     *      "renderQueueId": 3995088,
     *      "renderQueueState": "ready",
     *      "renderQueueQuality": 360,
     *      "renderQueueAvgTime": 2
     *  }
     */

    const KEY_RENDER_QUEUE_ID = 'renderQueueId';
    const KEY_RENDER_QUEUE_STATE = 'renderQueueState';
    const KEY_RENDER_QUEUE_QUALITY = 'renderQueueQuality';
    const KEY_RENDER_QUEUE_AVG_TIME = 'renderQueueAvgTime';

    const REQUIRED_KEYS = [
        self::KEY_RENDER_QUEUE_ID,
        self::KEY_RENDER_QUEUE_STATE,
        self::KEY_RENDER_QUEUE_QUALITY,
        self::KEY_RENDER_QUEUE_AVG_TIME,
    ];

    /** @var int */
    protected $renderQueueId;

    /** @var string */
    protected $renderQueueState;

    /** @var int */
    protected $renderQueueQuality;

    /** @var int */
    protected $renderQueueAvgTime;

    /**
     * @return int
     */
    public function getRenderQueueId(): int
    {
        return $this->renderQueueId;
    }

    /**
     * @param int $renderQueueId
     */
    private function setRenderQueueId(int $renderQueueId)
    {
        $this->renderQueueId = $renderQueueId;
    }

    /**
     * @return string
     */
    public function getRenderQueueState(): string
    {
        return $this->renderQueueState;
    }

    /**
     * @param string $renderQueueState
     */
    private function setRenderQueueState(string $renderQueueState)
    {
        $this->renderQueueState = $renderQueueState;
    }

    /**
     * @return int
     */
    public function getRenderQueueQuality(): int
    {
        return $this->renderQueueQuality;
    }

    /**
     * @param int $renderQueueQuality
     */
    private function setRenderQueueQuality(int $renderQueueQuality)
    {
        $this->renderQueueQuality = $renderQueueQuality;
    }

    /**
     * @return int
     */
    public function getRenderQueueAvgTime(): int
    {
        return $this->renderQueueAvgTime;
    }

    /**
     * @param int $renderQueueAvgTime
     */
    private function setRenderQueueAvgTime(int $renderQueueAvgTime)
    {
        $this->renderQueueAvgTime = $renderQueueAvgTime;
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        return [
            self::KEY_RENDER_QUEUE_ID => $this->getRenderQueueId(),
            self::KEY_RENDER_QUEUE_STATE => $this->getRenderQueueState(),
            self::KEY_RENDER_QUEUE_QUALITY => $this->getRenderQueueQuality(),
            self::KEY_RENDER_QUEUE_AVG_TIME => $this->getRenderQueueAvgTime(),
        ];
    }

    /**
     * @param array $renderingArrayData
     */
    public function exchangeArray(array $renderingArrayData)
    {
        foreach (self::REQUIRED_KEYS as $requiredKey) {
            if (false === array_key_exists($requiredKey, $renderingArrayData)) {
                // Throw exception
            }
        }

        $renderingQueueId = $renderingArrayData[self::KEY_RENDER_QUEUE_ID];
        $renderingQueueState = $renderingArrayData[self::KEY_RENDER_QUEUE_STATE];
        $renderingQueueQuality = $renderingArrayData[self::KEY_RENDER_QUEUE_QUALITY];
        $renderingQueueAvgTime = $renderingArrayData[self::KEY_RENDER_QUEUE_AVG_TIME];

        $this->setRenderQueueId($renderingQueueId);
        $this->setRenderQueueState($renderingQueueState);
        $this->setRenderQueueQuality($renderingQueueQuality);
        $this->setRenderQueueAvgTime($renderingQueueAvgTime);
    }
}
