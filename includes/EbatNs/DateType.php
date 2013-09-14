<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Defines year, month, and day as individual components of a date.Only applicable 
 * to use cases that support incomplete dates.Otherwise, we use xs:dateTime (or 
 * xs:date, as appropriate). 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DateType.html
 *
 */
class DateType extends EbatNs_ComplexType
{
	/**
	 * @var int
	 */
	protected $Year;
	/**
	 * @var int
	 */
	protected $Month;
	/**
	 * @var int
	 */
	protected $Day;

	/**
	 * @return int
	 */
	function getYear()
	{
		return $this->Year;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setYear($value)
	{
		$this->Year = $value;
	}
	/**
	 * @return int
	 */
	function getMonth()
	{
		return $this->Month;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setMonth($value)
	{
		$this->Month = $value;
	}
	/**
	 * @return int
	 */
	function getDay()
	{
		return $this->Day;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setDay($value)
	{
		$this->Day = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('DateType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Year' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Month' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Day' =>
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
