<?php

// URL to Microsoft Server ActiveSync
$url = 'https://'.$_SERVER['SERVER_NAME'].'/Microsoft-Server-ActiveSync';

include_once('lib/exceptions/exceptions.php');
include_once('lib/utils/utils.php');
include_once('lib/utils/compat.php');
include_once('lib/utils/timezoneutil.php');
include_once('lib/core/zpushdefs.php');
include_once('lib/core/stateobject.php');
include_once('lib/core/interprocessdata.php');
include_once('lib/core/pingtracking.php');
include_once('lib/core/topcollector.php');
include_once('lib/core/loopdetection.php');
include_once('lib/core/asdevice.php');
include_once('lib/core/statemanager.php');
include_once('lib/core/devicemanager.php');
include_once('lib/core/zpush.php');
include_once('lib/core/zlog.php');
include_once('lib/core/paddingfilter.php');
include_once('config.php');

$data = file_get_contents('php://input');
preg_match('/\<EMailAddress\>(.*?)(@.*)?\<\/EMailAddress\>/', $data, $email);
preg_match('/\<AcceptableResponseSchema\>(.*?)\<\/AcceptableResponseSchema\>/', $data, $schema);

ob_start();

if (!isset($email) || !isset($schema)) {
	ZLog::Write(LOGLEVEL_ERROR, 'AutoDiscover :: Unsupported Request: '.$data);
?>
<?xml version="1.0" encoding="utf-8"?>
<Autodiscover xmlns="http://schemas.microsoft.com/exchange/autodiscover/responseschema/2006" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
	<Response xmlns="http://schemas.microsoft.com/exchange/autodiscover/mobilesync/responseschema/2006">
	<Response>
		<Error Time="<?php echo date('H:i:s.u'); ?>" Id="1054084152">
			<ErrorCode>600</ErrorCode>
			<Message>Invalid Request</Message>
			<DebugData />
		</Error>
		</Response>
	<Autodiscover>
<?php
	exit;
}

ZLog::Write(LOGLEVEL_DEBUG, 'AutoDiscover :: Request: '.$data);
ZLog::Write(LOGLEVEL_INFO, 'AutoDiscover :: Request by email: '.$email[1].$email[2]);
ZLog::Write(LOGLEVEL_DEBUG, 'AutoDiscover :: Acceptable Response Schema: '.$schema[1]);

switch($schema[1]) {
	case 'http://schemas.microsoft.com/exchange/autodiscover/mobilesync/responseschema/2006': 
?>
<?xml version="1.0" encoding="utf-8"?>
<Autodiscover xmlns="http://schemas.microsoft.com/exchange/autodiscover/responseschema/2006" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
	<Response xmlns="http://schemas.microsoft.com/exchange/autodiscover/mobilesync/responseschema/2006">
		<Culture>en:us</Culture>
		<User>
			<DisplayName><?php echo $email[1].$email[2]; ?></DisplayName>
			<EMailAddress><?php echo $email[1].$email[2]; ?></EMailAddress>
		</User>
		<Action>
			<Settings>
				<Server>
					<Type>MobileSync</Type>
					<Url><?php echo $url; ?></Url>
					<Name><?php echo $url; ?></Name>
				</Server>
			</Settings>
		</Action>
	</Response>
</Autodiscover>
<?php
	ZLog::Write(LOGLEVEL_INFO, 'AutoDiscover :: Successful!');
	break;
	default:
?>
<?xml version="1.0" encoding="utf-8"?>
<Autodiscover xmlns="http://schemas.microsoft.com/exchange/autodiscover/responseschema/2006" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
	<Response xmlns="http://schemas.microsoft.com/exchange/autodiscover/mobilesync/responseschema/2006">
		<Error Time="<?php echo date('H:i:s.u'); ?>" Id="1054084152">
			<ErrorCode>601</ErrorCode>
			<Message>Invalid Request</Message>
			<DebugData />
		</Error>
	</Response>
<Autodiscover>
<?php
	ZLog::Write(LOGLEVEL_WARN, 'AutoDiscover :: Unsupported Schema: '.$schema[1]);
	break;
}
ZLog::Write(LOGLEVEL_DEBUG, 'AutoDiscover :: Response: '.ob_get_contents());
?>