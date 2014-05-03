<?php
/***********************************************
* File      :   backend/occombined/config.php
* Project   :   oczpush
* Descr     :   configuration file for the OCcombined backend.
* Adapted from original combined backend
* License   : 	AGPL (like original)
************************************************/

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
                'z' => array(
                    'name' => 'BackendZarafa',
                ),
                'm' => array(
                    'name' => 'BackendMaildir',
                ),
                'v' => array(
                    'name' => 'BackendVCardDir',
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
                SYNC_FOLDER_TYPE_TASK => 'd',
                SYNC_FOLDER_TYPE_APPOINTMENT => 'd',
                SYNC_FOLDER_TYPE_CONTACT => 'o',
                SYNC_FOLDER_TYPE_NOTE => 'd',
                SYNC_FOLDER_TYPE_JOURNAL => 'd',
                SYNC_FOLDER_TYPE_OTHER => OC_MAIL,
                SYNC_FOLDER_TYPE_USER_MAIL => OC_MAIL,
                SYNC_FOLDER_TYPE_USER_APPOINTMENT => 'd',
                SYNC_FOLDER_TYPE_USER_CONTACT => 'o',
                SYNC_FOLDER_TYPE_USER_TASK => 'd',
                SYNC_FOLDER_TYPE_USER_JOURNAL => 'd',
                SYNC_FOLDER_TYPE_USER_NOTE => 'd',
                SYNC_FOLDER_TYPE_UNKNOWN => 'd',
            ),
            //creating a new folder in the root folder should create a folder in one backend
            'rootcreatefolderbackend' => 'i',
        );
    }
}
?>