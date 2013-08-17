<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * These are payment methods that sellers can use to pay eBay fees. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellerPaymentMethodCodeType.html
 *
 * @property string NothingOnFile
 * @property string CreditCard
 * @property string PayPal
 * @property string DirectDebit
 * @property string DirectDebitPendingSignatureMandate
 * @property string eBayDirectPay
 * @property string CustomCode
 * @property string DirectDebitPendingVerification
 */
class SellerPaymentMethodCodeType extends EbatNs_FacetType
{
	const CodeType_NothingOnFile = 'NothingOnFile';
	const CodeType_CreditCard = 'CreditCard';
	const CodeType_PayPal = 'PayPal';
	const CodeType_DirectDebit = 'DirectDebit';
	const CodeType_DirectDebitPendingSignatureMandate = 'DirectDebitPendingSignatureMandate';
	const CodeType_eBayDirectPay = 'eBayDirectPay';
	const CodeType_CustomCode = 'CustomCode';
	const CodeType_DirectDebitPendingVerification = 'DirectDebitPendingVerification';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellerPaymentMethodCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SellerPaymentMethodCodeType = new SellerPaymentMethodCodeType();

?>
