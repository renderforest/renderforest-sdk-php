<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

namespace Renderforest\Auth;

use Renderforest\Singleton;

class AuthUtil
{
    use Singleton;

    /**
     * Generate timestamp with milliseconds.
     */
    public function dateNow()
    {
        return round(microtime(true) * 1000);
    }

    /**
     * Creates keyed-hash message authentication code (HMAC) based on given `$text` and `$key`.
     * @param string $text
     * @param string $key
     * @return string
     */
    public function createHMAC($text, $key)
    {
        return hash_hmac("SHA512", $text, $key);
    }

    /**
     * Generates `HMAC` based on given `$options` and `$key`.
     * Source is defined as combination of clientId, path, qs, body, nonce and timestamp respectively.
     * @param array $options
     * @param string $key
     * @return string
     */
    public function generateHash($options, $key)
    {
        $clientId = $options['clientId'];
        $qs = $options['qs'];
        $path = $options['path'];
        $body = $options['body'];
        $nonce = $options['nonce'];
        $timestamp = $options['timestamp'];
        $hashSource = $clientId . $path . $qs . $body . $nonce . $timestamp;

        return $this->createHMAC($hashSource, $key);
    }

    /**
     * Generates nonce.
     *  Creates timestamp
     *  Gets the last 6 chars of the timestamp
     *  Generates random number between 10-99
     *  Combined the last two ones.
     * @returns string
     */
    public function generateNonce()
    {
        $timestamp = $this->dateNow();
        $str = substr($timestamp, strlen($timestamp) - 6);
        $suffix = rand(10, 99);

        return $str . $suffix;
    }
}
