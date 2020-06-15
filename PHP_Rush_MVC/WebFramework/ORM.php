<?php

namespace WebFramework;

use \PDO;

class ORM
{

    private $db;

    private static $instance = null;

    /**
     * Private constructor so nobody else can instantiate it.
     */
    private function __construct()
    {
    }

    /**
     * Retrieve the static instance of the ORM.
     *
     * @return ORM - Instance of the ORM
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new ORM();
        }

        return self::$instance;
    }

    /**
     * Connect to a database.
     *
     * @param array $config - Database configuration
     * @return PDO - Instance of PDO used to interact with the connected DB.
     */
    public function connect(array $config)
    {
            try {
        $this->db = new PDO(
          "{$config['driver']}:host={$config['host']};dbname={$config['dbname']}",
          $config['username'],
          $config['password'],
          $config['options']
        );
        return $this->db;
      }
      catch (Exception $e) {
        echo $e->getMessage();
      }
    }

    //     try {
    //         $connectionString = $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['dbname'];
    //         if (!empty($config['port'])) {
    //             $connectionString .= ';port=' . $config['port'];
    //         }
    //         $this->db = new PDO(
    //             $connectionString,
    //             $config['username'],
    //             $config['password'],
    //             $config['options']
    //         );
    //         return $this->db;
    //     } catch (Exception $e) {
    //         echo $e->getMessage();
    //     }
    // }

    /**
     * Make a model instance managed by the ORM.
     *
     * @param Model $object - Object that will be persisted.
     */
    public function persist($object)
    {
        $user=[];
        $user['id']=$object[0]['id'];
        $user['username']=$object[0]['username'];
        $user['role']=$object[0]['role'];

        $this->flush($user);
    }

    /**
     * Synchronize each managed models with the database.
     */
    public function flush($object)
    {
        $username = $object['username'];
        $role = $object['role'];
        $id = $object['id'];

        $sql = "UPDATE users SET username = '$username', role  = '$role' WHERE id = '$id';";
        $orm = ORM::getInstance();
        $test = $orm->queryDB($sql);
        $result = $sql->execute();
        header("Location: /PHP_Rush_MVC/WebRoot/admin/users");

    }

    public function queryDB($_sql)
    {

        try {
            $config = require('../config/db.php');

            $_orm = ORM::getInstance();

            $conn = $_orm->connect($config);
            $statement = $conn->prepare($_sql);
            $statement->execute();
            $result = $statement->fetchAll();

            return $result;
        }

        catch(Exception $e) {
            echo $e->getMessage();
        }
    }


}
