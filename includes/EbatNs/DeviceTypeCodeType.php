<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * The means of receipt of notification. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DeviceTypeCodeType.html
 *
 * @property string Platform
 * @property string SMS
 * @property string ClientAlerts
 * @property string CustomCode
 */
class DeviceTypeCodeType extends EbatNs_FacetType
{
	const CodeType_Platform = 'Platform';
	const CodeType_SMS = 'SMS';
	const CodeType_ClientAlerts = 'ClientAlerts';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('DeviceTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_DeviceTypeCodeType = new DeviceTypeCodeType();

?>
