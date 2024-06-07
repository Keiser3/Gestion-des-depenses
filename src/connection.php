<?php
class Connection{
private $servername="DESKTOP-LHU92B9";
private $connectionInfo = array( "Database"=>"testDatabase", "UID"=>"admin", "PWD"=>"admin");
public $conn;
public function __construct(){
   $this->conn = sqlsrv_connect($this->servername, $this->connectionInfo);
   if (!$this->conn) {
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
   }
}
}

?>
