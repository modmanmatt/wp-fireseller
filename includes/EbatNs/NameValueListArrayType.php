<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'NameValueListType.php';
require_once 'EbatNs_ComplexType.php';

/**
 * A list of one or more valid names and corresponding values. Currentlyused for 
 * Item Specifics and Variations. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/NameValueListArrayType.html
 *
 */
class NameValueListArrayType extends EbatNs_ComplexType
{
	/**
	 * @var NameValueListType
	 */
	protected $NameValueList;

	/**
	 * @return NameValueListType
	 * @param integer $index 
	 */
	function getNameValueList($index = null)
	{
		if ($index !== null) {
			return $this->NameValueList[$index];
		} else {
			return $this->NameValueList;
		}
	}
	/**
	 * @return void
	 * @param NameValueListType $value 
	 * @param  $index 
	 */
	function setNameValueList($value, $index = null)
	{
		if ($index !== null) {
			$this->NameValueList[$index] = $value;
		} else {
			$this->NameValueList = $value;
		}
	}
	/**
	 * @return void
	 * @param NameValueListType $value 
	 */
	function addNameValueList($value)
	{
		$this->NameValueList[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('NameValueListArrayType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'NameValueList' =>
					array(
						'required' => false,
						'type' => 'NameValueListType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
