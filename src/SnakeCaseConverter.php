<?php

namespace Dawehner\Bluehornet;

use Symfony\Component\Serializer\NameConverter\NameConverterInterface;

/**
 * Camelcase name converter with excludes and manual mapping.
 */
class SnakeCaseConverter implements NameConverterInterface
{
    /**
     * Excluded properties from the camelcasing.
     *
     * @var array
     */
    protected $excludes = [];

    /**
     * Hardcoded mappings.
     *
     * @var array
     */
    protected $mapping = [];

    /**
     * Creates a new SnakeCaseConverter instance.
     *
     * @param array $excludes
     *                        Properties which should not be camelcased.
     * @param array $mapping
     *                        A hardcoded mapping for names.
     */
    public function __construct(array $excludes = [], array $mapping = [])
    {
        $this->excludes = $excludes;
        $this->mapping = $mapping;
    }

    public function normalize($propertyName)
    {
        if (isset($this->mapping[$propertyName])) {
            return $this->mapping[$propertyName];
        }
        if (!in_array($propertyName, $this->excludes)) {
            $snakeCasedName = '';

            $len = strlen($propertyName);
            for ($i = 0; $i < $len; ++$i) {
                if (ctype_upper($propertyName[$i])) {
                    $snakeCasedName .= '_'.strtolower($propertyName[$i]);
                } else {
                    $snakeCasedName .= strtolower($propertyName[$i]);
                }
            }

            return $snakeCasedName;
        }

        return $propertyName;
    }

    public function denormalize($propertyName)
    {
        $reverseMapping = array_flip($this->mapping);
        if (isset($reverseMapping[$propertyName])) {
            return $reverseMapping[$propertyName];
        }

        $camelCasedName = preg_replace_callback('/(^|_|\.)+(.)/', function ($match) {
            return ('.' === $match[1] ? '_' : '').strtoupper($match[2]);
        }, $propertyName);

        $camelCasedName = lcfirst($camelCasedName);

        if (!in_array($camelCasedName, $this->excludes)) {
            return lcfirst($camelCasedName);
        }

        return $propertyName;
    }
}
