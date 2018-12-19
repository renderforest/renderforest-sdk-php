<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

namespace Renderforest\ProjectData;

class ProjectDataUtil
{
    /**
     * Sets `screen.order` value to given `index`.
     * @param array $screen - The screen to normalize.
     * @param integer $index - The value to set.
     * @return array
     */
    private function normalizeOrders($screen, $index)
    {
        $screen['order'] = $index;
        return $screen;
    }

    /**
     * Sort factory. Sorting function which sorts with given `prop`.
     * @param string $prop - The property to sort with.
     * @return \Closure
     */
    private function sortFactory($prop)
    {
        return function ($a, $b) use ($prop) {
            return intval($a[$prop]) - intval($b[$prop]);
        };
    }

    /**
     * Inserts screen at the right order.
     * @param $screens - The screens array.
     * @param $newScreen - The screen to insert.
     * @return array
     */
    private function insertScreenAtOrder($screens, $newScreen)
    {
        $screensLength = count($screens);
        if ($screensLength === 0) {
            return [$newScreen];
        }

        if ($newScreen['order'] >= $screens[$screensLength - 1]['order']) {
            array_push($screens, $newScreen);
            return $screens;
        }

        if ($newScreen['order'] < 0) {
            array_unshift($screens, $newScreen);
            return $screens;
        }

        return array_reduce($screens, function ($acc, $screen) use ($newScreen) {
            if ($screen['order'] === $newScreen['order']) {
                array_push($acc, $newScreen);
            }

            array_push($acc, $screen);

            return $acc;
        }, []);
    }

    /**
     * Inserting new screen, arranges screens by `screen.order` and normalize orders to have consequent numbers.
     * @param array $screens - The screens array.
     * @param array $newScreen - The screen to insert.
     * @return array
     */
    public function insertAndNormalizeOrder($screens, $newScreen)
    {
        $screensWithNewScreen = $this->insertScreenAtOrder($screens, $newScreen);
        usort($screensWithNewScreen, $this->sortFactory('order'));

        return array_map(
            array(__CLASS__, 'normalizeOrders'),
            $screensWithNewScreen,
            array_keys($screensWithNewScreen)
        );
    }
}
