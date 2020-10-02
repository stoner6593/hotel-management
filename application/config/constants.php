<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



define('HOTEL_NAME', "Demo Hotel");


/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/**** USER DEFINED CONSTANTS **********/
define('ROLE_ADMIN',                            '1');
define('ROLE_MANAGER',                         	'2');
define('ROLE_EMPLOYEE',                         '3');

/**** USER DEFINED CONSTANTS TYPE RENTAL**********/
define('HORAS',                            '1');
define('DIAS',                         	'2');
//define('ROLE_EMPLOYEE',                         '3');

/** USER DEFINED CONSTANTS HOUR CHECKIN AND CHECKOUT */
define('CHECKIN',                           '12:00:00');
define('CHECKOUT',                         	'12:00:00');


//define('PATHFOLDER', "/hotelmanagement");
/* End of file constants.php */
/* Location: ./application/config/constants.php */