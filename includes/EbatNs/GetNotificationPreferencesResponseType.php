<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'NotificationEnableArrayType.php';
require_once 'NotificationUserDataType.php';
require_once 'AbstractResponseType.php';
require_once 'ApplicationDeliveryPreferencesType.php';
require_once 'NotificationEventPropertyType.php';

/**
 * Contains the requesting application's notification 
 * preferences.GetNotificationPreferences retrieves preferences that you 
 * havedeliberately set. For example, if you enable the EndOfAuction event andthen 
 * later disable it, the response shows the EndOfAuction eventpreference as 
 * Disabled. But if you have never set a preference for theEndOfAuction event, no 
 * EndOfAuction preference is returned at all. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetNotificationPreferencesResponseType.html
 *
 */
class GetNotificationPreferencesResponseType extends AbstractResponseType
{
	/**
	 * @var ApplicationDeliveryPreferencesType
	 */
	protected $ApplicationDeliveryPreferences;
	/**
	 * @var string
	 */
	protected $DeliveryURLName;
	/**
	 * @var NotificationEnableArrayType
	 */
	protected $UserDeliveryPreferenceArray;
	/**
	 * @var NotificationUserDataType
	 */
	protected $UserData;
	/**
	 * @var NotificationEventPropertyType
	 */
	protected $EventProperty;

	/**
	 * @return ApplicationDeliveryPreferencesType
	 */
	function getApplicationDeliveryPreferences()
	{
		return $this->ApplicationDeliveryPreferences;
	}
	/**
	 * @return void
	 * @param ApplicationDeliveryPreferencesType $value 
	 */
	function setApplicationDeliveryPreferences($value)
	{
		$this->ApplicationDeliveryPreferences = $value;
	}
	/**
	 * @return string
	 */
	function getDeliveryURLName()
	{
		return $this->DeliveryURLName;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setDeliveryURLName($value)
	{
		$this->DeliveryURLName = $value;
	}
	/**
	 * @return NotificationEnableArrayType
	 */
	function getUserDeliveryPreferenceArray()
	{
		return $this->UserDeliveryPreferenceArray;
	}
	/**
	 * @return void
	 * @param NotificationEnableArrayType $value 
	 */
	function setUserDeliveryPreferenceArray($value)
	{
		$this->UserDeliveryPreferenceArray = $value;
	}
	/**
	 * @return NotificationUserDataType
	 */
	function getUserData()
	{
		return $this->UserData;
	}
	/**
	 * @return void
	 * @param NotificationUserDataType $value 
	 */
	function setUserData($value)
	{
		$this->UserData = $value;
	}
	/**
	 * @return NotificationEventPropertyType
	 * @param integer $index 
	 */
	function getEventProperty($index = null)
	{
		if ($index !== null) {
			return $this->EventProperty[$index];
		} else {
			return $this->EventProperty;
		}
	}
	/**
	 * @return void
	 * @param NotificationEventPropertyType $value 
	 * @param  $index 
	 */
	function setEventProperty($value, $index = null)
	{
		if ($index !== null) {
			$this->EventProperty[$index] = $value;
		} else {
			$this->EventProperty = $value;
		}
	}
	/**
	 * @return void
	 * @param NotificationEventPropertyType $value 
	 */
	function addEventProperty($value)
	{
		$this->EventProperty[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetNotificationPreferencesResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ApplicationDeliveryPreferences' =>
					array(
						'required' => false,
						'type' => 'ApplicationDeliveryPreferencesType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DeliveryURLName' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'UserDeliveryPreferenceArray' =>
					array(
						'required' => false,
						'type' => 'NotificationEnableArrayType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'UserData' =>
					array(
						'required' => false,
						'type' => 'NotificationUserDataType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'EventProperty' =>
					array(
						'required' => false,
						'type' => 'NotificationEventPropertyType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
