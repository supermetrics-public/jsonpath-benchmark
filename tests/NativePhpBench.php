<?php

declare(strict_types = 1);

namespace Supermetrics\JsonPath\Benchmarks\Tests;

use Supermetrics\JsonPath\Benchmarks\NativePhp;

class NativePhpBench extends AbstractJsonPathBench
{
    /**
     * @var NativePhp
     */
    protected NativePhp $nativePhp;

    public function __construct()
    {
        $this->nativePhp = new NativePhp();
    }

    /**
     * @return NativePhp
     */
    protected function getDriver(): NativePhp
    {
        return $this->nativePhp;
    }
}