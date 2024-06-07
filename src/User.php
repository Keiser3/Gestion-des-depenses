<?php 
 class User 
  {
    private $userID;
    private $firstName;
    private $lastName;
    private $userName;
    private $email;
    private $passwordHash;
    public $errMsg ='';
    public $budget;
   

    public function __construct(/*$ID, $fname, $lname, $uname, $email, $password*/){
      /*  $this->userID = $ID;
        $this->userName = $uname;
        $this->email = $email;
        $this->passwordHash = password_hash($password,PASSWORD_DEFAULT);*/
        $this->userID = 0;
        $this->userName = '';
        $this->firstName = '';
        $this->lastName = '';
        $this->email = '';
        $this->passwordHash = '';
    }
    
    public function initUser($fname, $lname, $uname, $email, $password){
        $this->userName = $uname;
        $this->firstName = $fname;
        $this->lastName = $lname;
        $this->email = $email;
        $this->passwordHash = password_hash($password,PASSWORD_DEFAULT);

    }
    public function fetchUser($conn, $uname){
        $sql = "SET NOCOUNT ON; SELECT * FROM GetUserByUsername('$uname');";
        $stmt = sqlsrv_query( $conn, $sql);
     //   var_dump(sqlsrv_has_rows($stmt));
     /*   if( sqlsrv_fetch( $stmt ) === false) {
            $this->errMsg = 'USER DOES NOT EXIST!';
            print_r( sqlsrv_errors(), true);
        }else {*/
          /*  $result = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
            var_dump($result);*/
            if (sqlsrv_has_rows($stmt)) {
                while( $result = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_ASSOC) ) {
                    var_dump($result);
                    $this->userID = $result['UserID'];
                    $this->userName = $result['Username'];
                    $this->firstName = $result['FirstName'];
                    $this->lastName = $result['LastName'];
                    $this->passwordHash = $result['PasswordHash'];
                    $this->email = $result['email'];
                    $this->errMsg = 'VERIFIED';
                    $_SESSION['userID'] = $this->userID;
                }
            }
       /*     while( $result = sqlsrv_fetch_array( $stmt,SQLSRV_FETCH_ASSOC) ) {
                var_dump($result);
                $this->userID = $result['UserID'];
                $this->userName = $result['Username'];
                $this->firstName = $result['FirstName'];
                $this->lastName = $result['LastName'];
                $this->passwordHash = $result['PasswordHash'];
                $this->email = $result['email'];
                $this->errMsg = 'VERIFIED';
            }*/
          /*  $this->userID = $result['UserID'];
            $this->userName = $result['Username'];
            $this->firstName = $result['FirstName'];
            $this->lastName = $result['LastName'];
            $this->email = $result['Email'];
            $this->passwordHash = $result['PasswordHash'];
            $this->errMsg = 'VERIFIED';*/
       // } 
    }
   public function register($conn){
     $sql = "SET NOCOUNT ON; EXEC CreateUser '$this->firstName','$this->lastName','$this->userName','$this->passwordHash','$this->email';";
     $stmt = sqlsrv_query($conn, $sql);
     if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
     }
   }
   public function authenticate($passwordIn){
     if (!password_verify($passwordIn,$this->passwordHash)) {
        return false;
     }
     else return true;
   }
   public function setBudget($budget){
      $this->budget = $budget;
   }
   public function getUserID(){
     return $this->userID;
   }
   public function printUser(){
     var_dump($this);
   }
}
?> 



            