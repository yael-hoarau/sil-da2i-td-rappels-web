<?php
global $DBHOST;
global $DBUSER;
global $DBPASSWORD;
global $DBNAME;
global $DBCHARSET;
$DBHOST = 'mysql-yael-hoarau.alwaysdata.net';
$DBUSER = '168633';
$DBPASSWORD = 'bd';
$DBNAME= 'yael-hoarau_videotheque';
$DBCHARSET= 'utf8';

global $DB;
$DB = new DB();
$DB->connect($DBHOST, $DBNAME, $DBCHARSET, $DBUSER, $DBPASSWORD);