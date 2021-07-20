<?php

declare(strict_types = 1);

namespace Supermetrics\JsonPath\Benchmarks\Tests;

use Supermetrics\JsonPath\Benchmarks\JsonPathPhpExtension;

class JsonPathPhpExtensionBench extends AbstractJsonPathBench
{
    /**
     * @var JsonPathPhpExtension
     */
    protected JsonPathPhpExtension $jsonPathPhpExtension;

    public function __construct()
    {
        $this->jsonPathPhpExtension = new JsonPathPhpExtension();
    }

    /**
     * @return JsonPathPhpExtension
     */
    protected function getDriver(): JsonPathPhpExtension
    {
        return $this->jsonPathPhpExtension;
    }
}