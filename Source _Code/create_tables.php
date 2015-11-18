<?php

//Include files needed
include 'connect_db.inc.php';

//Create table patient
$sql1 = 
"CREATE TABLE IF NOT EXISTS patient(
patientId int(8) NOT NULL,
lname varchar(60) NOT NULL,
fname varchar(60) NOT NULL,
date_of_birth date NOT NULL default '0000-00-00',
gender enum('M','F') NOT NULL default 'M',
enrolment_date date NOT NULL default '0000-00-00',
phone varchar(20) NOT NULL default '0',
PRIMARY KEY(patientId)
)";

//Create table patient_appointment
$sql2 = 
"CREATE TABLE IF NOT EXISTS patient_appointment(
id int(11) NOT NULL auto_increment,
patientId int(8) NOT NULL,
visit_date date NOT NULL default '0000-00-00',
visit_time time NOT NULL,
purpose enum('laboratory','pharmacy','treatment','counseling') NOT NULL default 'pharmacy',
PRIMARY KEY (id)
)";

//Create table user
$sql3 =
"CREATE TABLE IF NOT EXISTS user(
id int(11) NOT NULL auto_increment,
username varchar(50) NOT NULL default ' ',
password varchar(20) NOT NULL default ' ',
lname varchar(60) NOT NULL default ' ',
fname varchar(60) NOT NULL default ' ',
email varchar(80) NOT NULL default ' ',
contact_phone int(20) NOT NULL default '0',
PRIMARY KEY (id)
)";

//Create table ozekimessagein
$sql4=
"CREATE TABLE IF NOT EXISTS ozekimessagein(
id int(11) NOT NULL auto_increment,
sender varchar(30) default NULL,
receiver varchar(30) default NULL,
msg text default NULL,
senttime varchar(100) default NULL,
receivedtime varchar(100) default NULL,
operator varchar(100) default NULL,
msgtype varchar(160) default NULL,
reference varchar(100) default NULL,
PRIMARY KEY (id)
)charset=utf8";

//Add an index on id in ozekimessagein
$sql5 =
"ALTER TABLE ozekimessagein ADD INDEX (id)";

//Create table ozekimessageout
$sql6 =
"CREATE TABLE IF NOT EXISTS ozekimessageout(
id int(11) NOT NULL auto_increment,
sender varchar(30) default NULL,
receiver varchar(30) default NULL,
msg text default NULL,
senttime varchar(100) default NULL,
receivedtime varchar(100) default NULL,
reference varchar(100) default NULL,
status varchar(20) default NULL,
msgtype varchar(160) default NULL,
operator varchar(100) default NULL,
errormsg varchar(250) default NULL,
PRIMARY KEY (id)
)charset=utf8";

//Add an index on id in ozekimessageout
$sql7 =
"ALTER TABLE ozekimessageout ADD INDEX (id)";

mysql_query($sql1) or die(mysql_error());
mysql_query($sql2) or die(mysql_error());
mysql_query($sql3) or die(mysql_error());
mysql_query($sql4) or die(mysql_error());
mysql_query($sql5) or die(mysql_error());
mysql_query($sql6) or die(mysql_error());
mysql_query($sql7) or die(mysql_error());

echo "Done.";

?>
