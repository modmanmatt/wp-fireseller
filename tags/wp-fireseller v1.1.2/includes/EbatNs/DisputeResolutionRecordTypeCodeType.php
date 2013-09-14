<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Specifies the action taken by eBay as a result of the dispute resolution. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DisputeResolutionRecordTypeCodeType.html
 *
 * @property string StrikeBuyer
 * @property string SuspendBuyer
 * @property string RestrictBuyer
 * @property string FVFCredit
 * @property string InsertionFeeCredit
 * @property string AppealBuyerStrike
 * @property string UnsuspendBuyer
 * @property string UnrestrictBuyer
 * @property string ReverseFVFCredit
 * @property string ReverseInsertionFeeCredit
 * @property string GenerateCSTicketForSuspend
 * @property string FVFCreditNotGranted
 * @property string ItemNotReceivedClaimFiled
 * @property string UnpaidItemRelisted
 * @property string UnpaidItemRevised
 * @property string FVFOnShippingCredit
 * @property string FVFOnShippingCreditNotGranted
 * @property string ReverseFVFOnShippingCredit
 * @property string FeatureFeeCredit
 * @property string FeatureFeeNotCredit
 * @property string ReverseFeatureFeeCredit
 * @property string CustomCode
 */
class DisputeResolutionRecordTypeCodeType extends EbatNs_FacetType
{
	const CodeType_StrikeBuyer = 'StrikeBuyer';
	const CodeType_SuspendBuyer = 'SuspendBuyer';
	const CodeType_RestrictBuyer = 'RestrictBuyer';
	const CodeType_FVFCredit = 'FVFCredit';
	const CodeType_InsertionFeeCredit = 'InsertionFeeCredit';
	const CodeType_AppealBuyerStrike = 'AppealBuyerStrike';
	const CodeType_UnsuspendBuyer = 'UnsuspendBuyer';
	const CodeType_UnrestrictBuyer = 'UnrestrictBuyer';
	const CodeType_ReverseFVFCredit = 'ReverseFVFCredit';
	const CodeType_ReverseInsertionFeeCredit = 'ReverseInsertionFeeCredit';
	const CodeType_GenerateCSTicketForSuspend = 'GenerateCSTicketForSuspend';
	const CodeType_FVFCreditNotGranted = 'FVFCreditNotGranted';
	const CodeType_ItemNotReceivedClaimFiled = 'ItemNotReceivedClaimFiled';
	const CodeType_UnpaidItemRelisted = 'UnpaidItemRelisted';
	const CodeType_UnpaidItemRevised = 'UnpaidItemRevised';
	const CodeType_FVFOnShippingCredit = 'FVFOnShippingCredit';
	const CodeType_FVFOnShippingCreditNotGranted = 'FVFOnShippingCreditNotGranted';
	const CodeType_ReverseFVFOnShippingCredit = 'ReverseFVFOnShippingCredit';
	const CodeType_FeatureFeeCredit = 'FeatureFeeCredit';
	const CodeType_FeatureFeeNotCredit = 'FeatureFeeNotCredit';
	const CodeType_ReverseFeatureFeeCredit = 'ReverseFeatureFeeCredit';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('DisputeResolutionRecordTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_DisputeResolutionRecordTypeCodeType = new DisputeResolutionRecordTypeCodeType();

?>
