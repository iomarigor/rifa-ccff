<?php

class Database{

    private $host;
    private $port;
    private $select_db;
    private $db;
    private $user;
    private $password;
    private $charset;
    private $PDO;

    public function __construct(){
        //echo 'initial DB | ';
        $this->host     = constant('HOST');
        $this->port     = constant('PORT');
        $this->select_db= constant('DB_SELECT');
        $this->db       = constant('DB_NAME');
        $this->user     = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset  = constant('CHARSET');
    }

    function connect(){
        //echo 'DB connecting | ';
        if($this->select_db==0){
            try {
                //echo 'mysql';
                $dsn = 'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->db . ";set lc_time_names='es_ES'";
                $opciones = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                );

                $this->PDO= new PDO($dsn, $this->user, $this->password, $opciones);

                $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo 'DB connect | ';
                return $this->PDO;
            } catch (PDOException $e) {
                $jsonData['tipo']="err";
                $jsonData['error']="Error al conectar con la Base de datos MySQL / MariaDB: ".var_dump($e);
                $jsonData['recomendacion']="Puede que no tenga activo el servidor o servicio, o no sean las credenciales correctas";
                echo json_encode($jsonData);
            }
        }elseif($this->select_db==1){
            try {
                //echo 'postgresql';
                $dsn= 'pgsql:host='.$this->host.';port=' . $this->port .'; dbname='.$this->db;
                $opciones = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                );
                $this->PDO = new PDO($dsn, $this->user, $this->password);
                $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo 'DB connect | ';
                return $this->PDO;
            } catch (PDOException $e) {
                $jsonData['tipo']="err";
                $jsonData['error']="Error al conectar con la Base de datos PostgreSQL: ".var_dump($e);
                $jsonData['recomendacion']="Puede que no tenga activo el servidor o servicio, o no sean las credenciales correctas";
                echo json_encode($jsonData);
            }
        }elseif($this->select_db==2){
            //sqlserver
            try {
                $dsn='sqlsrv:Server='.$this->host.',' . $this->port .'; Database='.$this->db;
                $opciones = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                );
                $this->PDO = new PDO($dsn, $this->user, $this->password,$opciones);
                $this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo 'DB connect | ';
                return $this->PDO;
            } catch (PDOException $e) {
                $jsonData['tipo']="err";
                $jsonData['error']="Error al conectar con la Base de datos SQLserver: ".var_dump($e);
                $jsonData['recomendacion']="Puede que no tenga activo el servidor o servicio, o no sean las credenciales correctas";
                echo json_encode($jsonData);
            }
        }
    }
    function disConnect(){
        //echo 'DB disconnect | ';
        $this->PDO=null;
    }
}

?>