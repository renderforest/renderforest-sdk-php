<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require_once "Error.php";

class Params
{
    /**
     * @param $payload
     * @param $props
     * @return object
     * @description Destruct given properties from the payload.
     */
    public function destructParams($payload, $props)
    {
        if (!$payload || !sizeof(get_object_vars($payload))) {
            return (object)array();
        }

        return array_reduce($props, function ($acc, $prop) use ($payload) {
            if (isset($payload[$prop])) {
                $acc[$prop] = $payload[$prop];
            }

            return $acc;
        }, (object)array());
    }

    /**
     * @param $payload
     * @param $param
     * @return mixed
     * @throws RenderforestError
     * @description Destruct URL param from the payload.
     */
    public function destructURLParam($payload, $param)
    {
        if (isset($payload) || !sizeof(get_object_vars($payload)) || isset($payload[$param])) {
            throw new RenderforestError("Missing required parameter: ${param}.");
        }

        return $payload[$param];
    }
}
