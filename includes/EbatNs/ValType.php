<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 *  
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ValType.html
 *
 */
class ValType extends EbatNs_ComplexType
{
	/**
	 * @var string
	 */
	protected $ValueLiteral;
	/**
	 * @var string
	 */
	protected $SuggestedValueLiteral;
	/**
	 * @var int
	 */
	protected $ValueID;

	/**
	 * @return string
	 */
	function getValueLiteral()
	{
		return $this->ValueLiteral;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setValueLiteral($value)
	{
		$this->ValueLiteral = $value;
	}
	/**
	 * @return string
	 * @param integer $index 
	 */
	function getSuggestedValueLiteral($index = null)
	{
		if ($index !== null) {
			return $this->SuggestedValueLiteral[$index];
		} else {
			return $this->SuggestedValueLiteral;
		}
	}
	/**
	 * @return void
	 * @param string $value 
	 * @param  $index 
	 */
	function setSuggestedValueLiteral($value, $index = null)
	{
		if ($index !== null) {
			$this->SuggestedValueLiteral[$index] = $value;
		} else {
			$this->SuggestedValueLiteral = $value;
		}
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function addSuggestedValueLiteral($value)
	{
		$this->SuggestedValueLiteral[] = $value;
	}
	/**
	 * @return int
	 */
	function getValueID()
	{
		return $this->ValueID;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setValueID($value)
	{
		$this->ValueID = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ValType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ValueLiteral' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'SuggestedValueLiteral' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => true,
						'cardinality' => '0..*'
					),
					'ValueID' =>
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
