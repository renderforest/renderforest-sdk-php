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
     * @param array $payload
     * @param array $props
     * @return array
     * @description Destruct given properties from the payload.
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
     * @param array $payload
     * @param string $param
     * @return mixed
     * @throws RenderforestError
     * @description Destruct URL param from the payload.
     */
    public function destructURLParam($payload, $param)
    {
        if (!isset($payload) || !sizeof($payload) || !isset($payload[$param])) {
            throw new RenderforestError("Missing required parameter: ${param}.");
        }

        return $payload[$param];
    }
}
