<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'AbstractResponseType.php';

/**
 * (out) Returns the success or failure of a SetNotificationPreferences request. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SetNotificationPreferencesResponseType.html
 *
 */
class SetNotificationPreferencesResponseType extends AbstractResponseType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SetNotificationPreferencesResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__])) {
			self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()], array());
		}
	}
}
?>
