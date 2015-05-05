DROP TABLE users CASCADE CONSTRAINTS;
CREATE TABLE users
(userID	varchar(15) NOT NULL,
 fName	varchar(15),
 lName varchar(15),
 pword varchar(15) NOT NULL,
 PRIMARY KEY (userID));

INSERT INTO users VALUES('testID', 'John', 'Doe', 'testPass');

DROP TABLE bibliographies CASCADE CONSTRAINTS;
CREATE TABLE bibliographies
(bID 	INT NOT NULL,
 owner	varchar(15) NOT NULL,
 name 	varchar(15),
 PRIMARY KEY (bID),
 FOREIGN KEY (owner) REFERENCES users(userID));

DROP TABLE citations CASCADE CONSTRAINTS;
CREATE TABLE citations
(cID	INT NOT NULL,
 bID	INT NOT NULL,
 authorFirst	varchar(15),
 authorLast	varchar(15),
 title	varchar(30),
 medium 	varchar(15),
 PRIMARY KEY (cID),
 FOREIGN KEY (bID) REFERENCES bibliographies(bID));

DROP TABLE books CASCADE CONSTRAINTS;
CREATE TABLE books
(cID	INT NOT NULL,
 city	varchar(20),
 publisher	varchar(20),
 yearPublished	INT,
 PRIMARY KEY (cID),
 FOREIGN KEY (cID) REFERENCES citations(cID));

DROP TABLE periodicals CASCADE CONSTRAINTS;
CREATE TABLE periodicals
(cID	INT NOT NULL,
 name 	varchar(20),
 pubDate	DATE,
 pageNum 	INT,
 PRIMARY KEY (cID),
 FOREIGN KEY (cID) REFERENCES citations(cID));

DROP TABLE website CASCADE CONSTRAINTS;
CREATE TABLE website
(cID 	INT NOT NULL,
 name 	varchar(20),
 pubDate	DATE,
 PRIMARY KEY (cID),
 FOREIGN KEY (cID) REFERENCES citations(cID));
