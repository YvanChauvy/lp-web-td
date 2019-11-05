<?php


class DB
{
    private $host = 'mysql-yvan-chauvy-lp-web.alwaysdata.net' ;
    private $port=3306;
    private $db = 'yvan-chauvy-lp-web_td' ;
    private $login = '193595' ;
    private $pwd = '123Azerty456' ;
    private $connection = null;
    private $request = null;

    public function connect(){
        $this->connection = new PDO("mysql:host=$this->host:$this->port;dbname=$this->db",$this->login,$this->pwd);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    public function prepare($statement,$placeholders = []){
        $this->request = $this->connection->prepare($statement);
        foreach ($placeholders as $key => $value){
            $this->request->bindParam(":$key",$value);
        }
    }


}