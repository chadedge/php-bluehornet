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
