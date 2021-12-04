  CREATE TABLE IF NOT EXISTS User (
   `UID` INT AUTO_INCREMENT,
   `_NAME` VARCHAR(255) NOT NULL,
   `CC` CHAR(16) NOT NULL,
   `ADDRESS` VARCHAR(255) NOT NULL,
   PRIMARY KEY (`UID`)
 );
  
 CREATE TABLE IF NOT EXISTS Worker (
    `WID` CHAR(4) PRIMARY KEY,
    `_NAME` VARCHAR(255) NOT NULL
  );
  
  CREATE TABLE IF NOT EXISTS Ord (
    `ORDERNUM` INT AUTO_INCREMENT,
    `TOTAL` DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (`ORDERNUM`)
  );
  
  CREATE TABLE IF NOT EXISTS Items (
    `IID` CHAR(4) PRIMARY KEY,
    `_NAME` VARCHAR(255) NOT NULL,
    `COST` DECIMAL(10,2) NOT NULL
  );

  CREATE TABLE IF NOT EXISTS Fullfilment (
    `NUMBER` INT AUTO_INCREMENT,
    `_STATUS` CHAR(1) NOT NULL,
    `QTY` DECIMAL(10,2) NOT NULL,
    `NOTE` VARCHAR(255),
    PRIMARY KEY (`NUMBER`)
  );
  
  CREATE TABLE IF NOT EXISTS Cart (
    `ORDERNUM` INT AUTO_INCREMENT,
    `TOTAL` DECIMAL(10,2) NOT NULL,
    `_NAME` VARCHAR(255) NOT NULL,
    `_COUNT` INT NOT NULL,
    PRIMARY KEY (`ORDERNUM`, `TOTAL`)
  );
  
  CREATE TABLE IF NOT EXISTS Contains (
    `ORDERNUM1` INT NOT NULL,
    `ORDERNUM2` INT NOT NULL,
    FOREIGN KEY (`ORDERNUM2`) REFERENCES `Cart`(`ORDERNUM`),
    PRIMARY KEY (`ORDERNUM1`)
  );
  
  CREATE TABLE IF NOT EXISTS Instock (
    `IID` CHAR(4) NOT NULL,
    `QTY` INT UNSIGNED NOT NULL,
    `_NAME` VARCHAR(255) NOT NULL,
    `COST` DECIMAL(10,2) NOT NULL,
    `ITEMTYPE` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`IID`)
  );
  
  CREATE TABLE IF NOT EXISTS Outstock (
    `IID` CHAR(4) NOT NULL,
    `QTY` INT NOT NULL,
    `_NAME` VARCHAR(255) NOT NULL,
    `COST` DECIMAL(10,2) NOT NULL,
    `LOCATION` VARCHAR(255) NOT NULL,
    `ITEMTYPE` VARCHAR(255) NOT NULL,
    FOREIGN KEY (`IID`) REFERENCES `Items`(`IID`),
   PRIMARY KEY (`IID`)
  );
  
  CREATE TABLE IF NOT EXISTS Checkout (
    `SUM` DECIMAL(10,2) NOT NULL,
    `IID` CHAR(4) NOT NULL,
    `QTY` INT NOT NULL,
    `NUM` INT NOT NULL,
    FOREIGN KEY (`IID`) REFERENCES `Items`(`IID`),
    PRIMARY KEY (`NUM`)
  );
  
  CREATE TABLE IF NOT EXISTS Purchase (
    `IID` CHAR(4) NOT NULL,
    `UID` INT NOT NULL,
    FOREIGN KEY (`IID`) REFERENCES `Items`(`IID`),
    FOREIGN KEY (`UID`) REFERENCES `User`(`UID`),
    PRIMARY KEY (`IID`, `UID`)
 );
  
  CREATE TABLE IF NOT EXISTS Sub (
    `NUMBER` INT NOT NULL,
    `ORDERNUM` INT NOT NULL,
    `NUM` INT NOT NULL,
    FOREIGN KEY (`NUMBER`) REFERENCES `Fullfilment`(`NUMBER`),
    FOREIGN KEY (`ORDERNUM`) REFERENCES `Ord`(`ORDERNUM`),
    FOREIGN KEY (`NUM`) REFERENCES `Checkout`(`NUM`),
    PRIMARY KEY (`NUM`, `ORDERNUM`)
 );
 
 CREATE TABLE IF NOT EXISTS See (
   `IID` CHAR(4) NOT NULL,
   `UID` INT NOT NULL,
   `ORDERNUM` INT NOT NULL,
   FOREIGN KEY (`IID`) REFERENCES `Items`(`IID`),
   FOREIGN KEY (`UID`) REFERENCES `User`(`UID`),
   FOREIGN KEY (`ORDERNUM`) REFERENCES `Ord`(`ORDERNUM`),
   PRIMARY KEY (`IID`, `UID`)
);
 
 CREATE TABLE IF NOT EXISTS View (
   `ID1` CHAR(4) NOT NULL,
   `ID2` CHAR(4) NOT NULL,
   `NUMBER` INT NOT NULL,
   FOREIGN KEY (`NUMBER`) REFERENCES `Fullfilment`(`NUMBER`),
   FOREIGN KEY (`ID2`) REFERENCES `Items`(`IID`),
   FOREIGN KEY (`ID1`) REFERENCES `Worker`(`WID`),
   PRIMARY KEY (`ID2`,`NUMBER`)
 );
 
 INSERT INTO Items (`IID`,`_NAME`,`COST`) VALUES
   ('P001','Apple Sauce',0.99),
   ('P002','Ribeye Steak',55.68),
   ('P003','Cereal',9.99),
   ('P004','Milk',1.89),
   ('P005','Eggs',2.35),
   ('P006','Jelly',3.98),
   ('P007','Bread',2.75),
   ('P008','Pretzels',8.76),
   ('P009','Peanut Butter',4.19),
   ('P010','Chicken',3.99),
   ('P011','Olive Oil',9.99),
   ('P012','Salt',0.59),
   ('P013','Hot Sauce',12.41),
   ('P014','Rice',25.99),
   ('P015','Potato Chips',8.75),
   ('P016','Pepsi',4.98),
   ('P017','Butter',1.15),
   ('P018','Cheese',6.59),
   ('P019','Honey',12.97),
   ('P020','Sugar',2.39),
   ('P021','Salmon',31.94);
 
 INSERT INTO User (`_NAME`,`CC`,`ADDRESS`) VALUES
   ('John Smith','4382688703331714','815 Cherry st'),
   ('Marcus Adebayo','0824272199710931','643 Washington dr'),
   ('Gabby Garcia','5771034244547482','99k876 Huskie dr'),
   ('Parker Johnson','3136744323772640','1108 Wood blvd'),
   ('Jenny Chen','2416030230312982','268w21 Neal ct'),
   ('Harper Kowalska ','3136744323772640','1108 Wood blvd');
 
 INSERT INTO Worker (`WID`,`_NAME`) VALUES
   ('1000', 'David Pawski'),
   ('1001', 'Juana Monte');
 
 INSERT INTO Instock (`IID`,`QTY`,`_NAME`,`COST`,`ITEMTYPE`) VALUES
   ('P001',100,'Apple Sauce',0.99,'IN STOCK'),
   ('P003',5,'Cereal',9.99,'IN STOCK'),
   ('P005',30,'Eggs',2.35,'IN STOCK'),
   ('P007',30,'Bread',2.75,'IN STOCK'),
   ('P009',10,'Peanut Butter',4.19,'IN STOCK'),
   ('P011',5,'Olive Oil',9.99,'IN STOCK'),
   ('P013',40,'Hot Sauce',12.41,'IN STOCK'),
   ('P015',5,'Potato Chips',8.75,'IN STOCK'),
   ('P017',5,'Butter',1.15,'IN STOCK'),
   ('P019',30,'Honey',12.97,'IN STOCK'),
   ('P021',12,'Salmon',31.94,'IN STOCK');
 
 INSERT INTO Outstock (`IID`,`QTY`,`_NAME`,`COST`,`LOCATION`,`ITEMTYPE`) VALUES
   ('P002',70,'Ribeye Steak',55.68,'Chicago','OUT OF STOCK'),
   ('P004',35,'Milk',1.89,'Dekalb','OUT OF STOCK'),
   ('P006',15,'Jelly',3.98,'Oswego','OUT OF STOCK'),
   ('P008',10,'Pretzels',8.76,'Dekalb','OUT OF STOCK'),
   ('P010',50,'Chicken',3.99,'Saint Charles','OUT OF STOCK'),
   ('P012',100,'Salt',.59,'Dekalb','OUT OF STOCK'),
   ('P014',16,'Rice',25.99,'Oswego','OUT OF STOCK'),
   ('P016',200,'Pepsi',4.98,'Batavia','OUT OF STOCK'),
   ('P018',60,'Cheese',6.59,'Chicago','OUT OF STOCK'),
   ('P020',10,'Sugar',2.39,'Chicago','OUT OF STOCK');
