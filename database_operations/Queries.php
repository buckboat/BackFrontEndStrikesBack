<?php
require_once dirname(__FILE__) ."/Constants.php";

define('DropDatabase',

    "DROP DATABASE IF EXISTS " . DB_NAME . ";");


define('CreateDatabase',

    "CREATE DATABASE IF NOT EXISTS " . DB_NAME . ";");


define('CreateTable_Badge',

    "CREATE TABLE IF NOT EXISTS Badge (
    BadgeID INT(11) AUTO_INCREMENT PRIMARY KEY,
    BadgeName VARCHAR(50),
    BadgeDesc VARCHAR(200),
    BadgeCriteria VARCHAR(100),
    BadgeIcon LONGBLOB,
    BadgeCreated DATETIME,
    BadgeApproved boolean
    );");


define('CreateTable_User',
    
    "CREATE TABLE IF NOT EXISTS User (
    UserID INT(11) AUTO_INCREMENT PRIMARY KEY,
    UserType INT(11),
    Username VARCHAR(50),
    Password VARCHAR(50),
    LastLogin DATETIME
    );");

//I think this needs to be combined with Badge table, basically BadgeAprroved is the only requirement for the request part and user and comment can be added to Badge table
define('CreateTable_BadgeRequest',
    
    "CREATE TABLE IF NOT EXISTS BadgeRequest (
    RequestID INT(11) AUTO_INCREMENT PRIMARY KEY,
    UserID INT(11),
    BadgeID INT(11),
    BadgeName VARCHAR(50),
    BadgeDesc VARCHAR(200),
    BadgeCriteria VARCHAR(100),
    BadgeIcon LONGBLOB,
    Comment VARCHAR(50),
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (BadgeID) REFERENCES Badge(BadgeID)
    );");


define('CreateTable_UserDepartment',
    
    "CREATE TABLE IF NOT EXISTS UserDepartment (
    UserID INT(11),
    DepartmentID INT(11),
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (DepartmentID) REFERENCES Department(DepartmentID)
    );");


define('CreateTable_Department',
    
    "CREATE TABLE IF NOT EXISTS Department (
    DepartmentID INT(11) AUTO_INCREMENT PRIMARY KEY,
    DepartmentName VARCHAR(50)
    );");


define('CreateTable_UserBadge', 

    "CREATE TABLE IF NOT EXISTS UserBadge (
    UserID INT(11),
    BadgeID INT(11),
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (BadgeID) REFERENCES Badge(BadgeID)
    );");


define('CreateTable_EventBadge', 

    "CREATE TABLE IF NOT EXISTS EventBadge (
    EventBadgeID INT(11) AUTO_INCREMENT PRIMARY KEY,
    BadgeID INT(11),
    DepartmentID INT(11),
    EventName varchar(100),
    EventDescription varchar(250),
    QRSVG BLOB,
    DateCreated datetime,
    ActiveEvent boolean,
    FOREIGN KEY (BadgeID) REFERENCES Badge(BadgeID),
    FOREIGN KEY (DepartmentID) REFERENCES Department(DepartmentID)
    );");
    
define('DummyData_User', 

    "INSERT INTO User (UserType, Username, Password, LastLogin) VALUES
    (0, 'User 1', 'Password 1', NOW()),
    (1, 'User 2', 'Password 2', NOW()),
    (1, 'User 3', 'Password 3', NOW()),
    (1, 'User 4', 'Password 4', NOW()),
    (0, 'User 5', 'Password 5', NOW());");


define('DummyData_Badge', 
    
    "INSERT INTO Badge (BadgeName, BadgeDesc, BadgeCriteria, BadgeIcon, BadgeCreated, BadgeApproved) VALUES
    ('Badge 1', 'Description 1', 'Criteria 1', NULL, NOW(), TRUE),
    ('Badge 2', 'Description 2', 'Criteria 2', NULL, NOW(), TRUE),
    ('Badge 3', 'Description 3', 'Criteria 3', NULL, NOW(), TRUE),
    ('Badge 4', 'Description 4', 'Criteria 4', NULL, NOW(), TRUE),
    ('Badge 5', 'Description 5', 'Criteria 5', NULL, NOW(), TRUE),
    ('Badge 6', 'Description 6', 'Criteria 6', NULL, NOW(), TRUE),
    ('Badge 7', 'Description 7', 'Criteria 7', NULL, NOW(), TRUE),
    ('Badge 8', 'Description 8', 'Criteria 8', NULL, NOW(), TRUE),
    ('Badge 9', 'Description 9', 'Criteria 9', NULL, NOW(), TRUE),
    ('Badge 10', 'Description 10', 'Criteria 10', NULL, NOW(), FALSE);");


define('DummyData_Department', 
    
    "INSERT INTO Department (DepartmentName) VALUES 
    ('Computer Science');");


define('DummyData_UserBadge', 
    
    "INSERT INTO UserBadge (UserID, BadgeID) VALUES
    (1, 1),
    (2, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5);");


define('DummyData_UserDepartment', 
    
    "INSERT INTO UserDepartment (UserID, DepartmentID) VALUES 
    (1, 1),
    (2, 1),
    (3, 1),
    (4, 1),
    (5, 1);");


define('DummyData_BadgeRequest', 
    
    "INSERT INTO BadgeRequest (UserID, BadgeID, BadgeName, Comment) VALUES
    (2, 1,'Yeah', 'yes'),
    (3, 2,'Nope', 'no'),
    
    (3, 10,'Squirrels', 'New badge for Squirrel Pics')
    
    
    ;");
    

define('DummyData_EventBadge', 
    
    "INSERT INTO EventBadge (BadgeID, DepartmentID, EventName, EventDescription, QRSVG, DateCreated, ActiveEvent) VALUES
    (1, 1, 'Coding Competition', 'Solve all the problems', NULL, NOW(), TRUE),
    (2, 1, 'Squirrel Scavenger Hunt', 'Find all the squirrels', NULL, NOW(), TRUE);");
?>