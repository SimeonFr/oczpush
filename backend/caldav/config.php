<?php
/***********************************************
 * File      :   backend/caldav/config.php
 * Project   :   Z-Push
 * Descr     :   Caldav backend configuration file

 * License   : 	AGPL (like original)
 ************************************************/

// *************************
//  BackendCalDAV settings
// *************************

define('CALDAV_SERVER', CALDAV_SERVER);
define('CALDAV_PORT', CALDAV_PORT);
define('CALDAV_PATH', CALDAV_PATH);
define('CALDAV_PERSONAL', CALDAV_PERSONAL); //Personal CalDAV folder
/*
 * define('CALDAV_SERVER', 'http://localhost');
 * define('CALDAV_PORT', '80');
 * define('CALDAV_PATH', '/owncloud/remote.php/caldav/calendars/%u/');
 * define('CALDAV_PERSONAL', 'defaultcalendar'); //Personal CalDAV folder
 */
?>