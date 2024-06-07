<?php 
 class Expense{
     private $amount;
     private $category;
     private $type;
     private $user;
     
    public function __construct($amount,$category,$type,$user){
        $this->amount = $amount;
        $this->category = $category;
        $this->type = $type;
        $this->user = $user;
    }
    public function addNewExpense($conn){
        $sql = "SET NOCOUNT ON; EXEC InsertExpense '$this->amount','$this->category','$this->type','$this->user';";
        $stmt = sqlsrv_query($conn, $sql);
        if( $stmt === false ) {
           die( print_r( sqlsrv_errors(), true));
        }
    }
    public function deleteExpense($conn,$id){
        $sql = "SET NOCOUNT ON; EXEC DeleteExpenseById $id ;";
        $stmt = sqlsrv_query($conn, $sql);
        if( $stmt === false ) {
           die( print_r( sqlsrv_errors(), true));
        }
    }
 };
?>