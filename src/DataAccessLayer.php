<?php


class DataAccessLayer
{

    /**
     * DataAccessLayer constructor.
     */
    public function __construct()
    {
        $config = require(BASE_DIR . '/src/config/database.php');

        var_dump($config);
    }
}