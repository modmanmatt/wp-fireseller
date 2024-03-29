<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Specifies the Date range. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/TimeRangeType.html
 *
 */
class TimeRangeType extends EbatNs_ComplexType
{
	/**
	 * @var dateTime
	 */
	protected $TimeFrom;
	/**
	 * @var dateTime
	 */
	protected $TimeTo;

	/**
	 * @return dateTime
	 */
	function getTimeFrom()
	{
		return $this->TimeFrom;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setTimeFrom($value)
	{
		$this->TimeFrom = $value;
	}
	/**
	 * @return dateTime
	 */
	function getTimeTo()
	{
		return $this->TimeTo;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setTimeTo($value)
	{
		$this->TimeTo = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('TimeRangeType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'TimeFrom' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'TimeTo' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
