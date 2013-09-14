<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * A code indicating the source from which the refund was made. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/RefundingSourceTypeCodeType.html
 *
 * @property string ScheduledPayout
 * @property string Paypal
 * @property string BankAccount
 * @property string CustomCode
 */
class RefundingSourceTypeCodeType extends EbatNs_FacetType
{
	const CodeType_ScheduledPayout = 'ScheduledPayout';
	const CodeType_Paypal = 'Paypal';
	const CodeType_BankAccount = 'BankAccount';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('RefundingSourceTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_RefundingSourceTypeCodeType = new RefundingSourceTypeCodeType();

?>
