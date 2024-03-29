<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'AmountType.php';

/**
 * Container consisting of details related to payment of an eBay order on 
 * anexternal system such as PayPal. This container is only returned if payment 
 * hasbeen made on an order. For GetSellerTransaactions and GetItemTransactions, 
 * thiscontainer is not returned for multiple line item orders. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ExternalTransactionType.html
 *
 */
class ExternalTransactionType extends EbatNs_ComplexType
{
	/**
	 * @var string
	 */
	protected $ExternalTransactionID;
	/**
	 * @var dateTime
	 */
	protected $ExternalTransactionTime;
	/**
	 * @var AmountType
	 */
	protected $FeeOrCreditAmount;
	/**
	 * @var AmountType
	 */
	protected $PaymentOrRefundAmount;

	/**
	 * @return string
	 */
	function getExternalTransactionID()
	{
		return $this->ExternalTransactionID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setExternalTransactionID($value)
	{
		$this->ExternalTransactionID = $value;
	}
	/**
	 * @return dateTime
	 */
	function getExternalTransactionTime()
	{
		return $this->ExternalTransactionTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setExternalTransactionTime($value)
	{
		$this->ExternalTransactionTime = $value;
	}
	/**
	 * @return AmountType
	 */
	function getFeeOrCreditAmount()
	{
		return $this->FeeOrCreditAmount;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setFeeOrCreditAmount($value)
	{
		$this->FeeOrCreditAmount = $value;
	}
	/**
	 * @return AmountType
	 */
	function getPaymentOrRefundAmount()
	{
		return $this->PaymentOrRefundAmount;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setPaymentOrRefundAmount($value)
	{
		$this->PaymentOrRefundAmount = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ExternalTransactionType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ExternalTransactionID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ExternalTransactionTime' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'FeeOrCreditAmount' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PaymentOrRefundAmount' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
