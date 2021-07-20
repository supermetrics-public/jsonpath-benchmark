<?php

declare(strict_types = 1);

namespace Supermetrics\JsonPath\Benchmarks\Tests;

use Supermetrics\JsonPath\Benchmarks\SoftCreatr;

class SoftCreatrBench extends AbstractJsonPathBench
{
    /**
     * @var SoftCreatr
     */
    protected SoftCreatr $softCreatr;

    public function __construct()
    {
        $this->softCreatr = new SoftCreatr();
    }

    /**
     * @return SoftCreatr
     */
    protected function getDriver(): SoftCreatr
    {
        return $this->softCreatr;
    }
}