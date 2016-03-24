<?php

class Database {

    private $DbLink = false;
    private $DbHost = "";
    private $DbUser = "";
    private $DbPass = "";
    private $DbName = "";
    private $DbErrors = array();
    private $DbErrorNum = 0;
    private $DbResultSet = null;

    public function __construct($db) {
        global $mysqlInfo;
        if ($db) {
            self::setDb($db);
        }
        self::connect();
    }

    private function setDb($data) {
        $this->DbHost = $data['host'];
        $this->DbUser = $data['user'];
        $this->DbPass = $data['password'];
        $this->DbName = $data['database'];
    }

    public function __destruct() {
        self::disconnect();
    }

    private function connect() {

        $this->DbLink = new \mysqli(
                $this->DbHost, $this->DbUser, $this->DbPass, $this->DbName
        );
        $this->DbLink->set_charset("utf8");
        if (mysqli_connect_errno()) {
            error_log("Framework:lib:mysql.lib.php->Mysql connection failed...");
        }
    }

    private function disconnect() {
        $this->DbLink->close();
    }

    public function query($query, $getResultSet = true) {

//@todo: real escape yapmayi unutma
        $this->DbResultSet = $this->DbLink->query($query);


        if (!$this->DbResultSet) {
            $this->DbErrors[$this->DbErrorNum++] = $this->DbLink->error;
            return $this->DbErrors;
        } elseif ($getResultSet) {

            return $this->getResultSet();
        }
    }

    public function affectedRows() {
        return $this->DbLink->affected_rows;
    }

    public function insertId() {
        return $this->DbLink->insert_id;
    }

    public function fetchAssoc() {
        return $this->DbResultSet->fetch_assoc();
    }

    public function numRows() {
        return $this->DbResultSet->num_rows;
    }

    private function getResultSet() {
        return $this->DbResultSet;
    }

    public function getErrors() {
        return $this->DbErrors;
    }

    public function realEscape($data) {
        return $this->DbLink->real_escape_string($data);
    }

}
