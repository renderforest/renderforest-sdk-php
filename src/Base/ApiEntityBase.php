<?php

namespace Renderforest\Base;

use Laminas\Stdlib\ArraySerializableInterface;

/**
 * Class EntityBase
 * @package Renderforest\Base
 */
abstract class ApiEntityBase implements ArraySerializableInterface
{
    /**
     * @param bool $prettyPrint
     * @return string
     */
    public function getJson($prettyPrint = false): string
    {
        $entityArrayCopy = $this->getArrayCopy();

        $jsonEncodeOptions = 0;
        if ($prettyPrint) {
            $jsonEncodeOptions = JSON_PRETTY_PRINT;
        }

        $entityJson = \GuzzleHttp\json_encode($entityArrayCopy, $jsonEncodeOptions);

        return $entityJson;
    }
}
