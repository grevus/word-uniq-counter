<?php declare(strict_types=1);

namespace Grevus\WordCounter;

/**
 * Class Simple
 *
 * @package Grevus\WordCounter
 */
class Simple implements CounterInterface
{
    /**
     * @var \SplFileInfo
     */
    private $_file;

    /**
     * @var int
     */
    private $_result = null;

    /**
     * Get count
     *
     * @return int
     */
    public function getCount(): int
    {
        if ($this->_result === null)
            throw new \LogicException('Calculation first');

        return $this->_result;
    }

    /**
     * Calculate
     *
     * @return \Grevus\WordCounter\CounterInterface
     */
    public function calculate(): CounterInterface
    {
        $this->_result = count(
            array_unique(
                str_word_count(
                    file_get_contents($this->getFile()->getPathname()),
                    1
                )
            )
        );

        return $this;
    }

    /**
     * @return \SplFileInfo
     */
    public function getFile(): \SplFileInfo
    {
        return $this->_file;
    }

    /**
     * @param \SplFileInfo $file
     *
     * @return \Grevus\WordCounter\CounterInterface
     */
    public function setFile(\SplFileInfo $file): CounterInterface
    {
        if (!$file->isReadable() || !$file->isFile())
            throw new \InvalidArgumentException('File not readable');

        $this->_file = $file;

        return $this;
    }
}