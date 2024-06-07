
------------------------------------

CREATE TABLE Users (
    UserID INT PRIMARY KEY IDENTITY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Username VARCHAR(50) NOT NULL,
    PasswordHash VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    CreatedAt DATETIME DEFAULT GETDATE()
);


------------------------------------

CREATE TABLE ExpenseCategory(
    CatId INT PRIMARY KEY IDENTITY,
	CatName VARCHAR(50),
	CatLimit float(24)
);

---------------------------------------

CREATE TABLE ExpenseType(
    TypeID INT PRIMARY KEY IDENTITY,
	Typename VARCHAR(50)
);

----------------------------------------

CREATE TABLE Expenses (
    ExpID INT PRIMARY KEY IDENTITY,
    ExpAmount float(24),
	ExpTime DATETIME DEFAULT GETDATE(),
	category INT,
	type INT,
    user INT,
	CONSTRAINT fk_expense_category FOREIGN KEY (category)
    REFERENCES ExpenseCategory(CatId)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
	CONSTRAINT fk_expense_type FOREIGN KEY (type)
    REFERENCES ExpenseType(TypeId)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT fk_expense_user FOREIGN KEY (user)
    REFERENCES Users(userID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

-------------------------------------------------------


CREATE TABLE Income (
    IncomeID INT PRIMARY KEY IDENTITY,
	IncAmount float(24),
    userId INT,
	IncTime DATETIME DEFAULT GETDATE() ,
     CONSTRAINT fk_expense_user FOREIGN KEY (userId)
    REFERENCES Users(userID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
