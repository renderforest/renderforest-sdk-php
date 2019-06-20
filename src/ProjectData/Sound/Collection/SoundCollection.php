<?php

namespace Renderforest\ProjectData\Sound\Collection;

use Renderforest\ProjectData\Sound\ProjectDataSound;
use Renderforest\ProjectData\Sound\ProjectDataUserSound;

/**
 * Class SoundCollection
 * @package Renderforest\ProjectData\Sound\Collection
 */
class SoundCollection extends \Renderforest\Sound\Collection\SoundCollection
{
    /**
     * @param array $soundCollectionArrayData
     * @throws \Exception
     */
    public function exchangeArray(array $soundCollectionArrayData)
    {
        foreach ($soundCollectionArrayData as $soundArrayData) {
            if (array_key_exists(ProjectDataUserSound::KEY_USER_ID, $soundArrayData)) {
                $userSound = new ProjectDataUserSound();
                $userSound->exchangeArray($soundArrayData);

                $this->add($userSound);
            } else {
                $sound = new ProjectDataSound();
                $sound->exchangeArray($soundArrayData);

                $this->add($sound);
            }
        }
    }
}
