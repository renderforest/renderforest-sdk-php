<?php
/**
 * Copyright (c) 2018-present, Renderforest, LLC.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory.
 */

require_once(dirname(dirname(__FILE__)) . '/Singleton.php');

class Auth_util
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
     * @param $text {string}
     * @param $key {string}
     * @return string
     * Creates keyed-hash message authentication code (HMAC).
     *  Used core `hash_hmac` module cryptographic hash function.
     *  Secret key - sha512.
     */
    public function createHMAC($text, $key)
    {
        return hash_hmac("SHA512", $text, $key);
    }

    /**
     * @param {{clientId, qs, path, body, nonce, timestamp}} $options
     * @param {string} $key
     * @return string
     * Generates `HMAC` based on source and key.
     *  Source is defined as combination of clientId, path, qs, body, nonce and timestamp respectively.
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
     * @returns {string}
     * @description Generates nonce.
     *  Creates timestamp
     *  Gets the last 6 chars of the timestamp
     *  Generates random number between 10-99
     *  Combined the last two ones.
     */
    public function generateNonce()
    {
        $timestamp = $this->dateNow();
        $str = substr($timestamp, strlen($timestamp) - 6);
        $suffix = rand(10, 99);

        return $str . $suffix;
    }
}
