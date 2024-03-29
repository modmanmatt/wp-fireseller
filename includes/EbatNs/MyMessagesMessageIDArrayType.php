<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'MyMessagesMessageIDType.php';

/**
 * Contains a list of up to 10 MessageID values. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/MyMessagesMessageIDArrayType.html
 *
 */
class MyMessagesMessageIDArrayType extends EbatNs_ComplexType
{
	/**
	 * @var MyMessagesMessageIDType
	 */
	protected $MessageID;

	/**
	 * @return MyMessagesMessageIDType
	 * @param integer $index 
	 */
	function getMessageID($index = null)
	{
		if ($index !== null) {
			return $this->MessageID[$index];
		} else {
			return $this->MessageID;
		}
	}
	/**
	 * @return void
	 * @param MyMessagesMessageIDType $value 
	 * @param  $index 
	 */
	function setMessageID($value, $index = null)
	{
		if ($index !== null) {
			$this->MessageID[$index] = $value;
		} else {
			$this->MessageID = $value;
		}
	}
	/**
	 * @return void
	 * @param MyMessagesMessageIDType $value 
	 */
	function addMessageID($value)
	{
		$this->MessageID[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('MyMessagesMessageIDArrayType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'MessageID' =>
					array(
						'required' => false,
						'type' => 'MyMessagesMessageIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
