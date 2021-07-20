<?php

declare(strict_types = 1);

namespace Supermetrics\JsonPath\Benchmarks;

use JsonPath\JsonPath;

class JsonPathPhpExtension
{
    /**
     * @var array
     */
    protected array $dataset = [];

    /**
     * @var JsonPath
     */
    protected JsonPath $jsonPath;

    /**
     * @param string $expression
     *
     * @return array
     */
    public function findFromDataset(string $expression): array
    {
        return $this->jsonPath->find($this->dataset, $expression);
    }

    /**
     * @param array $dataset
     */
    public function setDataset(array $dataset): void
    {
        $this->dataset  = $dataset;
        $this->jsonPath = new JsonPath();
    }
}
