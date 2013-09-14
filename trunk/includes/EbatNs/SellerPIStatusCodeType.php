<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Enumerated type that indicates whether or not a new DE or AT seller has accepted 
 * theuser agreement related to the new payment process. The new payment process 
 * for the DEand AT sites is scheduled to be implemented in late August 2011. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellerPIStatusCodeType.html
 *
 * @property string AcceptedUA
 * @property string MustAcceptUA
 * @property string PIEnabled
 * @property string CustomCode
 */
class SellerPIStatusCodeType extends EbatNs_FacetType
{
	const CodeType_AcceptedUA = 'AcceptedUA';
	const CodeType_MustAcceptUA = 'MustAcceptUA';
	const CodeType_PIEnabled = 'PIEnabled';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellerPIStatusCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SellerPIStatusCodeType = new SellerPIStatusCodeType();

?>
