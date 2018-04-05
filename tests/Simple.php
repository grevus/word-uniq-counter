<?php

namespace GrevusTest\WordCounter;

/**
 * Class Simple
 *
 * @package GrevusTest\WordCounter
 */
class Simple extends \PHPUnit\Framework\TestCase
{
    /**
     * @param $path
     *
     * @return \Grevus\WordCount\Simple
     */
    protected function getCounter($path)
    {
        return new \Grevus\WordCount\Simple(
            new \SplFileInfo($path)
        );
    }

    /**
     *
     * @dataProvider providerTestCount
     *
     * @param string $path
     * @param int $result
     */
    public function testCount($path, $result)
    {
        $counter = $this->getCounter($path);

        $this->assertEquals(
            $result,
            $counter->getCount()
        );
    }

    /**
     * Provider test count
     *
     * @return array
     */
    public function providerTestCount()
    {
        return [
            [__DIR__ . '/fixtures/example.txt', 6],
        ];
    }

}