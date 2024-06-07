CREATE PROCEDURE CreateUser
    @FirstName VARCHAR(50),
    @LastName VARCHAR(50),
    @Username VARCHAR(50),
    @PasswordHash VARCHAR(100),
    @Email VARCHAR(100)
AS
BEGIN
    INSERT INTO Users (FirstName, LastName, Username, PasswordHash, Email)
    VALUES (@FirstName, @LastName, @Username, @PasswordHash, @Email);
END;
-----------------------------------------------------
CREATE PROCEDURE InsertExpense
    @ExpAmount FLOAT,
    @Category INT,
    @Type INT,
    @User INT
AS
BEGIN
    INSERT INTO Expenses (ExpAmount, category, type, userId)
    VALUES (@ExpAmount, @Category, @Type, @User);
END;
--------------------------------------------------------
CREATE PROCEDURE DeleteExpenseById
    @ExpID INT
AS
BEGIN
    DELETE FROM Expenses
    WHERE ExpID = @ExpID;
END;
-------------------------------------------------------------
CREATE PROCEDURE InsertIncome
    @IncAmount FLOAT,
    @User INT
AS
BEGIN
    INSERT INTO Income (IncAmount, userId)
    VALUES (@IncAmount, @User);
END;
---------------------------------------------------------------
CREATE PROCEDURE DeleteIncomeById
    @Id INT
AS
BEGIN
    DELETE FROM Income WHERE IncomeID = '@Id'
END;
--------------------------------------------------------------------
