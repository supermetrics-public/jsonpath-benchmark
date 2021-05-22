<?php

declare(strict_types = 1);

namespace Supermetrics\JsonPath\Benchmarks;

use Flow\JSONPath\JSONPath;

class SoftCreatr
{
    /**
     * @var JSONPath
     */
    protected JSONPath $jsonPath;

    /**
     * @param string $expression
     *
     * @return array
     */
    public function findFromDataset(string $expression): array
    {
        return $this->jsonPath->find($expression)->getData();
    }

    /**
     * @param array $dataset
     */
    public function setDataset(array $dataset): void
    {
        if (empty($dataset)) {
            unset($this->jsonPath);
        } else {
            $this->jsonPath = new JSONPath($dataset);
        }
    }
}
