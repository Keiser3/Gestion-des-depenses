CREATE FUNCTION GetUserByUsername
(
    @Username VARCHAR(50)
)
RETURNS TABLE
AS
RETURN
(
    SELECT FirstName, LastName, Username, PasswordHash
    FROM Users
    WHERE Username = @Username
);
----------------------------------------------------------------

CREATE FUNCTION GetAllExpensesWithDetails()
RETURNS TABLE
AS
RETURN
(
    SELECT e.ExpID,
           e.ExpAmount,
           e.ExpTime,
           ec.CatName AS Category,
           et.TypeName AS Type,
           u.FirstName + ' ' + u.LastName AS UserName
    FROM Expenses e
    INNER JOIN ExpenseCategory ec ON e.category = ec.CatId
    INNER JOIN ExpenseType et ON e.type = et.TypeId
    INNER JOIN Users u ON e.userId = u.UserID
);
-------------------------------------------------------------------


CREATE FUNCTION GetIncomesWithUserName()
RETURNS TABLE
AS
RETURN
(
    SELECT i.IncomeID, i.IncAmount, u.UserName, i.IncTime
    FROM Income i
    INNER JOIN Users u ON i.userId = u.userID
);
