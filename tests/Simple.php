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
     * @return \Grevus\WordCounter\CounterInterface
     */
    protected function getCounter($path)
    {
        return (new \Grevus\WordCounter\Simple())
            ->setFile(new \SplFileInfo($path))
            ;
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
        $counter = $this->getCounter($path)
            ->calculate()
        ;

        $this->assertEquals(
            $result,
            $counter->getCount()
        );
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Calculation first
     */
    public function testCountError()
    {
        $this->getCounter(__DIR__ . '/fixtures/example.txt')
            ->getCount()
        ;
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage File not readable
     */
    public function testNotFile()
    {
        $this->getCounter(__DIR__ . '/fixtures/not_exists_file.txt')
            ->getCount()
        ;
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