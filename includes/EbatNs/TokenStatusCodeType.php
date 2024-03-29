<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Contains the status of the token 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/TokenStatusCodeType.html
 *
 * @property string Active
 * @property string Expired
 * @property string RevokedByeBay
 * @property string RevokedByUser
 * @property string RevokedByApp
 * @property string Invalid
 * @property string CustomCode
 */
class TokenStatusCodeType extends EbatNs_FacetType
{
	const CodeType_Active = 'Active';
	const CodeType_Expired = 'Expired';
	const CodeType_RevokedByeBay = 'RevokedByeBay';
	const CodeType_RevokedByUser = 'RevokedByUser';
	const CodeType_RevokedByApp = 'RevokedByApp';
	const CodeType_Invalid = 'Invalid';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('TokenStatusCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_TokenStatusCodeType = new TokenStatusCodeType();

?>
