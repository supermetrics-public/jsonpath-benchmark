<?php

declare(strict_types = 1);

namespace Supermetrics\JsonPath\Benchmarks\Tests;

use Supermetrics\JsonPath\Benchmarks\Remorhaz;

/**
 * @Skip
 */
class RemorhazBenchmark extends AbstractJsonPathBenchmark
{
    /**
     * @var Remorhaz
     */
    protected Remorhaz $remorhaz;

    public function __construct()
    {
        $this->remorhaz = new Remorhaz();
    }

    /**
     * @return Remorhaz
     */
    protected function getDriver(): Remorhaz
    {
        return $this->remorhaz;
    }
}