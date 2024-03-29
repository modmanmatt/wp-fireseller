<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Specifies the action to take for an item's My eBay notes. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SetUserNotesActionCodeType.html
 *
 * @property string AddOrUpdate
 * @property string Delete
 * @property string CustomCode
 */
class SetUserNotesActionCodeType extends EbatNs_FacetType
{
	const CodeType_AddOrUpdate = 'AddOrUpdate';
	const CodeType_Delete = 'Delete';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SetUserNotesActionCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SetUserNotesActionCodeType = new SetUserNotesActionCodeType();

?>
