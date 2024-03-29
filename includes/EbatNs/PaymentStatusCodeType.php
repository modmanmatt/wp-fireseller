<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Indicates the success or failure of the buyer's online payment for an order. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PaymentStatusCodeType.html
 *
 * @property string NoPaymentFailure
 * @property string BuyerECheckBounced
 * @property string BuyerCreditCardFailed
 * @property string BuyerFailedPaymentReportedBySeller
 * @property string PayPalPaymentInProcess
 * @property string PaymentInProcess
 * @property string CustomCode
 */
class PaymentStatusCodeType extends EbatNs_FacetType
{
	const CodeType_NoPaymentFailure = 'NoPaymentFailure';
	const CodeType_BuyerECheckBounced = 'BuyerECheckBounced';
	const CodeType_BuyerCreditCardFailed = 'BuyerCreditCardFailed';
	const CodeType_BuyerFailedPaymentReportedBySeller = 'BuyerFailedPaymentReportedBySeller';
	const CodeType_PayPalPaymentInProcess = 'PayPalPaymentInProcess';
	const CodeType_PaymentInProcess = 'PaymentInProcess';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('PaymentStatusCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_PaymentStatusCodeType = new PaymentStatusCodeType();

?>
