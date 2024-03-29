<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'AmountType.php';

/**
 * Container consisting of shipping costs and other details related to an 
 * internationalshipping service. If one or more international shipping services 
 * are provided, theseller must specify at least one domestic shipping service as 
 * well. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/InternationalShippingServiceOptionsType.html
 *
 */
class InternationalShippingServiceOptionsType extends EbatNs_ComplexType
{
	/**
	 * @var token
	 */
	protected $ShippingService;
	/**
	 * @var AmountType
	 */
	protected $ShippingServiceCost;
	/**
	 * @var AmountType
	 */
	protected $ShippingServiceAdditionalCost;
	/**
	 * @var int
	 */
	protected $ShippingServicePriority;
	/**
	 * @var string
	 */
	protected $ShipToLocation;
	/**
	 * @var AmountType
	 */
	protected $ShippingInsuranceCost;
	/**
	 * @var AmountType
	 */
	protected $ImportCharge;

	/**
	 * @return token
	 */
	function getShippingService()
	{
		return $this->ShippingService;
	}
	/**
	 * @return void
	 * @param token $value 
	 */
	function setShippingService($value)
	{
		$this->ShippingService = $value;
	}
	/**
	 * @return AmountType
	 */
	function getShippingServiceCost()
	{
		return $this->ShippingServiceCost;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setShippingServiceCost($value)
	{
		$this->ShippingServiceCost = $value;
	}
	/**
	 * @return AmountType
	 */
	function getShippingServiceAdditionalCost()
	{
		return $this->ShippingServiceAdditionalCost;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setShippingServiceAdditionalCost($value)
	{
		$this->ShippingServiceAdditionalCost = $value;
	}
	/**
	 * @return int
	 */
	function getShippingServicePriority()
	{
		return $this->ShippingServicePriority;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setShippingServicePriority($value)
	{
		$this->ShippingServicePriority = $value;
	}
	/**
	 * @return string
	 * @param integer $index 
	 */
	function getShipToLocation($index = null)
	{
		if ($index !== null) {
			return $this->ShipToLocation[$index];
		} else {
			return $this->ShipToLocation;
		}
	}
	/**
	 * @return void
	 * @param string $value 
	 * @param  $index 
	 */
	function setShipToLocation($value, $index = null)
	{
		if ($index !== null) {
			$this->ShipToLocation[$index] = $value;
		} else {
			$this->ShipToLocation = $value;
		}
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function addShipToLocation($value)
	{
		$this->ShipToLocation[] = $value;
	}
	/**
	 * @return AmountType
	 */
	function getShippingInsuranceCost()
	{
		return $this->ShippingInsuranceCost;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setShippingInsuranceCost($value)
	{
		$this->ShippingInsuranceCost = $value;
	}
	/**
	 * @return AmountType
	 */
	function getImportCharge()
	{
		return $this->ImportCharge;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setImportCharge($value)
	{
		$this->ImportCharge = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('InternationalShippingServiceOptionsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ShippingService' =>
					array(
						'required' => false,
						'type' => 'token',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ShippingServiceCost' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ShippingServiceAdditionalCost' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ShippingServicePriority' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ShipToLocation' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => true,
						'cardinality' => '0..*'
					),
					'ShippingInsuranceCost' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ImportCharge' =>
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
