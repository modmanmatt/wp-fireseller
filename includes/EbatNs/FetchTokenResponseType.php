<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'AbstractResponseType.php';

/**
 * Includes the authentication token for the user and the date it expires. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/FetchTokenResponseType.html
 *
 */
class FetchTokenResponseType extends AbstractResponseType
{
	/**
	 * @var string
	 */
	protected $eBayAuthToken;
	/**
	 * @var dateTime
	 */
	protected $HardExpirationTime;
	/**
	 * @var string
	 */
	protected $RESTToken;

	/**
	 * @return string
	 */
	function getEBayAuthToken()
	{
		return $this->eBayAuthToken;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setEBayAuthToken($value)
	{
		$this->eBayAuthToken = $value;
	}
	/**
	 * @return dateTime
	 */
	function getHardExpirationTime()
	{
		return $this->HardExpirationTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setHardExpirationTime($value)
	{
		$this->HardExpirationTime = $value;
	}
	/**
	 * @return string
	 */
	function getRESTToken()
	{
		return $this->RESTToken;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setRESTToken($value)
	{
		$this->RESTToken = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('FetchTokenResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'eBayAuthToken' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'HardExpirationTime' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'RESTToken' =>
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
