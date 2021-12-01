CREATE TABLE IF NOT EXISTS User (
  `UID` CHAR(4) PRIMARY KEY,
  `NAME` VARCHAR(255) NOT NULL,
  `CC` INT(9) NOT NULL, --credit card info
  `ADDRESS` VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Worker (
  `WID` CHAR(4) PRIMARY KEY,
  `NAME` VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Order (
  `ORDERNUM` INT(5) NOT NULL, --ORDER NUMBER
  `TOTAL` DECIMAL(10,2) NOT NULL, --amount $$
  PRIMARY KEY (`ORDERNUM`)
);

CREATE TABLE IF NOT EXISTS Contains (
  `ORDERNUM` INT(5) NOT NULL,
  FOREIGN KEY (`ORDERNUM`) REFERENCES `ORDER`(`ORDERNUM`),
  PRIMARY KEY (`ORDERNUM`)
);

CREATE TABLE IF NOT EXISTS Items (
  `IID` CHAR(4) PRIMARY KEY,
  `QTY` INT NOT NULL,
  `NAME` VARCHAR(255) NOT NULL,
  `COST` DECIMAL(10,2) NOT NULL
  --`STOCK` BOOLEAN NOT NULL --CHAR(1) NOT NULL,
);

CREATE TABLE IF NOT EXISTS Instock (
  `IID` CHAR(4) NOT NULL,
  --`TOTAL` INT NOT NULL, removed info present in Item table as qty
  --`PRICE` DECIMAL(10,2) NOT NULL, removed info present in items table as cost
  `ITEMTYPE` VARCHAR(255) NOT NULL,
  FOREIGN KEY (`IID`) REFERENCES `Items`(`IID`),
  PRIMARY KEY (`IID`)
);

CREATE TABLE IF NOT EXISTS Outstock (
  `IID` CHAR(4) NOT NULL,
  `LOCATION` VARCHAR(255) NOT NULL,
  `ITEMTYPE` VARCHAR(255) NOT NULL,
  FOREIGN KEY (`IID`) REFERENCES `Items`(`IID`),
  PRIMARY KEY (`IID`)
);

CREATE TABLE IF NOT EXISTS Fullfilment (
  `Number` INT PRIMARY KEY,
  `Status` CHAR(1) NOT NULL,
  `QTY` INT NOT NULL
);

CREATE TABLE IF NOT EXISTS Checkout (
  `SUM` INT NOT NULL,
  `IID` CHAR(4) NOT NULL,
  `QTY` INT NOT NULL,
  `NUM` INT NOT NULL,
  FOREIGN KEY (`IID`) REFERENCES `Items`(`IID`),
  PRIMARY KEY (`SUM`)
);

CREATE TABLE IF NOT EXISTS Cart (
  `ORDERNUM` INT(5) NOT NULL,
  `TOTAL` DECIMAL(10,2) NOT NULL,
  `COUNT` INT NOT NULL,
  FOREIGN KEY (`ORDERNUM`) REFERENCES `Order`(`ORDERNUM`),
  PRIMARY KEY (`ORDERNUM`, `TOTAL`)
);

CREATE TABLE IF NOT EXISTS Purchase (
  `IID` CHAR(4) NOT NULL,
  `UID` CHAR(4) NOT NULL,
  FOREIGN KEY (`IID`) REFERENCES `Items`(`IID`),
  FOREIGN KEY (`UID`) REFERENCES `User`(`UID`),
  PRIMARY KEY (`IID`, `UID`)
);

CREATE TABLE IF NOT EXISTS Submit (
  `NUMBER` INT NOT NULL,
  `ORDERNUM` INT(5) NOT NULL,
  `NUM` INT NOT NULL,
  FOREIGN KEY (`NUMBER`) REFERENCES `Fullfilment`(`NUMBER`),
  FOREIGN KEY (`ORDERNUM`) REFERENCES `Order`(`ORDERNUM`),
  FOREIGN KEY (`NUM`) REFERENCES `Checkout`(`NUM`),
  PRIMARY KEY (`NUMBER`, `ORDERNUM`)
);

CREATE TABLE IF NOT EXISTS See (
  `IID` CHAR(4) NOT NULL,
  `UID` CHAR(4) NOT NULL,
  `ORDERNUM` INT(5) NOT NULL,
  FOREIGN KEY (`IID`) REFERENCES `Items`(`IID`),
  FOREIGN KEY (`UID`) REFERENCES `User`(`UID`),
  FOREIGN KEY (`ORDERNUM`) REFERENCES `Order`(`ORDERNUM`),
  PRIMARY KEY (`IID`, `UID`)
);

INSERT INTO Items (`IID`,`QTY`,`NAME`,`COST`) VALUES
  ('P001','1000','Apple Sauce','0.99'),
  ('P002','70','Ribeye Steak','55.68'),
  ('P003','0','Cereal','9.99'),
  ('P004','35','Milk','1.89'),
  ('P005','40','Eggs','2.35'),
  ('P006','15','Jelly','3.98'),
  ('P007','65','Bread','2.75'),
  ('P008','0','Pretzels','8.76'),
  ('P009','23','Peanut Butter','4.19'),
  ('P010','50','Chicken','3.99'),
  ('P011','0','Olive Oil','9.99'),
  ('P012','100','Salt','0.59'),
  ('P013','82','Hot Sauce','12.41'),
  ('P014','16','Rice','25.99'),
  ('P015','0','Potato Chips','8.75'),
  ('P016','200','Pepsi','4.98'),
  ('P017','0','Butter','1.15'),
  ('P018','60','Cheese','6.59'),
  ('P019','80','Honey','12.97'),
  ('P020','0','Sugar','2.39'),
  ('P021','25','Salmon','31.94');

INSERT INTO User (`UID`,`NAME`,`CC`,`ADDRESS`) VALUES
  ('C0001','John Smith','4382688703331714','815 Cherry st'),
  ('C0002','Marcus Adebayo','0824272199710931','643 Washington dr'),
  ('C0003','Gabby Garcia','5771034244547482','99k876 Huskie dr'),
  ('C0004','Parker Johnson','3136744323772640','1108 Wood blvd'),
  ('C0005','Jenny Chen','2416030230312982','268w21 Neal ct'),
  ('C0006','Harper Kowalska ','3136744323772640','1108 Wood blvd');

INSERT INTO Order (`ORDERNUM`,`TOTAL`) VALUES
  ('00001', '9.45'),
  ('00002', '12.39'),
  ('00003', '501.12'),
  ('00004', '62.88'),
  ('00005', '26.28'),
  ('00006', '33.52'),
  ('00007', '51.88');


/*
INSERT INTO Order (`IID`,`UID`,`TOTAL`,`COUNT`) VALUES
  ('P004','C0002','9.45','5'),
  ('P012','C0001','12.39','21'),
  ('P002','C0004','501.12','9'),
  ('P021','C0003','62.88','2'),
  ('P008','C0003','26.28','3'),
  ('P009','C0005','33.52','8'),
  ('P019','C0006','51.88','4'),
  ('P014','C0001','155.94','6');
  */

INSERT INTO Worker (`WID`,`NAME`) VALUES
  ('1000', 'David Pawski'),
  ('1001', 'Juana Monte');

INSERT INTO Instock (`IID`, `ITEMTYPE`) VALUES
  (`P001`, `Dry Good`),
  (`P002`, `Meat`),
  (`P004`, `Cold Good`),
  (`P005`, `Cold Good`),
  (`P006`, `Dry Good`),
  (`P007`, `Dry Good`),
  (`P009`, `Dry Good`),
  (`P010`, `Meat`),
  (`P012`, `Spice`),
  (`P013`, `Spice`),
  (`P014`, `Dry Good`),
  (`P016`, `Dry Good`),
  (`P018`, `Cold Good`),
  (`P019`, `Spice`),
  (`P021`, `Meat`);

INSERT INTO Outstock (`IID`,`LOCATION`, `ITEMTYPE`) VALUES
  (`P003`, `General Mills`, `Dry Good`),
  (`P008`, `Costco`, `Dry Good`),
  (`P011`, `Italy`, `Spice`),
  (`P015`, `Dekalb`, `Dry Good`),
  (`P017`, `Dairy Farm`, `Cold Good`),
  (`P020`, `Dekalb`, `Spice`);
