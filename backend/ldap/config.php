<?php
/***********************************************
 * File      :   backend/ldap/config.php
 * Project   :   Z-Push
 * Descr     :   Caldav backend configuration file

 * License   : 	AGPL (like original)
 ************************************************/

// **********************
//  BackendLDAP settings
// **********************

define('LDAP_SERVER', 'LDAP_SERVER');
define('LDAP_SERVER_PORT', 'LDAP_SERVER_PORT');
define('LDAP_USER_DN', 'LDAP_USER_DN');
define('LDAP_BASE_DNS', 'LDAP_BASE_DNS'); //Multiple values separator is |
/*
 * define('LDAP_SERVER', 'localhost');
 * define('LDAP_SERVER_PORT', '389');
 * define('LDAP_USER_DN', 'uid=%u,ou=mailaccount,dc=phppush,dc=com');
 * define('LDAP_BASE_DNS', 'Contacts:ou=addressbook,uid=%u,ou=mailaccount,dc=phppush,dc=com'); //Multiple values separator is |
 */
?>