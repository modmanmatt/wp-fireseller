<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Type of SMS subscription error. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SMSSubscriptionErrorCodeCodeType.html
 *
 * @property string SMSAggregatorNotAvailable
 * @property string PhoneNumberInvalid
 * @property string PhoneNumberChanged
 * @property string PhoneNumberCarrierChanged
 * @property string UserRequestedUnregistration
 * @property string CustomCode
 */
class SMSSubscriptionErrorCodeCodeType extends EbatNs_FacetType
{
	const CodeType_SMSAggregatorNotAvailable = 'SMSAggregatorNotAvailable';
	const CodeType_PhoneNumberInvalid = 'PhoneNumberInvalid';
	const CodeType_PhoneNumberChanged = 'PhoneNumberChanged';
	const CodeType_PhoneNumberCarrierChanged = 'PhoneNumberCarrierChanged';
	const CodeType_UserRequestedUnregistration = 'UserRequestedUnregistration';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SMSSubscriptionErrorCodeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SMSSubscriptionErrorCodeCodeType = new SMSSubscriptionErrorCodeCodeType();

?>
