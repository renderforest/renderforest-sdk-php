<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

namespace Renderforest;

use Renderforest\Error\RenderforestError;

class Params
{
    /**
     * Destructs given properties from the payload.
     * @param array $payload - The array to destruct.
     * @param array $props - The prop to destruct from array.
     * @return array
     */
    public function destructParams($payload, $props)
    {
        if (!isset($payload) || !sizeof($payload)) {
            return array();
        }

        return array_reduce($props, function ($acc, $prop) use ($payload) {
            if (isset($payload[$prop])) {
                $acc[$prop] = $payload[$prop];
            }

            return $acc;
        }, array());
    }

    /**
     * Destructs URL param from the payload.
     * @param array $payload - The array to destruct.
     * @param string $param - The param to destruct from array.
     * @return string
     * @throws RenderforestError
     */
    public function destructURLParam($payload, $param)
    {
        if (!isset($payload) || !sizeof($payload) || !isset($payload[$param])) {
            throw new RenderforestError("Missing required parameter: ${param}.");
        }

        return $payload[$param];
    }

    /**
     * Destructs optional URL param from the given payload.
     * @param array $payload - Thr array to destruct.
     * @param string $param - The param to destruct from array.
     * @return string
     * @throws RenderforestError
     */
    public function destructOptionalURLParam($payload, $param)
    {
        if (!isset($payload) || !sizeof($payload) || !isset($payload[$param])) {
            return '';

        }

        return $payload[$param];
    }
}
