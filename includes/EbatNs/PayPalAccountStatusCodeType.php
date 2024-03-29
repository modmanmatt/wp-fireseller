<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * PayPal account status. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PayPalAccountStatusCodeType.html
 *
 * @property string Active
 * @property string Closed
 * @property string HighRestricted
 * @property string LowRestricted
 * @property string Locked
 * @property string CustomCode
 * @property string WireOff
 * @property string Unknown
 * @property string Invalid
 */
class PayPalAccountStatusCodeType extends EbatNs_FacetType
{
	const CodeType_Active = 'Active';
	const CodeType_Closed = 'Closed';
	const CodeType_HighRestricted = 'HighRestricted';
	const CodeType_LowRestricted = 'LowRestricted';
	const CodeType_Locked = 'Locked';
	const CodeType_CustomCode = 'CustomCode';
	const CodeType_WireOff = 'WireOff';
	const CodeType_Unknown = 'Unknown';
	const CodeType_Invalid = 'Invalid';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('PayPalAccountStatusCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_PayPalAccountStatusCodeType = new PayPalAccountStatusCodeType();

?>
