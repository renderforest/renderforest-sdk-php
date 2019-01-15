<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

namespace Renderforest;

trait Singleton
{
    static private $instance = null;

    /**
     * Singleton constructor. Prevent user to use class with new keyword.
     */
    private function __construct()
    {
        return self::$instance;
    }

    /**
     * Get instance method
     * @return static
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
