<?php

declare(strict_types = 1);

namespace Supermetrics\JsonPath\Benchmarks;

use JsonPath\JsonObject;

class Galbar
{
    /**
     * @var JsonObject
     */
    protected JsonObject $jsonPath;

    /**
     * @param string $expression
     *
     * @return array
     */
    public function findFromDataset(string $expression): array
    {
        return $this->jsonPath->get($expression);
    }

    /**
     * @param array $dataset
     */
    public function setDataset(array $dataset): void
    {
        if (empty($dataset)) {
            unset($this->jsonPath);
        } else {
            $this->jsonPath = new JsonObject($dataset);
        }
    }
}
