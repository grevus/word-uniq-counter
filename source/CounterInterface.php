<?php declare(strict_types=1);

namespace Grevus\WordCounter;

/**
 * Interface CounterInterface
 *
 * @package Grevus\WordCounter
 */
interface CounterInterface
{
    /**
     * Get count
     *
     * @return int
     */
    public function getCount(): int;

    /**
     * @return \Grevus\WordCounter\CounterInterface
     */
    public function calculate(): CounterInterface;

    /**
     * @param \SplFileInfo $file
     *
     * @return \Grevus\WordCounter\CounterInterface
     */
    public function setFile(\SplFileInfo $file): CounterInterface;

    /**
     * @return \SplFileInfo
     */
    public function getFile(): \SplFileInfo;
}