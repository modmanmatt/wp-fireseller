<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'ValType.php';
require_once 'SortOrderCodeType.php';
require_once 'LabelType.php';

/**
 * A salient aspect or feature of an item. Used to describe an item in astandard 
 * way so that buyers can find it more easily. An individual,standardized 
 * characteristic that is common to all items within thespecified characteristics 
 * set. Applicable when working with ItemSpecifics (Attributes) and Pre-filled Item 
 * Information (Catalogs)functionality. See the eBay Web Services guide for more 
 * information. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CharacteristicType.html
 *
 */
class CharacteristicType extends EbatNs_ComplexType
{
	/**
	 * @var int
	 */
	protected $AttributeID;
	/**
	 * @var string
	 */
	protected $DateFormat;
	/**
	 * @var string
	 */
	protected $DisplaySequence;
	/**
	 * @var string
	 */
	protected $DisplayUOM;
	/**
	 * @var LabelType
	 */
	protected $Label;
	/**
	 * @var SortOrderCodeType
	 */
	protected $SortOrder;
	/**
	 * @var ValType
	 */
	protected $ValueList;

	/**
	 * @return int
	 */
	function getAttributeID()
	{
		return $this->AttributeID;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setAttributeID($value)
	{
		$this->AttributeID = $value;
	}
	/**
	 * @return string
	 */
	function getDateFormat()
	{
		return $this->DateFormat;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setDateFormat($value)
	{
		$this->DateFormat = $value;
	}
	/**
	 * @return string
	 */
	function getDisplaySequence()
	{
		return $this->DisplaySequence;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setDisplaySequence($value)
	{
		$this->DisplaySequence = $value;
	}
	/**
	 * @return string
	 */
	function getDisplayUOM()
	{
		return $this->DisplayUOM;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setDisplayUOM($value)
	{
		$this->DisplayUOM = $value;
	}
	/**
	 * @return LabelType
	 */
	function getLabel()
	{
		return $this->Label;
	}
	/**
	 * @return void
	 * @param LabelType $value 
	 */
	function setLabel($value)
	{
		$this->Label = $value;
	}
	/**
	 * @return SortOrderCodeType
	 */
	function getSortOrder()
	{
		return $this->SortOrder;
	}
	/**
	 * @return void
	 * @param SortOrderCodeType $value 
	 */
	function setSortOrder($value)
	{
		$this->SortOrder = $value;
	}
	/**
	 * @return ValType
	 * @param integer $index 
	 */
	function getValueList($index = null)
	{
		if ($index !== null) {
			return $this->ValueList[$index];
		} else {
			return $this->ValueList;
		}
	}
	/**
	 * @return void
	 * @param ValType $value 
	 * @param  $index 
	 */
	function setValueList($value, $index = null)
	{
		if ($index !== null) {
			$this->ValueList[$index] = $value;
		} else {
			$this->ValueList = $value;
		}
	}
	/**
	 * @return void
	 * @param ValType $value 
	 */
	function addValueList($value)
	{
		$this->ValueList[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('CharacteristicType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'AttributeID' =>
					array(
						'required' => true,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '1..1'
					),
					'DateFormat' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DisplaySequence' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DisplayUOM' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Label' =>
					array(
						'required' => false,
						'type' => 'LabelType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'SortOrder' =>
					array(
						'required' => false,
						'type' => 'SortOrderCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ValueList' =>
					array(
						'required' => false,
						'type' => 'ValType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
