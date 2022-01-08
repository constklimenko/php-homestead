<?php

namespace Narcom\Core;

class DB
{
    private $configuration =[];
    private  $connection;

    /**
     * @param $connection
     */
    public function __construct()
    {
        $this->configuration = parse_ini_file('../src/Config/db_config.ini', true);

        $connection = mysqli_connect(
            $this->configuration['db']['host'],
            $this->configuration['db']['user'],
            $this->configuration['db']['password'],
            $this->configuration['db']['database']
        );
        if(!$connection){
            echo 'Невозможно подключиться к базе данных';
            die();
        }else{
            $this->connection = $connection;
        }
    }



    public  function  query($selectQuery, $connection){
        $selectResult = mysqli_query($connection, $selectQuery);
        if(!$selectResult){
            echo "ошибка выполнения запроса";
        }else{
            echo "<br>запрос выполнен, найдено строк:". mysqli_num_rows($selectResult). "<br>";
            return $selectResult;
        }
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection(){
        mysqli_close($this->connection);
    }



}