<?php
declare(strict_types=1);


namespace Cratia\ORM\DBAL\Adapter\Interfaces;

/**
 * Interface ISqlPerformance
 * @package Cratia\ORM\DBAL\Adapter\Interfaces
 */
interface ISqlPerformance
{
    /**
     * @return float
     */
    public function getRuntime(): float;

    /**
     * @return string
     */
    public function getPrettyRunTime(): string;

    /**
     * @return string
     */
    public function getMemory(): string;
}