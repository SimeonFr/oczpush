<?php
/***********************************************
* File      :   backend/occombined/config.php
* Project   :   oczpush
* Descr     :   configuration file for the OCcombined backend.
* Adapted from original combined backend
* License   : 	AGPL (like original)
************************************************/

define('OC_Server', 'localhost');
define('OC_PORT', '80');

define('CARDDAV_SERVER', 'https://'.OC_Server);
define('CARDDAV_PORT', OC_PORT);
define('CARDDAV_PATH', '/owncloud/remote.php/carddav/addressbooks/%u/');
define('CARDDAV_PRINCIPAL', ''); //Personal CardDAV folder

define('CARDDAV_PROTOCOL_OC5', 'https');
define('CARDDAV_SERVER_OC5', 'OC_Server');
define('CARDDAV_PORT_OC5', 'OC_PORT');
define('CARDDAV_PATH_OC5', '/owncloud/remote.php/carddav/addressbooks/%u/');
define('CARDDAV_CONTACTS_FOLDER_NAME_OC5', 'contacts'); //Personal Adress book to sync (only 1)
define('CARDDAV_FILEAS_ALLWAYSOVERRIDE_OC5', true);
define('CARDDAV_READONLY_OC5', false);
define('CARDDAV_SYNC_ON_PING_OC5', true);

define('CALDAV_SERVER', 'https://'.OC_Server);
define('CALDAV_PORT', 'OC_PORT');
define('CALDAV_PATH', '/owncloud/remote.php/caldav/calendars/%u/');
define('CALDAV_PERSONAL', ''); //Personal CalDAV folder

define('LDAP_SERVER', OC_Server);
define('LDAP_SERVER_PORT', '389');
define('LDAP_USER_DN', 'uid=%u,ou=mailaccount,dc=phppush,dc=com');
define('LDAP_BASE_DNS', 'Contacts:ou=addressbook,uid=%u,ou=mailaccount,dc=phppush,dc=com'); //Multiple values separator is |


class BackendOCCombinedConfig {

    // *************************
    //  BackendOCCombined settings
    // *************************
    /**
     * Returns the configuration of the combined backend
     *
     * @access public
     * @return array
     *
     */
    public static function GetBackendOCCombinedConfig() {
        //use a function for it because php does not allow
        //assigning variables to the class members (expecting T_STRING)
        return array(
            //the order in which the backends are loaded.
            //login only succeeds if all backend return true on login
            //sending mail: the mail is sent with first backend that is able to send the mail
            'backends' => array(
                'i' => array(
                    'name' => 'BackendIMAP',
                ),
                'm' => array(
                    'name' => 'BackendMaildir',
                ),
                'l' => array(
                    'name' => 'BackendLDAP',
                ),
                'r' => array(
                    'name' => 'BackendCardDAV',
//                    'name' => 'BackendCardDAV_OC5',
                ),
                'l' => array(
                    'name' => 'BackendCalDAV',
                ),
            	'o' => array(
                    'name' => 'BackendOCContacts',
                ),
                'a' => array(
                    'name' => 'BackendOCCalendar',
                ),
				'd' => array(
                    'name' => 'BackendDummy',
                ),
            ),
            'delimiter' => '/',
            //force one type of folder to one backend
            //it must match one of the above defined backends
            'folderbackend' => array(
                SYNC_FOLDER_TYPE_INBOX => OC_MAIL,
                SYNC_FOLDER_TYPE_DRAFTS => OC_MAIL,
                SYNC_FOLDER_TYPE_WASTEBASKET => OC_MAIL,
                SYNC_FOLDER_TYPE_SENTMAIL => OC_MAIL,
                SYNC_FOLDER_TYPE_OUTBOX => OC_MAIL,
                SYNC_FOLDER_TYPE_TASK => 'l',
                SYNC_FOLDER_TYPE_APPOINTMENT => 'l',
                SYNC_FOLDER_TYPE_CONTACT => 'r',
                SYNC_FOLDER_TYPE_NOTE => 'd',
//                SYNC_FOLDER_TYPE_JOURNAL => 'l',
                SYNC_FOLDER_TYPE_OTHER => OC_MAIL,
                SYNC_FOLDER_TYPE_USER_MAIL => OC_MAIL,
                SYNC_FOLDER_TYPE_USER_APPOINTMENT => 'l',
                SYNC_FOLDER_TYPE_USER_CONTACT => 'r',
                SYNC_FOLDER_TYPE_USER_TASK => 'l',
//                SYNC_FOLDER_TYPE_USER_JOURNAL => 'l',
                SYNC_FOLDER_TYPE_USER_NOTE => 'd',
                SYNC_FOLDER_TYPE_UNKNOWN => 'd',
            ),
            //creating a new folder in the root folder should create a folder in one backend
            'rootcreatefolderbackend' => 'i',
        );
    }
}
?>