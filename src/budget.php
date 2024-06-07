<?php 
class Budget{
    private $incomes;
    private $expenses;
    private $incomeTotal;
    private $expenseTotal;

    public function __construct($conn){
        $result=[];
        $result2=[];
        $sql = "SET NOCOUNT ON; SELECT * FROM GetAllExpensesWithDetails();";
        $stmt = sqlsrv_query( $conn, $sql);
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
           $result[] = $row ;
        }
        $this->expenses = json_encode($result);
        
        $sql = "SET NOCOUNT ON; SELECT * FROM GetIncomesWithUserName();";
        $stmt = sqlsrv_query( $conn, $sql);
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
           $result2[] = $row ;
        }
        $this->incomes = json_encode($result2);
      }
    public function getExpenses(){
        return $this->expenses;
    }
    public function getIncomes(){
        return $this->incomes;
    }
};

?>