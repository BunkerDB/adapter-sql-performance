<?php
declare(strict_types=1);


use Cratia\ORM\DBAL\Adapter\SqlPerformance;
use PHPUnit\Framework\TestCase as PHPUnit_TestCase;

class SqlPerformanceTest extends PHPUnit_TestCase
{
    public function testConstructor1()
    {
        $time = -microtime(true);
        $time += microtime(true);
        $performance = new SqlPerformance($time);

        $this->assertInstanceOf(SqlPerformance::class, $performance);
        $this->assertIsString($performance->getMemory());
        $this->assertIsString($performance->getPrettyRunTime());
        $this->assertIsFloat($performance->getRuntime());
        $this->assertIsArray($performance->jsonSerialize());
        $this->assertArrayHasKey('runtime', $performance->jsonSerialize());
        $this->assertArrayHasKey('prettyRuntime', $performance->jsonSerialize());
        $this->assertArrayHasKey('memory', $performance->jsonSerialize());
    }
}