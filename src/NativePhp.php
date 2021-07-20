<?php

declare(strict_types = 1);

namespace Supermetrics\JsonPath\Benchmarks;

class NativePhp
{
    /**
     * @var array
     */
    protected array $dataset = [];

    /**
     * @param string $expression
     *
     * @return array
     */
    public function findFromDataset(string $expression): array
    {
        switch ($expression) {
            case '$.datasets.*.name':
                return $this->handleTinyNameList();
            case '$.datasets[0].rowAmount':
                return $this->handleTinyItemRowAmount();
            case '$[?(@.yearOfBirth < 1840)]':
                return $this->handleMediumArtistsBornBefore1840List();
            case '$.*.yearOfDeath':
                return $this->handleMediumArtistsYearOfDeathList();
            case '$.artworks.*.title':
                return $this->handleHugeArtworkTitleList();
            case '$.artworks[?(@.title =~ /Self( |-)Portrait/)]':
                return $this->handleHugeSelfPortraitsList();
            default:
                printf('ERROR: Expression `%s` not implemented for native PHP test, exiting...', $expression);
                exit(-1);
        }
    }

    /**
     * @param array $dataset
     */
    public function setDataset(array $dataset): void
    {
        $this->dataset = $dataset;
    }

    /**
     * @return int[]
     */
    protected function handleTinyItemRowAmount(): array
    {
        if (empty($this->dataset['datasets'])) {
            return [];
        }

        $item = reset($this->dataset['datasets']);

        if (isset($item['rowAmount'])) {
            return [$item['rowAmount']];
        }

        return [];
    }

    /**
     * @return string[]
     */
    protected function handleTinyNameList(): array
    {
        $result = [];

        if (empty($this->dataset['datasets'])) {
            return [];
        }

        foreach ($this->dataset['datasets'] as $item) {
            if (isset($item['name'])) {
                $result[] = $item['name'];
            }
        }

        return $result;
    }

    /**
     * @return array[]
     */
    protected function handleMediumArtistsBornBefore1840List(): array
    {
        $result = [];

        foreach ($this->dataset as $artist) {
            if (isset($artist['yearOfBirth']) && is_numeric($artist['yearOfBirth']) && $artist['yearOfBirth'] < 1840) {
                $result[] = $artist;
            }
        }

        return $result;
    }

    /**
     * @return array[]
     */
    protected function handleMediumArtistsYearOfDeathList(): array
    {
        $result = [];

        foreach ($this->dataset as $artist) {
            if (isset($artist['yearOfDeath'])) {
                $result[] = $artist['yearOfDeath'];
            }
        }

        return $result;
    }

    /**
     * @return array[]
     */
    protected function handleHugeArtworkTitleList(): array
    {
        $result = [];

        if (empty($this->dataset['artworks'])) {
            return [];
        }

        foreach ($this->dataset['artworks'] as $item) {
            if (isset($item['title'])) {
                $result[] = $item['title'];
            }
        }

        return $result;
    }

    /**
     * @return array[]
     */
    protected function handleHugeSelfPortraitsList(): array
    {
        $result = [];

        if (empty($this->dataset['artworks'])) {
            return [];
        }

        $pattern = '/Self( |-)Portrait/';

        foreach ($this->dataset['artworks'] as $item) {
            if (isset($item['title']) && preg_match($pattern, $item['title'])) {
                $result[] = $item;
            }
        }

        return $result;
    }
}
