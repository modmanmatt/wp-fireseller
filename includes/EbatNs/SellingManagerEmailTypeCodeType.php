<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Specifies the Selling Manager email type enumeration 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellingManagerEmailTypeCodeType.html
 *
 * @property string ManualEntry
 * @property string WinningBuyerEmail
 * @property string PaymentReminderEmail
 * @property string PaymentReceivedEmail
 * @property string RequestForShippingAddressEmail
 * @property string FeedbackReminderEmail
 * @property string ShipmentSentEmail
 * @property string PersonalizedEmail
 * @property string InvoiceNotification
 * @property string CustomEmailTemplate1
 * @property string CustomEmailTemplate2
 * @property string CustomEmailTemplate3
 * @property string CustomEmailTemplate4
 * @property string CustomEmailTemplate5
 * @property string CustomEmailTemplate6
 * @property string CustomEmailTemplate7
 * @property string CustomEmailTemplate8
 * @property string CustomEmailTemplate9
 * @property string CustomEmailTemplate10
 * @property string CustomEmailTemplate11
 * @property string CustomEmailTemplate12
 * @property string CustomEmailTemplate13
 * @property string CustomEmailTemplate14
 * @property string CustomEmailTemplate15
 * @property string CustomEmailTemplate16
 * @property string CustomEmailTemplate17
 * @property string CustomEmailTemplate18
 * @property string CustomEmailTemplate19
 * @property string CustomEmailTemplate20
 * @property string CustomCode
 */
class SellingManagerEmailTypeCodeType extends EbatNs_FacetType
{
	const CodeType_ManualEntry = 'ManualEntry';
	const CodeType_WinningBuyerEmail = 'WinningBuyerEmail';
	const CodeType_PaymentReminderEmail = 'PaymentReminderEmail';
	const CodeType_PaymentReceivedEmail = 'PaymentReceivedEmail';
	const CodeType_RequestForShippingAddressEmail = 'RequestForShippingAddressEmail';
	const CodeType_FeedbackReminderEmail = 'FeedbackReminderEmail';
	const CodeType_ShipmentSentEmail = 'ShipmentSentEmail';
	const CodeType_PersonalizedEmail = 'PersonalizedEmail';
	const CodeType_InvoiceNotification = 'InvoiceNotification';
	const CodeType_CustomEmailTemplate1 = 'CustomEmailTemplate1';
	const CodeType_CustomEmailTemplate2 = 'CustomEmailTemplate2';
	const CodeType_CustomEmailTemplate3 = 'CustomEmailTemplate3';
	const CodeType_CustomEmailTemplate4 = 'CustomEmailTemplate4';
	const CodeType_CustomEmailTemplate5 = 'CustomEmailTemplate5';
	const CodeType_CustomEmailTemplate6 = 'CustomEmailTemplate6';
	const CodeType_CustomEmailTemplate7 = 'CustomEmailTemplate7';
	const CodeType_CustomEmailTemplate8 = 'CustomEmailTemplate8';
	const CodeType_CustomEmailTemplate9 = 'CustomEmailTemplate9';
	const CodeType_CustomEmailTemplate10 = 'CustomEmailTemplate10';
	const CodeType_CustomEmailTemplate11 = 'CustomEmailTemplate11';
	const CodeType_CustomEmailTemplate12 = 'CustomEmailTemplate12';
	const CodeType_CustomEmailTemplate13 = 'CustomEmailTemplate13';
	const CodeType_CustomEmailTemplate14 = 'CustomEmailTemplate14';
	const CodeType_CustomEmailTemplate15 = 'CustomEmailTemplate15';
	const CodeType_CustomEmailTemplate16 = 'CustomEmailTemplate16';
	const CodeType_CustomEmailTemplate17 = 'CustomEmailTemplate17';
	const CodeType_CustomEmailTemplate18 = 'CustomEmailTemplate18';
	const CodeType_CustomEmailTemplate19 = 'CustomEmailTemplate19';
	const CodeType_CustomEmailTemplate20 = 'CustomEmailTemplate20';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellingManagerEmailTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SellingManagerEmailTypeCodeType = new SellingManagerEmailTypeCodeType();

?>
