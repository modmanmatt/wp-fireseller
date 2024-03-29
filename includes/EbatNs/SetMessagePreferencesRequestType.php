<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'ASQPreferencesType.php';
require_once 'AbstractRequestType.php';

/**
 * Enables a seller to add custom Ask Seller a Question (ASQ) subjects to theirAsk 
 * a Question page, or to reset any custom subjects to their default values. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SetMessagePreferencesRequestType.html
 *
 */
class SetMessagePreferencesRequestType extends AbstractRequestType
{
	/**
	 * @var ASQPreferencesType
	 */
	protected $ASQPreferences;

	/**
	 * @return ASQPreferencesType
	 */
	function getASQPreferences()
	{
		return $this->ASQPreferences;
	}
	/**
	 * @return void
	 * @param ASQPreferencesType $value 
	 */
	function setASQPreferences($value)
	{
		$this->ASQPreferences = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SetMessagePreferencesRequestType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ASQPreferences' =>
					array(
						'required' => false,
						'type' => 'ASQPreferencesType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
