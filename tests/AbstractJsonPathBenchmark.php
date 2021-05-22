<?php

declare(strict_types = 1);

namespace Supermetrics\JsonPath\Benchmarks\Tests;

abstract class AbstractJsonPathBenchmark
{
    /**
     * @param string $dataset
     * 
     * @return array
     */
    public function getDataset(string $dataset): array
    {
        $data = file_get_contents(dirname(__DIR__) . '/data/' . $dataset . '.json');
        return json_decode($data, true);
    }

    /**
     * @Revs(50000)
     * @Iterations(10)
     * @ParamProviders({"provideExpressionsForTinyDataset"})
     * @BeforeMethods("setUpTinyDataset")
     * @AfterMethods("tearDownTinyDataset")
     */
    public function benchTinyDataset(array $params): void
    {
        $this->getDriver()->findFromDataset($params['expression']);
    }

    /**
     * @return \Generator
     */
    public function provideExpressionsForTinyDataset(): \Generator
    {
        yield '$.datasets.*.name'       => ['expression' => '$.datasets.*.name'];
        yield '$.datasets[0].rowAmount' => ['expression' => '$.datasets[0].rowAmount'];
    }

    public function setUpTinyDataset(): void
    {
        $this->getDriver()->setDataset($this->getDataset('tiny'));
    }

    public function tearDownTinyDataset(): void
    {
        $this->getDriver()->setDataset([]);
    }

    /**
     * @Revs(500)
     * @Iterations(10)
     * @ParamProviders({"provideExpressionsForMediumDataset"})
     * @BeforeMethods("setUpMediumDataset")
     * @AfterMethods("tearDownMediumDataset")
     */
    public function benchMediumDataset(array $params): void
    {
        $this->getDriver()->findFromDataset($params['expression']);
    }

    /**
     * @return \Generator
     */
    public function provideExpressionsForMediumDataset(): \Generator
    {
        yield '$[?(@.yearOfBirth < 1840)]' => ['expression' => '$[?(@.yearOfBirth < 1840)]'];
    }

    public function setUpMediumDataset(): void
    {
        $this->getDriver()->setDataset($this->getDataset('medium'));
    }

    public function tearDownMediumDataset(): void
    {
        $this->getDriver()->setDataset([]);
    }

    /**
     * @Revs(10)
     * @Iterations(10)
     * @ParamProviders({"provideExpressionsForHugeDataset"})
     * @BeforeMethods("setUpHugeDataset")
     * @AfterMethods("tearDownHugeDataset")
     */
    public function benchHugeDataset(array $params): void
    {
        $this->getDriver()->findFromDataset($params['expression']);
    }

    /**
     * @return \Generator
     */
    public function provideExpressionsForHugeDataset(): \Generator
    {
        yield '$.artworks.*.title' => ['expression' => '$.artworks.*.title'];
    }

    public function setUpHugeDataset(): void
    {
        $this->getDriver()->setDataset($this->getDataset('huge'));
    }

    public function tearDownHugeDataset(): void
    {
        $this->getDriver()->setDataset([]);
    }

    abstract protected function getDriver();
}