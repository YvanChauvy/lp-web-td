<?php


class DB
{
    private $host = 'mysql-yvan-chauvy-lp-web.alwaysdata.net';
    private $port = 3306;
    private $db = 'yvan-chauvy-lp-web_td';
    private $login = '193595';
    private $pwd = '123Azerty456';
    private $connection = null;
    private $request = null;

    public function connect()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host:$this->port;dbname=$this->db", $this->login, $this->pwd);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function prepare($statement, $placeholders = [])
    {
        try {
            $this->request = $this->connection->prepare($statement);
            foreach ($placeholders as $key => $value) {
                $this->request->bindParam(":$key", $value);
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function query()
    {
        try {
            $this->request->execute();
        } catch (PDOException $e) {
            ?>
            <p><strong>Caught <?= get_class($e) ?></strong>: <?= $e->getMessage() ?></p>
            <p>Query <?= $query ?></p>
            <p>Query parameters:
            <pre><?= var_export($queryParameters, true) ?></pre></p>
            <p>Exception trace:
            <pre><?= $e->getTraceAsString() ?></pre></p>
            <?php
            die();
        }
    }


    public
    function fetch($fetchType = PDO::FETCH_ASSOC)
    {
        try {
            return $this->request->fetch($fetchType);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}