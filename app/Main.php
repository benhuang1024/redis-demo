<?php
/**
 * User: ben
 * Date: 19/7/8
 * Time: 14:00
 */

namespace App;

/**
 * Class main
 *
 * @package App
 */
class Main extends Basic
{

    /**
     * @return |null
     */
    public function run()
    {
        $res = Redis::getRedis('test');
        var_dump($res);
    }
}
