<?php
namespace Suggestotron;

class Db {
    static protected $instance = null;

    protected $connection = null;
    protected function __construct() {
        $config = \Suggestotron\Config::get('database');

        $this->connection = new \PDO("mysql:host=" .$config['hostname']. ";dbname=" .$config['dbname'], $config['username'], $config['password']);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    static public function getInstance()
    {
        if (!(static::$instance instanceof static)) {
            static::$instance = new static();
        }

        return static::$instance->getConnection();
    }
}