<?php

namespace MylSoft\Baner\Model;

use Magento\Framework\Logger\Handler\Base;
use Monolog\Logger;

class Debug extends Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/info.log';

    /**
     * @var int
     */
    protected $loggerType = Logger::DEBUG;
}
