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