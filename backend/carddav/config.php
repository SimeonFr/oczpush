<?php
/***********************************************
 * File      :   backend/carddav/config.php
 * Project   :   Z-Push
 * Descr     :   Caldav backend configuration file

 * License   : 	AGPL (like original)
 ************************************************/

// **********************
//  BackendCardDAV settings
// **********************

define('CARDDAV_SERVER', CARDDAV_SERVER);
define('CARDDAV_PORT', CARDDAV_PORT);
define('CARDDAV_PATH', CARDDAV_PATH);
define('CARDDAV_PRINCIPAL', CARDDAV_PRINCIPAL); //Personal CardDAV folder
/*
 * define('CARDDAV_SERVER', 'http://contacts.domain.com');
 * define('CARDDAV_PORT', '80');
 * define('CARDDAV_PATH', '/caldav.php/%u/');
 * define('CARDDAV_PRINCIPAL', 'addresses'); //Personal CardDAV folder
 * 
 * 
 */

// ************************
//  BackendCardDAV_OC5 settings
// ************************
define('CARDDAV_PROTOCOL_OC5', CARDDAV_PROTOCOL_OC5);
define('CARDDAV_SERVER_OC5', CARDDAV_SERVER_OC5);
define('CARDDAV_PORT_OC5', CARDDAV_PORT_OC5);
define('CARDDAV_PATH_OC5', CARDDAV_PATH_OC5);
define('CARDDAV_CONTACTS_FOLDER_NAME_OC5', CARDDAV_CONTACTS_FOLDER_NAME_OC5); //Personal Adress book to sync (only 1)
define('CARDDAV_FILEAS_ALLWAYSOVERRIDE_OC5', CARDDAV_FILEAS_ALLWAYSOVERRIDE_OC5);
define('CARDDAV_READONLY_OC5', CARDDAV_READONLY_OC5);
define('CARDDAV_SYNC_ON_PING_OC5', CARDDAV_SYNC_ON_PING_OC5);
/*
 * // Server protocol: http or https
 * define('CARDDAV_PROTOCOL_OC5', 'http');
 * // Server name
 * define('CARDDAV_SERVER_OC5', 'localhost');
 * // Server port
 * define('CARDDAV_PORT_OC5', '80');
 * // Server path to the addressbook
 * // %u: replaced with the username
 * // %d: replaced with the domain
 * define('CARDDAV_PATH_OC5', '/owncloud/remote.php/carddav/addressbooks/%u/');
 * // Contact addressbook name
 * // %u: replaced with the username
 * // %d: replaced with the domain
 * define('CARDDAV_CONTACTS_FOLDER_NAME_OC5', 'contacts'); //Personal Adress book to sync (only 1)
 * // always override the FN value with the value generated in FILEAS_ORDER (true), or
 * // just create it according to the FILEAS_ORDER rule, if the value is empty (false)
 * define('CARDDAV_FILEAS_ALLWAYSOVERRIDE_OC5', true);
 * // for readonly szenarios set to 'true'
 * define('CARDDAV_READONLY_OC5', false);
 * // set if the CardDAV backend is queried on each AS pin or only on AS FORCECHECK s. AS config
 * // only sync on forcecheck saves server resources. Default is 'true'
 * define('CARDDAV_SYNC_ON_PING_OC5', true);
 */
?>