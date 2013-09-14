<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Details about custom Item Specifics validation rules. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ItemSpecificDetailsType.html
 *
 */
class ItemSpecificDetailsType extends EbatNs_ComplexType
{
	/**
	 * @var int
	 */
	protected $MaxItemSpecificsPerItem;
	/**
	 * @var int
	 */
	protected $MaxValuesPerName;
	/**
	 * @var int
	 */
	protected $MaxCharactersPerValue;
	/**
	 * @var int
	 */
	protected $MaxCharactersPerName;
	/**
	 * @var string
	 */
	protected $DetailVersion;
	/**
	 * @var dateTime
	 */
	protected $UpdateTime;

	/**
	 * @return int
	 */
	function getMaxItemSpecificsPerItem()
	{
		return $this->MaxItemSpecificsPerItem;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setMaxItemSpecificsPerItem($value)
	{
		$this->MaxItemSpecificsPerItem = $value;
	}
	/**
	 * @return int
	 */
	function getMaxValuesPerName()
	{
		return $this->MaxValuesPerName;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setMaxValuesPerName($value)
	{
		$this->MaxValuesPerName = $value;
	}
	/**
	 * @return int
	 */
	function getMaxCharactersPerValue()
	{
		return $this->MaxCharactersPerValue;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setMaxCharactersPerValue($value)
	{
		$this->MaxCharactersPerValue = $value;
	}
	/**
	 * @return int
	 */
	function getMaxCharactersPerName()
	{
		return $this->MaxCharactersPerName;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setMaxCharactersPerName($value)
	{
		$this->MaxCharactersPerName = $value;
	}
	/**
	 * @return string
	 */
	function getDetailVersion()
	{
		return $this->DetailVersion;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setDetailVersion($value)
	{
		$this->DetailVersion = $value;
	}
	/**
	 * @return dateTime
	 */
	function getUpdateTime()
	{
		return $this->UpdateTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setUpdateTime($value)
	{
		$this->UpdateTime = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ItemSpecificDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'MaxItemSpecificsPerItem' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'MaxValuesPerName' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'MaxCharactersPerValue' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'MaxCharactersPerName' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DetailVersion' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'UpdateTime' =>
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
