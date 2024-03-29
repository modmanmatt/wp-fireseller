<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Defines who added a message to a dispute. Used for both Unpaid Itemand Item Not 
 * Received disputes. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DisputeMessageSourceCodeType.html
 *
 * @property string Buyer
 * @property string Seller
 * @property string eBay
 * @property string CustomCode
 */
class DisputeMessageSourceCodeType extends EbatNs_FacetType
{
	const CodeType_Buyer = 'Buyer';
	const CodeType_Seller = 'Seller';
	const CodeType_eBay = 'eBay';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('DisputeMessageSourceCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_DisputeMessageSourceCodeType = new DisputeMessageSourceCodeType();

?>
