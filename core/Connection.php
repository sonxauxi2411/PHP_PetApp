<?php

class Connection
{
    private static $instance = null, $conn = null;

    public function __construct($config)
    {
        //kết nối db
        try {

            //Cấu hình dsn
            $dsn = 'mysql:dbname=' . $config['db'] . ';host=' . $config['host'];

            //cấu hình $options
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];
            // câu lệnh kết nối
            $con = new PDO($dsn, $config['user'], $config['password'], $options);
            // var_dump($con);
            self::$conn = $con;


        } catch (Exception $exception) {
            $mess = $exception->getMessage();
            $data['message'] = $mess;
            echo $mess;
            App::$app->loadError('database', $data);
            die();
           
        }
    }
    public static function getInstance($config)
    {
        if (self::$instance == null) {

            $connection = new Connection($config);
            self::$instance = self::$conn;
        }

        return self::$instance;
    }

  
}
