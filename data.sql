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