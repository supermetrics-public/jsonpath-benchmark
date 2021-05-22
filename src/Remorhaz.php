<?php

declare(strict_types = 1);

namespace Supermetrics\JsonPath\Benchmarks;

use Remorhaz\JSON\Data\Value\DecodedJson\NodeObjectValue;
use Remorhaz\JSON\Data\Value\EncodedJson\NodeValueFactory;
use Remorhaz\JSON\Path\Processor\Processor;
use Remorhaz\JSON\Path\Query\QueryFactory;

class Remorhaz
{
    /**
     * @var Processor
     */
    protected Processor $processor;

    /**
     * @var QueryFactory
     */
    protected QueryFactory $queryFactory;

    /**
     * @var NodeObjectValue|NodeArrayValue
     */
    protected $document;

    /**
     * @param string $expression
     *
     * @return array
     */
    public function findFromDataset(string $expression): array
    {
        $query  = $this->queryFactory->createQuery($expression);
        $result = $this->processor->select($query, $this->document);

        return $result->decode();
    }

    /**
     * @param array $dataset
     */
    public function setDataset(array $dataset): void
    {
        $this->document     = NodeValueFactory::create()->createValue(json_encode($dataset));
        $this->processor    = Processor::create();
        $this->queryFactory = QueryFactory::create();
    }
}
