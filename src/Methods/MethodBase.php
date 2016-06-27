<?php

namespace Dawehner\Bluehornet\Methods;

abstract class MethodBase
{
    /**
     * The method name.
     *
     * @var string
     */
    protected $methodName;

    /**
     * Creates a new MethodBase instance.
     * @param string $methodName
     *   The method name.
     */
    public function __construct($methodName)
    {
        $this->methodName = $methodName;
    }


    public function toArray()
    {
        return [
            'methodname' => $this->methodName,
        ];
    }

    /**
     * @return string
     */
    public function getMethodName()
    {
        return $this->methodName;
    }

}
