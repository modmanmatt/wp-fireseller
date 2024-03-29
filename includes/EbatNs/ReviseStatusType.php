<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Contains data indicating whether an item has been revised since thelisting 
 * became active and, if so, which among a subset of propertieshave been changed by 
 * the revision.Output only. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ReviseStatusType.html
 *
 */
class ReviseStatusType extends EbatNs_ComplexType
{
	/**
	 * @var boolean
	 */
	protected $ItemRevised;
	/**
	 * @var boolean
	 */
	protected $BuyItNowAdded;
	/**
	 * @var boolean
	 */
	protected $BuyItNowLowered;
	/**
	 * @var boolean
	 */
	protected $ReserveLowered;
	/**
	 * @var boolean
	 */
	protected $ReserveRemoved;

	/**
	 * @return boolean
	 */
	function getItemRevised()
	{
		return $this->ItemRevised;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setItemRevised($value)
	{
		$this->ItemRevised = $value;
	}
	/**
	 * @return boolean
	 */
	function getBuyItNowAdded()
	{
		return $this->BuyItNowAdded;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setBuyItNowAdded($value)
	{
		$this->BuyItNowAdded = $value;
	}
	/**
	 * @return boolean
	 */
	function getBuyItNowLowered()
	{
		return $this->BuyItNowLowered;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setBuyItNowLowered($value)
	{
		$this->BuyItNowLowered = $value;
	}
	/**
	 * @return boolean
	 */
	function getReserveLowered()
	{
		return $this->ReserveLowered;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setReserveLowered($value)
	{
		$this->ReserveLowered = $value;
	}
	/**
	 * @return boolean
	 */
	function getReserveRemoved()
	{
		return $this->ReserveRemoved;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setReserveRemoved($value)
	{
		$this->ReserveRemoved = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ReviseStatusType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ItemRevised' =>
					array(
						'required' => true,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '1..1'
					),
					'BuyItNowAdded' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'BuyItNowLowered' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ReserveLowered' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ReserveRemoved' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
