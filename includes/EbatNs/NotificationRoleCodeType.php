<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Defines roles for platform notifications. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/NotificationRoleCodeType.html
 *
 * @property string Application
 * @property string User
 * @property string UserData
 * @property string Event
 * @property string CustomCode
 */
class NotificationRoleCodeType extends EbatNs_FacetType
{
	const CodeType_Application = 'Application';
	const CodeType_User = 'User';
	const CodeType_UserData = 'UserData';
	const CodeType_Event = 'Event';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('NotificationRoleCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_NotificationRoleCodeType = new NotificationRoleCodeType();

?>
