<?php

class banco {

    public static function con() {
        try {
            $base = parse_ini_file('config/conf.ini', true);
            $base = $base['db'];

            $link = new mysqli($base['host'], $base['user'], $base['password'], $base['database']);
            return $link;
        } catch (Exception $ex) {
            die("Não foi possível conectar em " . DB_HOST . ":" . DB_BASE . "\n");
        }
    }

}
