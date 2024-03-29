<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Enumeration type that specifies the dispute filters that can be used in 
 * theDisputeFilterType field of the GetUserDisputes call. Note that eBay 
 * BuyerProtection cases are not returned with the GetUserDisputes call, regardless 
 * ofthe filter that is used. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DisputeFilterTypeCodeType.html
 *
 * @property string AllInvolvedDisputes
 * @property string DisputesAwaitingMyResponse
 * @property string DisputesAwaitingOtherPartyResponse
 * @property string AllInvolvedClosedDisputes
 * @property string EligibleForCredit
 * @property string UnpaidItemDisputes
 * @property string ItemNotReceivedDisputes
 * @property string CustomCode
 */
class DisputeFilterTypeCodeType extends EbatNs_FacetType
{
	const CodeType_AllInvolvedDisputes = 'AllInvolvedDisputes';
	const CodeType_DisputesAwaitingMyResponse = 'DisputesAwaitingMyResponse';
	const CodeType_DisputesAwaitingOtherPartyResponse = 'DisputesAwaitingOtherPartyResponse';
	const CodeType_AllInvolvedClosedDisputes = 'AllInvolvedClosedDisputes';
	const CodeType_EligibleForCredit = 'EligibleForCredit';
	const CodeType_UnpaidItemDisputes = 'UnpaidItemDisputes';
	const CodeType_ItemNotReceivedDisputes = 'ItemNotReceivedDisputes';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('DisputeFilterTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_DisputeFilterTypeCodeType = new DisputeFilterTypeCodeType();

?>
