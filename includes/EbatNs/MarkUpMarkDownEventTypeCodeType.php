<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Valid application status codes, either MarkUp (application was marked 
 * up,communication is restored) or MarkDown (application was marked down, 
 * nocommunication). 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/MarkUpMarkDownEventTypeCodeType.html
 *
 * @property string MarkUp
 * @property string MarkDown
 * @property string CustomCode
 */
class MarkUpMarkDownEventTypeCodeType extends EbatNs_FacetType
{
	const CodeType_MarkUp = 'MarkUp';
	const CodeType_MarkDown = 'MarkDown';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('MarkUpMarkDownEventTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_MarkUpMarkDownEventTypeCodeType = new MarkUpMarkDownEventTypeCodeType();

?>
