<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'NotificationEventTypeCodeType.php';
require_once 'NotificationEventPropertyNameCodeType.php';

/**
 * Defines properties associated with a particular event. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/NotificationEventPropertyType.html
 *
 */
class NotificationEventPropertyType extends EbatNs_ComplexType
{
	/**
	 * @var NotificationEventTypeCodeType
	 */
	protected $EventType;
	/**
	 * @var NotificationEventPropertyNameCodeType
	 */
	protected $Name;
	/**
	 * @var string
	 */
	protected $Value;

	/**
	 * @return NotificationEventTypeCodeType
	 */
	function getEventType()
	{
		return $this->EventType;
	}
	/**
	 * @return void
	 * @param NotificationEventTypeCodeType $value 
	 */
	function setEventType($value)
	{
		$this->EventType = $value;
	}
	/**
	 * @return NotificationEventPropertyNameCodeType
	 */
	function getName()
	{
		return $this->Name;
	}
	/**
	 * @return void
	 * @param NotificationEventPropertyNameCodeType $value 
	 */
	function setName($value)
	{
		$this->Name = $value;
	}
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
		parent::__construct('NotificationEventPropertyType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'EventType' =>
					array(
						'required' => false,
						'type' => 'NotificationEventTypeCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Name' =>
					array(
						'required' => false,
						'type' => 'NotificationEventPropertyNameCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Value' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
