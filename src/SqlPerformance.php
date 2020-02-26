<?php
declare(strict_types=1);


namespace Cratia\ORM\DBAL\Adapter;

use Cratia\Common\Functions;
use Cratia\ORM\DBAL\Adapter\Interfaces\ISqlPerformance;
use JsonSerializable;

/**
 * Class SqlPerformance
 * @package Cratia\ORM\DBAL\Adapter
 */
class SqlPerformance implements ISqlPerformance, JsonSerializable
{
    /**
     * @var float
     */
    private $runtime;

    /**
     * @var string
     */
    private $memory;

    /**
     * @var string
     */
    private $prettyRunTime;

    /**
     * QueryPerformance constructor.
     * @param float $time
     */
    public function __construct(float $time)
    {
        $this->runtime = $time;
        $this->prettyRunTime = Functions::pettyRunTime($time);
        $this->memory = intval(memory_get_usage() / 1024 / 1024) . ' MB';
    }

    /**
     * @return float
     */
    public function getRuntime(): float
    {
        return $this->runtime;
    }

    /**
     * @return string
     */
    public function getMemory(): string
    {
        return $this->memory;
    }

    /**
     * @return string
     */
    public function getPrettyRunTime(): string
    {
        return $this->prettyRunTime;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return
            [
                'runtime' => $this->getRuntime(),
                'prettyRuntime' => $this->getPrettyRunTime(),
                'memory' => $this->getMemory()
            ];
    }
}