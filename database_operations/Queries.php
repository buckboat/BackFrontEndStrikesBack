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
    BadgeSteps INT(11)
    );");


define('CreateTable_User',
    
    "CREATE TABLE IF NOT EXISTS User (
    UserID INT(11) AUTO_INCREMENT PRIMARY KEY,
    UserType INT(11),
    Username VARCHAR(50),
    Password VARCHAR(50),
    LastLogin DATETIME,
    ProfilePictureID INT(11)
    );");


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
    isVisible tinyint(1),
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
    BadgeStepsCompleted INT(11),
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

    "INSERT INTO User (UserType, Username, Password, LastLogin, ProfilePictureID) VALUES
    (0, 'User 1', 'Password 1', NOW(), 1),
    (1, 'User 2', 'Password 2', NOW(), 2),
    (1, 'User 3', 'Password 3', NOW(), 3),
    (1, 'User 4', 'Password 4', NOW(), 4),
    (0, 'User 5', 'Password 5', NOW(), 5);");


define('DummyData_Badge', 
    
    "INSERT INTO Badge (BadgeName, BadgeDesc, BadgeCriteria, BadgeIcon, BadgeCreated, BadgeApproved, BadgeSteps) VALUES
    ('Badge 1', 'Description 1', 'Criteria 1', NULL, NOW(), TRUE, 1),
    ('Badge 2', 'Description 2', 'Criteria 2', NULL, NOW(), TRUE 1),
    ('Badge 3', 'Description 3', 'Criteria 3', NULL, NOW(), TRUE 3),
    ('Badge 4', 'Description 4', 'Criteria 4', NULL, NOW(), TRUE 2),
    ('Badge 5', 'Description 5', 'Criteria 5', NULL, NOW(), TRUE 5),
    ('Badge 6', 'Description 6', 'Criteria 6', NULL, NOW(), TRUE 4),
    ('Badge 7', 'Description 7', 'Criteria 7', NULL, NOW(), TRUE 5),
    ('Badge 8', 'Description 8', 'Criteria 8', NULL, NOW(), TRUE 10),
    ('Badge 9', 'Description 9', 'Criteria 9', NULL, NOW(), TRUE 1),
    ('Badge 10', 'Description 10', 'Criteria 10', NULL, NOW(), FALSE 2);");


define('DummyData_Department', 
    
    "INSERT INTO Department (DepartmentName) VALUES 
    ('Computer Science');");


define('DummyData_UserBadge', 
    
    "INSERT INTO UserBadge (UserID, BadgeID, BadgeStepsCompleted) VALUES
    (1, 1, 1),
    (2, 1, 0),
    (2, 2, 1),
    (3, 3, 2),
    (4, 4, 1),
    (5, 5, 3);");


define('DummyData_UserDepartment', 
    
    "INSERT INTO UserDepartment (UserID, DepartmentID) VALUES 
    (1, 1),
    (2, 1),
    (3, 1),
    (4, 1),
    (5, 1);");


define('DummyData_BadgeRequest', 
    
    "INSERT INTO BadgeRequest (UserID, BadgeID, BadgeName, RequestApproved, Comment, isVisible) VALUES
    (2, 1,'Yeah', FALSE, 'yes', 1),
    (3, 2,'Nope', TRUE, 'no', 1),
    (3, 10,'Squirrels', FALSE, 'New badge for Squirrel Pics', 0);");
    

define('DummyData_EventBadge', 
    
    "INSERT INTO EventBadge (BadgeID, DepartmentID, EventName, EventDescription, QRSVG, DateCreated, ActiveEvent) VALUES
    (1, 1, 'Coding Competition', 'Solve all the problems', NULL, NOW(), TRUE),
    (2, 1, 'Squirrel Scavenger Hunt', 'Find all the squirrels', NULL, NOW(), TRUE);");
?>