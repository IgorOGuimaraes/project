<?php

// Define a 32-byte (64 character) hexadecimal encryption key (CHAR)
//DO NOT, I REPEAT, DO NOT REMOVE OR CHANGE THIS KEY! UNLESS IT'S A NEW INSTALLATION
define('ENCRYPTION_KEY', 'd0a7e7ff7b6a5acd55f4bac32612b87cd923e88838b63bf2765ff819dc8da282');

//Set Default execution time (INT)
ini_set('max_execution_time', 60);

//SYSTEM CHARSET
define('CHARSET', 'utf8');

//APPLICATION NAME, SAME AS THE PATH(CHAR)
define('APPLICATION_NAME', 'project');

//Database Host
define('DB_HOST', 'localhost');

//Database user
define('DB_USER', 'project_fatec');

//Database password
define('DB_PASSWORD', '$pj20!AS0#');

//Database TYPE
define('DB_TYPE', 'mysql');

//Database DB Name
define('DB_NAME', 'project');

//Database Port
define('DB_PORT', 3306);

//EMAIL OF THE APPLICATION(CHAR)
define('SMTP_EMAIL', '');

//EMAIL OF THE APPLICATION(CHAR)
define('SMTP_EMAIL_GREET', '');

//RELAY PORT(INT)
define('SMTP_PORT', 25);

//RELAY SERVER(CHAR)
define('SMTP_RELAY', '');

define('APPLICATION_VERSION', 1.00);

