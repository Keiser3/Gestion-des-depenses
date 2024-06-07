<?php 
 class Income{
  private $amount;
  private $user;

  public function __construct($amount,$user){
    $this->amount = $amount;
    $this->user = $user;
  }

  public function addNewIncome($conn){
    $sql = "SET NOCOUNT ON; EXEC InsertIncome '$this->amount','$this->user';";
    $stmt = sqlsrv_query($conn, $sql);
    if( $stmt === false ) {
       die( print_r( sqlsrv_errors(), true));
    }
  }
  public function deleteExpense($conn,$id){
    $sql = "SET NOCOUNT ON; EXEC DeleteIncomeById $id ;";
    $stmt = sqlsrv_query($conn, $sql);
    if( $stmt === false ) {
       die( print_r( sqlsrv_errors(), true));
    }
  }
 
 }





?>