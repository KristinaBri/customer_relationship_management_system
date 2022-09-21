<?php

    class DB {
        private static $pdo=null;

        private function __construct()
        {
        }

        public static function getPDO() {
            if (self::$pdo==null) {
                $dsn="mysql:host=localhost;dbname=customers_crm;charset=utf8mb4";
                self::$pdo=new PDO($dsn, 'root','');
            }
            return self::$pdo;
        }


    }
