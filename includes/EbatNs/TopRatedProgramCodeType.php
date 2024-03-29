<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Container for top-rated seller program codes. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/TopRatedProgramCodeType.html
 *
 * @property string US
 * @property string UK
 * @property string DE
 * @property string Global
 * @property string CustomCode
 */
class TopRatedProgramCodeType extends EbatNs_FacetType
{
	const CodeType_US = 'US';
	const CodeType_UK = 'UK';
	const CodeType_DE = 'DE';
	const CodeType_Global = 'Global';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('TopRatedProgramCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_TopRatedProgramCodeType = new TopRatedProgramCodeType();

?>
