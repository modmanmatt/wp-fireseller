<?php
// autogenerated file 05.05.2008 16:30
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 *  
 *
 *
 * @property string Ascending
 * @property string Descending
 * @property string CustomCode
 */
class EbatNsCsSetExt_SortOrderCodeType extends EbatNs_FacetType
{
	const CodeType_Ascending = 'Ascending';
	const CodeType_Descending = 'Descending';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('EbatNsCsSetExt_SortOrderCodeType', 'http://www.intradesys.com/Schemas/ebay/AttributeData_Extension.xsd');

	}
}

$Facet_EbatNsCsSetExt_SortOrderCodeType = new EbatNsCsSetExt_SortOrderCodeType();

?>
