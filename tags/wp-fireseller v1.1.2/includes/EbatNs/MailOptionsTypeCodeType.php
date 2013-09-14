<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 *  
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/MailOptionsTypeCodeType.html
 *
 * @property string DoNotSendEmail
 * @property string EmailCopyToSender
 * @property string HideSenderEmailAddress
 * @property string CustomCode
 */
class MailOptionsTypeCodeType extends EbatNs_FacetType
{
	const CodeType_DoNotSendEmail = 'DoNotSendEmail';
	const CodeType_EmailCopyToSender = 'EmailCopyToSender';
	const CodeType_HideSenderEmailAddress = 'HideSenderEmailAddress';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('MailOptionsTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_MailOptionsTypeCodeType = new MailOptionsTypeCodeType();

?>
