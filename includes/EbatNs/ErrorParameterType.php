<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * A variable that contains specific information about the context of this 
 * error.For example, if you pass in an attribute set ID that does not matchthe 
 * specified category, the attribute set ID might be returned as an error 
 * parameter.Use error parameters to flag fields that users need to correct.Also 
 * use error parameters to distinguish between errors when multipleerrors are 
 * returned. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ErrorParameterType.html
 *
 */
class ErrorParameterType extends EbatNs_ComplexType
{
	/**
	 * @var string
	 */
	protected $Value;

	/**
	 * @return string
	 */
	function getValue()
	{
		return $this->Value;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setValue($value)
	{
		$this->Value = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ErrorParameterType', 'http://www.w3.org/2001/XMLSchema');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Value' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));	$this->_attributes = array_merge($this->_attributes,
		array(
			'ParamID' =>
			array(
				'name' => 'ParamID',
				'type' => 'string',
				'use' => 'required'
			)
		));

	}
}
?>
