<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Type for the return policy details of an item. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ReturnPolicyType.html
 *
 */
class ReturnPolicyType extends EbatNs_ComplexType
{
	/**
	 * @var token
	 */
	protected $RefundOption;
	/**
	 * @var string
	 */
	protected $Refund;
	/**
	 * @var token
	 */
	protected $ReturnsWithinOption;
	/**
	 * @var string
	 */
	protected $ReturnsWithin;
	/**
	 * @var token
	 */
	protected $ReturnsAcceptedOption;
	/**
	 * @var string
	 */
	protected $ReturnsAccepted;
	/**
	 * @var string
	 */
	protected $Description;
	/**
	 * @var token
	 */
	protected $WarrantyOfferedOption;
	/**
	 * @var string
	 */
	protected $WarrantyOffered;
	/**
	 * @var token
	 */
	protected $WarrantyTypeOption;
	/**
	 * @var string
	 */
	protected $WarrantyType;
	/**
	 * @var token
	 */
	protected $WarrantyDurationOption;
	/**
	 * @var string
	 */
	protected $WarrantyDuration;
	/**
	 * @var string
	 */
	protected $EAN;
	/**
	 * @var token
	 */
	protected $ShippingCostPaidByOption;
	/**
	 * @var string
	 */
	protected $ShippingCostPaidBy;
	/**
	 * @var token
	 */
	protected $RestockingFeeValue;
	/**
	 * @var token
	 */
	protected $RestockingFeeValueOption;

	/**
	 * @return token
	 */
	function getRefundOption()
	{
		return $this->RefundOption;
	}
	/**
	 * @return void
	 * @param token $value 
	 */
	function setRefundOption($value)
	{
		$this->RefundOption = $value;
	}
	/**
	 * @return string
	 */
	function getRefund()
	{
		return $this->Refund;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setRefund($value)
	{
		$this->Refund = $value;
	}
	/**
	 * @return token
	 */
	function getReturnsWithinOption()
	{
		return $this->ReturnsWithinOption;
	}
	/**
	 * @return void
	 * @param token $value 
	 */
	function setReturnsWithinOption($value)
	{
		$this->ReturnsWithinOption = $value;
	}
	/**
	 * @return string
	 */
	function getReturnsWithin()
	{
		return $this->ReturnsWithin;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setReturnsWithin($value)
	{
		$this->ReturnsWithin = $value;
	}
	/**
	 * @return token
	 */
	function getReturnsAcceptedOption()
	{
		return $this->ReturnsAcceptedOption;
	}
	/**
	 * @return void
	 * @param token $value 
	 */
	function setReturnsAcceptedOption($value)
	{
		$this->ReturnsAcceptedOption = $value;
	}
	/**
	 * @return string
	 */
	function getReturnsAccepted()
	{
		return $this->ReturnsAccepted;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setReturnsAccepted($value)
	{
		$this->ReturnsAccepted = $value;
	}
	/**
	 * @return string
	 */
	function getDescription()
	{
		return $this->Description;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setDescription($value)
	{
		$this->Description = $value;
	}
	/**
	 * @return token
	 */
	function getWarrantyOfferedOption()
	{
		return $this->WarrantyOfferedOption;
	}
	/**
	 * @return void
	 * @param token $value 
	 */
	function setWarrantyOfferedOption($value)
	{
		$this->WarrantyOfferedOption = $value;
	}
	/**
	 * @return string
	 */
	function getWarrantyOffered()
	{
		return $this->WarrantyOffered;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setWarrantyOffered($value)
	{
		$this->WarrantyOffered = $value;
	}
	/**
	 * @return token
	 */
	function getWarrantyTypeOption()
	{
		return $this->WarrantyTypeOption;
	}
	/**
	 * @return void
	 * @param token $value 
	 */
	function setWarrantyTypeOption($value)
	{
		$this->WarrantyTypeOption = $value;
	}
	/**
	 * @return string
	 */
	function getWarrantyType()
	{
		return $this->WarrantyType;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setWarrantyType($value)
	{
		$this->WarrantyType = $value;
	}
	/**
	 * @return token
	 */
	function getWarrantyDurationOption()
	{
		return $this->WarrantyDurationOption;
	}
	/**
	 * @return void
	 * @param token $value 
	 */
	function setWarrantyDurationOption($value)
	{
		$this->WarrantyDurationOption = $value;
	}
	/**
	 * @return string
	 */
	function getWarrantyDuration()
	{
		return $this->WarrantyDuration;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setWarrantyDuration($value)
	{
		$this->WarrantyDuration = $value;
	}
	/**
	 * @return string
	 */
	function getEAN()
	{
		return $this->EAN;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setEAN($value)
	{
		$this->EAN = $value;
	}
	/**
	 * @return token
	 */
	function getShippingCostPaidByOption()
	{
		return $this->ShippingCostPaidByOption;
	}
	/**
	 * @return void
	 * @param token $value 
	 */
	function setShippingCostPaidByOption($value)
	{
		$this->ShippingCostPaidByOption = $value;
	}
	/**
	 * @return string
	 */
	function getShippingCostPaidBy()
	{
		return $this->ShippingCostPaidBy;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setShippingCostPaidBy($value)
	{
		$this->ShippingCostPaidBy = $value;
	}
	/**
	 * @return token
	 */
	function getRestockingFeeValue()
	{
		return $this->RestockingFeeValue;
	}
	/**
	 * @return void
	 * @param token $value 
	 */
	function setRestockingFeeValue($value)
	{
		$this->RestockingFeeValue = $value;
	}
	/**
	 * @return token
	 */
	function getRestockingFeeValueOption()
	{
		return $this->RestockingFeeValueOption;
	}
	/**
	 * @return void
	 * @param token $value 
	 */
	function setRestockingFeeValueOption($value)
	{
		$this->RestockingFeeValueOption = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ReturnPolicyType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'RefundOption' =>
					array(
						'required' => false,
						'type' => 'token',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Refund' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ReturnsWithinOption' =>
					array(
						'required' => false,
						'type' => 'token',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ReturnsWithin' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ReturnsAcceptedOption' =>
					array(
						'required' => false,
						'type' => 'token',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ReturnsAccepted' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Description' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'WarrantyOfferedOption' =>
					array(
						'required' => false,
						'type' => 'token',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'WarrantyOffered' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'WarrantyTypeOption' =>
					array(
						'required' => false,
						'type' => 'token',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'WarrantyType' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'WarrantyDurationOption' =>
					array(
						'required' => false,
						'type' => 'token',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'WarrantyDuration' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'EAN' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ShippingCostPaidByOption' =>
					array(
						'required' => false,
						'type' => 'token',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ShippingCostPaidBy' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'RestockingFeeValue' =>
					array(
						'required' => false,
						'type' => 'token',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'RestockingFeeValueOption' =>
					array(
						'required' => false,
						'type' => 'token',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
