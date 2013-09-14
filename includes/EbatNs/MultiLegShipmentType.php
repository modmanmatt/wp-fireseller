<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'AddressType.php';
require_once 'MultiLegShippingServiceType.php';

/**
 * This type provides information about the shipping service, cost, address, and 
 * delivery estimates for the domestic leg of a Global Shipping Program 
 * shipment.<br/><br/><span class="tablenote"><strong>Note:</strong> The Global 
 * Shipping Program is now available for testing with simulated responses in the 
 * Sandbox. The full functionality of the Global Shipping Program will be available 
 * in September 2012.</span> 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/MultiLegShipmentType.html
 *
 */
class MultiLegShipmentType extends EbatNs_ComplexType
{
	/**
	 * @var MultiLegShippingServiceType
	 */
	protected $ShippingServiceDetails;
	/**
	 * @var AddressType
	 */
	protected $ShipToAddress;
	/**
	 * @var int
	 */
	protected $ShippingTimeMin;
	/**
	 * @var int
	 */
	protected $ShippingTimeMax;

	/**
	 * @return MultiLegShippingServiceType
	 */
	function getShippingServiceDetails()
	{
		return $this->ShippingServiceDetails;
	}
	/**
	 * @return void
	 * @param MultiLegShippingServiceType $value 
	 */
	function setShippingServiceDetails($value)
	{
		$this->ShippingServiceDetails = $value;
	}
	/**
	 * @return AddressType
	 */
	function getShipToAddress()
	{
		return $this->ShipToAddress;
	}
	/**
	 * @return void
	 * @param AddressType $value 
	 */
	function setShipToAddress($value)
	{
		$this->ShipToAddress = $value;
	}
	/**
	 * @return int
	 */
	function getShippingTimeMin()
	{
		return $this->ShippingTimeMin;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setShippingTimeMin($value)
	{
		$this->ShippingTimeMin = $value;
	}
	/**
	 * @return int
	 */
	function getShippingTimeMax()
	{
		return $this->ShippingTimeMax;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setShippingTimeMax($value)
	{
		$this->ShippingTimeMax = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('MultiLegShipmentType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ShippingServiceDetails' =>
					array(
						'required' => false,
						'type' => 'MultiLegShippingServiceType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ShipToAddress' =>
					array(
						'required' => false,
						'type' => 'AddressType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ShippingTimeMin' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ShippingTimeMax' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
