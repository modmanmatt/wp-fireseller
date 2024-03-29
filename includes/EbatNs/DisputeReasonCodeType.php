<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Specifies the top-level reason for the dispute and determines the values youcan 
 * use for DisputeExplanation. Some values are for Item Not Received disputesand 
 * others are for Unpaid Item Process disputes. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DisputeReasonCodeType.html
 *
 * @property string BuyerHasNotPaid
 * @property string TransactionMutuallyCanceled
 * @property string ItemNotReceived
 * @property string SignificantlyNotAsDescribed
 * @property string NoRefund
 * @property string ReturnPolicyUnpaidItem
 * @property string CustomCode
 */
class DisputeReasonCodeType extends EbatNs_FacetType
{
	const CodeType_BuyerHasNotPaid = 'BuyerHasNotPaid';
	const CodeType_TransactionMutuallyCanceled = 'TransactionMutuallyCanceled';
	const CodeType_ItemNotReceived = 'ItemNotReceived';
	const CodeType_SignificantlyNotAsDescribed = 'SignificantlyNotAsDescribed';
	const CodeType_NoRefund = 'NoRefund';
	const CodeType_ReturnPolicyUnpaidItem = 'ReturnPolicyUnpaidItem';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('DisputeReasonCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_DisputeReasonCodeType = new DisputeReasonCodeType();

?>
