<?php
error_reporting(E_ALL);

class Test{
    private static $redis;

    public static function go() {
        try {
            self::$redis = new Redis();
            for ($i = 0; $i < 10; $i++) {
               $key = 'name' . $i;
                self::get($key);
                if ($i == 0) {
                    sleep(2);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
        }
    }

    private static function get($key) {
        try {
            self::$redis->pconnect('localhost', 6379, 0.1);
            $result = self::$redis->get($key);
            echo $key . ' --> ' . $result . "\n";
        } catch (Exception $e) {
            echo $key . ' --> ' . $e->getMessage() . "\n";
        }
    }
}

Test::go();
