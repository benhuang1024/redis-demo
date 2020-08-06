<?php
/**
 * User: ben
 * Date: 19/7/8
 * Time: 14:00
 */

namespace App;

use Noodlehaus\Config;

/**
 * Class main
 *
 * @package App
 */
class Redis
{
    private static $instance;
    private static $config;

    private function __construct()
    {

    }

    private function __clone()
    {
    }


    /**
     * @param string $key
     *
     * @return mixed
     */
    public static function getRedis($key)
    {
        self::initInstance();
        return self::$instance->get($key);
    }

    /**
     * @param string $key
     * @param        $value
     * @param int $setex
     *
     * @return mixed
     */
    public static function setRedis($key, $value, $setex = 10)
    {
        return self::$instance->set($key, $value, $setex);
    }

    private static function initInstance()
    {
        self::$config = Config::load(__DIR__ . '/../config/app.php');
        self::$instance = new \RedisCluster(null, self::$config->get('REDIS_CLIENT'));
    }


}
