/*Drops database if it already exists, then creates it again and uses it*/
/*This is done to prevent potential clashes with older  versions*/

/*Used for xaamp*/
-- DROP DATABASE IF EXISTS Electronic_Stock;
-- CREATE DATABASE IF NOT EXISTS Electronic_Stock;
-- USE Electronic_Stock;

/*Used for live server -- Must change config.php if swapping -- */
DROP DATABASE IF EXISTS garb1_18_electronic_stock;
CREATE DATABASE IF NOT EXISTS garb1_18_electronic_stock;
USE garb1_18_electronic_stock;

CREATE TABLE IF NOT EXISTS User_Table(
  UserID INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  CONSTRAINT UserID_PK PRIMARY KEY (UserID)
);

CREATE TABLE IF NOT EXISTS Manufactorer_Table(
  ManufactorID CHAR(5) NOT NULL,
  Manufactorer VARCHAR(7) NOT NULL CHECK(Manufactorer IN ("Apple","Samsung","OnePlus")),
  CONSTRAINT ManufactorID_PK PRIMARY KEY (ManufactorID)
);

CREATE TABLE IF NOT EXISTS Model_Table(
  Model_NumberID CHAR(6) NOT NULL,
  ManufactorID CHAR(5) NOT NULL,
  Model_Number VARCHAR(8) NOT NULL CHECK(Model_Number IN ("A1357","A1538","A1586","A1688","SM-G930F","SM-G955F","A1723","SM-G950F","A6000")),
  Model_Name VARCHAR(15) NOT NULL CHECK(Model_Name IN ("iPhone 5S","iPad Mini-4","iPhone 6","iPhone 6S","iPhone SE","Galaxy S8 Plus","Galaxy S8","Galaxy S7","6")),
  CONSTRAINT Model_NumberID_PK PRIMARY KEY (Model_NumberID),
  CONSTRAINT ManufactorID_FK FOREIGN KEY (ManufactorID) REFERENCES Manufactorer_Table(ManufactorID)
);

CREATE TABLE IF NOT EXISTS Network_Discount_Table(
  NetworkID CHAR(5) NOT NULL,
  Network VARCHAR(8) NOT NULL CHECK(Network IN ("EE","O2","Three","Vodafone","Unlocked","WiFi")),
  Network_Discount TINYINT(2) NOT NULL CHECK(Network_Discount >= 0),
  CONSTRAINT NetworkID_PK PRIMARY KEY (NetworkID)
);

CREATE TABLE IF NOT EXISTS Condition_Discount_Table(
  ConditionID CHAR(6) NOT NULL,
  Device_Condition CHAR(1) NOT NULL CHECK(Device_Condition IN ("A","B","C")),
  Condition_Discount TINYINT(2) NOT NULL CHECK(Condition_Discount >= 0),
  CONSTRAINT ConditionID_PK PRIMARY KEY (ConditionID)
);

CREATE TABLE IF NOT EXISTS Colour_Table(
  ColourID Char(6) NOT NULL,
  Colour VARCHAR(14) NOT NULL,
  CONSTRAINT ColourID_PK PRIMARY KEY (ColourID)
);

CREATE TABLE IF NOT EXISTS Storage_Table(
  StorageID Char(6) NOT NULL,
  Storage VARCHAR(5) NOT NULL,
  CONSTRAINT StorageID_PK PRIMARY KEY (StorageID)
);

CREATE TABLE IF NOT EXISTS Factory_Details_Table(
  Factory_DetailsID INT(255) NOT NULL AUTO_INCREMENT,
  Model_NumberID CHAR(6) NOT NULL,
  ColourID Char(6) NOT NULL,
  StorageID CHAR(6) NOT NULL,
  Starting_Price DECIMAL(6,2) NOT NULL CHECK (Starting_Price > 0),
  CONSTRAINT Factory_DetailsID_PK PRIMARY KEY (Factory_DetailsID),
  CONSTRAINT Model_NumberID_FK FOREIGN KEY (Model_NumberID) REFERENCES Model_Table(Model_NumberID) ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT ColourID_FK FOREIGN KEY (ColourID) REFERENCES Colour_Table(ColourID) ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT StorageID_FK FOREIGN KEY (StorageID) REFERENCES Storage_Table(StorageID) ON UPDATE CASCADE ON DELETE RESTRICT
);

ALTER TABLE Factory_Details_Table AUTO_INCREMENT=1000;

CREATE TABLE IF NOT EXISTS Secondary_Details_Table(
  Secondary_DetailsID CHAR(6) NOT NULL,
  NetworkID CHAR(5) NOT NULL,
  ConditionID CHAR(6) NOT NULL,
  CONSTRAINT Secondary_DetailsID_PK PRIMARY KEY (Secondary_DetailsID),
  CONSTRAINT NetworkID_FK FOREIGN KEY (NetworkID) REFERENCES Network_Discount_Table(NetworkID) ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT ConditionID_FK FOREIGN KEY (ConditionID) REFERENCES Condition_Discount_Table(ConditionID)ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE IF NOT EXISTS Phones_Table(
  PhoneID INT(255) NOT NULL AUTO_INCREMENT,
  Factory_DetailsID INT(255) NOT NULL,
  Secondary_DetailsID CHAR(6) NOT NULL,
  Selling_Price DECIMAL(6,2) NOT NULL CHECK (Selling_Price >= 0),
  Buying_Price DECIMAL (6,2) NOT NULL,
  Stock SMALLINT(4) NOT NULL CHECK(Stock >= 0),
  CONSTRAINT PhoneID_PK PRIMARY KEY (PhoneID),
  CONSTRAINT Phone_Factory_DetailsID_FK FOREIGN KEY (Factory_DetailsID) REFERENCES Factory_Details_Table(Factory_DetailsID) ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT Phone_Secondary_DetailsID_FK FOREIGN KEY (Secondary_DetailsID) REFERENCES Secondary_Details_Table(Secondary_DetailsID)ON UPDATE CASCADE ON DELETE RESTRICT
);

/*PhoneID starting code*/
ALTER TABLE Phones_Table AUTO_INCREMENT=2000;

CREATE TABLE IF NOT EXISTS Tablet_Table(
  TabletID INT(255) NOT NULL AUTO_INCREMENT,
  Factory_DetailsID INT(255) NOT NULL,
  Secondary_DetailsID CHAR(6) NOT NULL,
  Selling_Price DECIMAL(6,2) NOT NULL CHECK(Selling_Price >= 0),
  Buying_Price DECIMAL (6,2) NOT NULL,
  Stock SMALLINT(4) NOT NULL CHECK(Stock >= 0),
  CONSTRAINT TabletID_PK PRIMARY KEY (TabletID),
  CONSTRAINT Tablet_Factory_DetailsID_FK FOREIGN KEY (Factory_DetailsID) REFERENCES Factory_Details_Table(Factory_DetailsID) ON UPDATE CASCADE ON DELETE RESTRICT,
  CONSTRAINT Tablet_Secondary_DetailsID_FK FOREIGN KEY (Secondary_DetailsID) REFERENCES Secondary_Details_Table(Secondary_DetailsID)ON UPDATE CASCADE ON DELETE RESTRICT
);

/*TabletID starting code*/
ALTER TABLE Tablet_Table AUTO_INCREMENT=3000;

/*Insertion of dummy data*/

INSERT INTO User_Table(username, password) VALUES ('garb1_18', 'SQRITENA');

INSERT INTO Manufactorer_Table VALUES('M1001', 'Apple');
INSERT INTO Manufactorer_Table VALUES('M1002', 'Samsung');
INSERT INTO Manufactorer_Table VALUES('M1003', 'OnePlus');

INSERT INTO Model_Table VALUES('MN1001','M1001','A1357','iPhone 5S');
INSERT INTO Model_Table VALUES('MN1002','M1001','A1586','iPhone 6');
INSERT INTO Model_Table VALUES('MN1003','M1001','A1688','iPhone 6S');
INSERT INTO Model_Table VALUES('MN1004','M1001','A1723','iPhone SE');
INSERT INTO Model_Table VALUES('MN1005','M1001','A1538','iPad Mini-4');
INSERT INTO Model_Table VALUES('MN1006','M1002','SM-G930F','Galaxy S7');
INSERT INTO Model_Table VALUES('MN1007','M1002','SM-G950F','Galaxy S8');
INSERT INTO Model_Table VALUES('MN1008','M1002','SM-G955F','Galaxy S8 Plus');
INSERT INTO Model_Table VALUES('MN1009','M1003','A6000','6');

INSERT INTO Network_Discount_Table VALUES('N1001','EE','5');
INSERT INTO Network_Discount_Table VALUES('N1002','O2','10');
INSERT INTO Network_Discount_Table VALUES('N1003','Three','5');
INSERT INTO Network_Discount_Table VALUES('N1004','Vodafone','10');
INSERT INTO Network_Discount_Table VALUES('N1005','Unlocked','0');
INSERT INTO Network_Discount_Table VALUES('N1006','WiFi','0');

INSERT INTO Condition_Discount_Table VALUES('CN1001','A','0');
INSERT INTO Condition_Discount_Table VALUES('CN1002','B','10');
INSERT INTO Condition_Discount_Table VALUES('CN1003','C','20');

INSERT INTO Colour_Table VALUES('C1001','Space Grey');
INSERT INTO Colour_Table VALUES('C1002','Silver');
INSERT INTO Colour_Table VALUES('C1003','Gold');
INSERT INTO Colour_Table VALUES('C1004','Rose Gold');
INSERT INTO Colour_Table VALUES('C1005','Black Onyx');
INSERT INTO Colour_Table VALUES('C1006','Gold Platinum');
INSERT INTO Colour_Table VALUES('C1007','White Pearl');
INSERT INTO Colour_Table VALUES('C1008','Midnight Black');
INSERT INTO Colour_Table VALUES('C1009','Mirror Black');
INSERT INTO Colour_Table VALUES('C1010','Silk White');

INSERT INTO Storage_Table VALUES('ST1001','8GB');
INSERT INTO Storage_Table VALUES('ST1002','16GB');
INSERT INTO Storage_Table VALUES('ST1003','32GB');
INSERT INTO Storage_Table VALUES('ST1004', '64GB');
INSERT INTO Storage_Table VALUES('ST1005','128GB');
INSERT INTO Storage_Table VALUES('ST1006','256GB');
INSERT INTO Storage_Table VALUES('ST1007','512GB');

INSERT INTO Factory_Details_Table(Model_NumberID,ColourID,StorageID,Starting_Price) VALUES('MN1001','C1001','ST1001','100');
INSERT INTO Factory_Details_Table(Model_NumberID,ColourID,StorageID,Starting_Price) VALUES('MN1001','C1003','ST1002','125');
INSERT INTO Factory_Details_Table(Model_NumberID,ColourID,StorageID,Starting_Price) VALUES('MN1003','C1004','ST1005','150');
INSERT INTO Factory_Details_Table(Model_NumberID,ColourID,StorageID,Starting_Price) VALUES('MN1005','C1002','ST1004','300');

/*All possible network and condition combinations*/
INSERT INTO Secondary_Details_Table VALUES ('S1001','N1001','CN1001');
INSERT INTO Secondary_Details_Table VALUES ('S1002','N1001','CN1002');
INSERT INTO Secondary_Details_Table VALUES ('S1003','N1001','CN1003');
INSERT INTO Secondary_Details_Table VALUES ('S1004','N1002','CN1001');
INSERT INTO Secondary_Details_Table VALUES ('S1005','N1002','CN1002');
INSERT INTO Secondary_Details_Table VALUES ('S1006','N1002','CN1003');
INSERT INTO Secondary_Details_Table VALUES ('S1007','N1003','CN1001');
INSERT INTO Secondary_Details_Table VALUES ('S1008','N1003','CN1002');
INSERT INTO Secondary_Details_Table VALUES ('S1009','N1003','CN1003');
INSERT INTO Secondary_Details_Table VALUES ('S1010','N1004','CN1001');
INSERT INTO Secondary_Details_Table VALUES ('S1011','N1004','CN1002');
INSERT INTO Secondary_Details_Table VALUES ('S1012','N1004','CN1003');
INSERT INTO Secondary_Details_Table VALUES ('S1013','N1005','CN1001');
INSERT INTO Secondary_Details_Table VALUES ('S1014','N1005','CN1002');
INSERT INTO Secondary_Details_Table VALUES ('S1015','N1005','CN1003');
INSERT INTO Secondary_Details_Table VALUES ('S1016','N1006','CN1001');
INSERT INTO Secondary_Details_Table VALUES ('S1017','N1006','CN1002');
INSERT INTO Secondary_Details_Table VALUES ('S1018','N1006','CN1003');


INSERT INTO Phones_Table(Factory_DetailsID, Secondary_DetailsID, Selling_Price, Buying_Price, stock) VALUES ('1000','S1001', '200.00', '120.00', '1');
INSERT INTO Phones_Table(Factory_DetailsID, Secondary_DetailsID, Selling_Price, Buying_Price, stock) VALUES ('1001','S1009', '235.00', '141.00','22');
INSERT INTO Phones_Table(Factory_DetailsID, Secondary_DetailsID, Selling_Price, Buying_Price, stock) VALUES ('1002','S1015', '100.00', '60.00','8');

INSERT INTO Tablet_Table(Factory_DetailsID, Secondary_DetailsID, Selling_Price,Buying_Price,stock) VALUES ('1003','S1016','350.00','210.00','12');

/*End of dummy data insertion*/

/*Drops procedures if already exists to prevent conflict*/
DROP PROCEDURE IF EXISTS show_all_phones;
DROP PROCEDURE IF EXISTS show_all_tablets;
DROP PROCEDURE IF EXISTS show_all_models;
DROP PROCEDURE IF EXISTS check_product_details;

/*Drops triggers if already exists to prevent conflict*/
DROP TRIGGER IF EXISTS phone_details_before_insert;
DROP TRIGGER IF EXISTS phone_details_before_update;
DROP TRIGGER IF EXISTS tablet_details_before_insert;
DROP TRIGGER IF EXISTS tablet_details_before_update;

/*Stored procedure creation*/
DELIMITER $

/*Lists all phones currently in the database*/
CREATE PROCEDURE IF NOT EXISTS show_all_phones()
BEGIN
  SELECT p.PhoneID, p.Buying_Price, p.Selling_Price, c.Colour, st.Storage, p.Stock, nd.Network, cd.Device_Condition, m.Model_Number, m.Model_Name, mt.Manufactorer
  FROM Phones_Table AS p
  INNER JOIN Factory_Details_Table AS fd USING (Factory_DetailsID)
  INNER JOIN Secondary_Details_Table AS sd USING (Secondary_DetailsID)
  INNER JOIN Colour_Table AS c USING (ColourID)
  INNER JOIN Storage_Table AS st USING (StorageID)
  INNER JOIN Network_Discount_Table AS nd USING (NetworkID)
  INNER JOIN Condition_Discount_Table AS cd USING (ConditionID)
  INNER JOIN Model_Table AS m USING (Model_NumberID)
  INNER JOIN Manufactorer_Table AS mt USING (ManufactorID);
END $

/*Lists all tablets currently in the database*/
CREATE PROCEDURE IF NOT EXISTS show_all_tablets()
BEGIN
  SELECT t.TabletID, t.Buying_Price, t.Selling_Price, c.Colour, st.Storage, t.Stock, nd.Network, cd.Device_Condition, m.Model_Number, m.Model_Name, mt.Manufactorer
  FROM Tablet_Table AS t
  INNER JOIN Factory_Details_Table AS fd USING (Factory_DetailsID)
  INNER JOIN Secondary_Details_Table AS sd USING (Secondary_DetailsID)
  INNER JOIN Colour_Table AS c USING (ColourID)
  INNER JOIN Storage_Table AS st USING (StorageID)
  INNER JOIN Network_Discount_Table AS nd USING (NetworkID)
  INNER JOIN Condition_Discount_Table AS cd USING (ConditionID)
  INNER JOIN Model_Table AS m USING (Model_NumberID)
  INNER JOIN Manufactorer_Table AS mt USING (ManufactorID);
END $

CREATE PROCEDURE IF NOT EXISTS show_all_models()
BEGIN
  SELECT m.Model_NumberID, mn.Manufactorer, m.Model_Number, m.Model_Name
  FROM Model_Table AS m
  INNER JOIN Manufactorer_Table AS mn USING (ManufactorID);
  END $

/*Checks to ensure that the sale price of a product is higher than zero*/
/*and that the product is sold for more than it is bought for*/
/*and that the stock level does not go below 0*/

CREATE PROCEDURE IF NOT EXISTS check_product_details(IN Selling_Price DECIMAL(6,2), IN Buying_Price DECIMAL(6,2), IN Stock SMALLINT(4))
BEGIN
  IF Selling_Price <= 0 THEN
	SIGNAL SQLSTATE '32000'
	  SET MESSAGE_TEXT = 'Constraint on selling price failed, must be above 0';
  END IF;

  IF Buying_Price <= 0 THEN
  SIGNAL SQLSTATE '32001'
    SET MESSAGE_TEXT = 'Constraint on buying price failed, must be above 0';
  END IF;

  IF Buying_Price > Selling_Price THEN
	SIGNAL SQLSTATE '32002'
	  SET MESSAGE_TEXT = ' Constraint on buying price failed, selling price must exceed buying price';
	END IF;

  IF Stock < 0 THEN
  SIGNAL SQLSTATE '32003'
    SET MESSAGE_TEXT = ' Constraint on stock level failed, cannot have a stock level below 0';
  END IF;
END $

DELIMITER ;

DELIMITER $

CREATE TRIGGER IF NOT EXISTS phone_details_before_insert BEFORE INSERT ON Phones_Table
FOR EACH ROW
BEGIN
  CALL check_product_details(new.Selling_Price, new.Buying_Price, new.stock);
END $

DELIMITER ;

DELIMITER $

CREATE TRIGGER IF NOT EXISTS phone_details_before_update BEFORE UPDATE on Phones_Table
FOR EACH ROW
BEGIN
  CALL check_product_details(new.Selling_Price, new.Buying_Price, new.stock);
END$

DELIMITER ;

DELIMITER $

CREATE TRIGGER IF NOT EXISTS tablet_details_before_insert BEFORE INSERT ON Tablet_Table
FOR EACH ROW
BEGIN
  CALL check_product_details(new.Selling_Price, new.Buying_Price, new.stock);
END $

DELIMITER ;

DELIMITER $

CREATE TRIGGER IF NOT EXISTS tablet_details_before_update BEFORE UPDATE on Tablet_Table
FOR EACH ROW
BEGIN
  CALL check_product_details(new.Selling_Price, new.Buying_Price, new.stock);
END$

DELIMITER ;

DELIMITER $