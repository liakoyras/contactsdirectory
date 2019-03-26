# contactsdirectory
This repository contains a website I created for a school project.
The goal was to build a website where the user is able to create an account and save contacts.

## Disclaimer:
Although you can use the code, keep in mind that this is by no means a professional work that can be considered safe.
While I have indeed taken some steps to ensure the security of the website, it can still contain code that it is not considered good practice.
I do not have any responsibility for the use of this code. 

## Language
It is written in pure HTML/CSS/JavaScript for front-end and PHP/SQL for back-end.
I did not use Bootstrap, jQuery or any other framework.

## Setup
The files are ready to be uploaded on a server.
The database (I have used MySQL) and its tables can be created with the following SQL code:
```
CREATE DATABASE IF NOT EXISTS contactdirectory DEFAULT CHARACTER SET utf8;

CREATE TABLE contactdirectory.users (
 `userID` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(30) NOT NULL,
 `password` varchar(255) NOT NULL,
 `email` varchar(50) NOT NULL,
 `firstname` varchar(30) CHARACTER SET utf8 NOT NULL,
 `lastname` varchar(30) CHARACTER SET utf8 NOT NULL,
 PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE contactdirectory.catalogue (
 `ID` int(11) NOT NULL AUTO_INCREMENT,
 `FIRSTNAME` varchar(30) CHARACTER SET utf8 NOT NULL,
 `LASTNAME` varchar(30) CHARACTER SET utf8 NOT NULL,
 `PHONE` varchar(20) CHARACTER SET utf8 NOT NULL,
 `ADDRESS` varchar(40) CHARACTER SET utf8 NOT NULL,
 `EMAIL` varchar(30) CHARACTER SET utf8 NOT NULL,
 `USERID` int(11) NOT NULL,
 PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```
