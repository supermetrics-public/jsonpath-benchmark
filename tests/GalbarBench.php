<?php

declare(strict_types = 1);

namespace Supermetrics\JsonPath\Benchmarks\Tests;

use Supermetrics\JsonPath\Benchmarks\Galbar;

class GalbarBench extends AbstractJsonPathBench
{
    /**
     * @var Galbar
     */
    protected Galbar $galbar;

    public function __construct()
    {
        $this->galbar = new Galbar();
    }

    /**
     * @return Galbar
     */
    protected function getDriver(): Galbar
    {
        return $this->galbar;
    }
}