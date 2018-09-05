<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

/**
 * Trait Singleton.
 */
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
     * Prevent user to clone class.
     * @return Singleton
     */
    private function __clone()
    {
        return self::$instance;
    }

    /**
     * Prevent user to copy class via unserialize.
     * @return Singleton
     */
    private function __wakeup()
    {
        return self::$instance;
    }

    /**
     * @return Singleton
     */
    static public function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
