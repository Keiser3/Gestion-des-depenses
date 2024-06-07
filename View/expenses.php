
<?php
include('../src/dbConnect.php');
include('../src/budget.php');
include('../src/Expense.php');
if (!isset($_SESSION['userID'])) {
	header('Location: login.php');
}
$budget = new Budget($db->conn);
if (isset($_POST['cat']) && isset($_POST['type']) && isset($_POST['amount'])) {
   $expense = new Expense($_POST['amount'], $_POST['cat'], $_POST['type'],$_SESSION['userID']);
   $expense->addNewExpense($db->conn);
   header('Location: expenses.php');
}

?>
<!DOCTYPE html> 
<html> 
<head> 
	<title>Expense Tracker</title> 
	<link rel="stylesheet" type="text/css" href="../Styles/indexStyle.css" /> 
	<link rel="icon" type="image/x-icon" href="../Assets/main.ico">
</head> 

<body> 
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="expenses.php">Expenses</a>
  <a href="incomes.php">Incomes</a>
  <a href="#">Signout</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">&#9776;</button>
</div>
	<div class="container"> 
		<h1>Expense Tracker</h1> 
		<form id="expense-form" method='post'> 
		<select id="cat" name="cat" placeholder="Category" required>
			<option value="1">Food</option>
			<option value="2">Health</option>
			<option value="3">Transport</option>
			<option value="4">Leisure</option>
			<option value="5">housing</option>
			<option value="6">Misc</option>
		</select>
		<select id="type" name="type" placeholder="Type" required>
			<option value="1">Cash</option>
			<option value="2">Card</option>
		</select>
			<input type="text"
				id="expense-amount" placeholder="Amount" name ='amount' required /> 
			<button type="submit"> 
				Add Expense 
			</button> 
		</form> 
		<div class="expense-table"> 
			<table> 
				<thead> 
					<tr> 
						<th>Expense Category</th> 
						<th>Amount</th> 
						<th>Action</th> 
					</tr> 
				</thead> 
				<tbody id="expense-list"></tbody> 
			</table> 
			<div class="total-amount"> 
				<strong>Total:</strong> 
				MAD<span id="total-amount">0</span> 
			</div> 
		</div> 
	</div> 
	<script >
        const expenseForm = 
	document.getElementById("expense-form"); 
const expenseList = 
	document.getElementById("expense-list"); 
const totalAmountElement = 
	document.getElementById("total-amount"); 

let expenses = <?= $budget->getExpenses()?>;


console.log(expenses);
function renderExpenses() {  
	expenseList.innerHTML = "";  
	let totalAmount = 0; 
	for (let i = 0; i < expenses.length; i++) { 
		const expense = expenses[i]; 
		const expenseRow = document.createElement("tr"); 
		expenseRow.innerHTML = ` 
			<td>${expense.Category}</td> 
			<td>$${Math.ceil(expense.ExpAmount*100)/100}</td> 
			<td class="delete-btn" data-id="${i}">Delete</td> 
			`; 
		expenseList.appendChild(expenseRow); 
		totalAmount += expense.ExpAmount; 
	} 
	totalAmountElement.textContent = totalAmount.toFixed(2); 
} 
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
renderExpenses();
    </script> 
</body> 

</html>