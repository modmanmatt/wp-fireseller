<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'ShipmentLineItemType.php';
require_once 'EbatNs_ComplexType.php';

/**
 * This type details the shipping carrier and shipment tracking number associated 
 * with apackage shipment. It also contains information about the line items 
 * shipped through the Global Shipping program. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ShipmentTrackingDetailsType.html
 *
 */
class ShipmentTrackingDetailsType extends EbatNs_ComplexType
{
	/**
	 * @var string
	 */
	protected $ShippingCarrierUsed;
	/**
	 * @var string
	 */
	protected $ShipmentTrackingNumber;
	/**
	 * @var ShipmentLineItemType
	 */
	protected $ShipmentLineItem;

	/**
	 * @return string
	 */
	function getShippingCarrierUsed()
	{
		return $this->ShippingCarrierUsed;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setShippingCarrierUsed($value)
	{
		$this->ShippingCarrierUsed = $value;
	}
	/**
	 * @return string
	 */
	function getShipmentTrackingNumber()
	{
		return $this->ShipmentTrackingNumber;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setShipmentTrackingNumber($value)
	{
		$this->ShipmentTrackingNumber = $value;
	}
	/**
	 * @return ShipmentLineItemType
	 */
	function getShipmentLineItem()
	{
		return $this->ShipmentLineItem;
	}
	/**
	 * @return void
	 * @param ShipmentLineItemType $value 
	 */
	function setShipmentLineItem($value)
	{
		$this->ShipmentLineItem = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ShipmentTrackingDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ShippingCarrierUsed' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ShipmentTrackingNumber' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ShipmentLineItem' =>
					array(
						'required' => false,
						'type' => 'ShipmentLineItemType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
