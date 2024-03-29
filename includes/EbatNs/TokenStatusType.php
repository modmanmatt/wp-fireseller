<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'TokenStatusCodeType.php';

/**
 * Returns token status. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/TokenStatusType.html
 *
 */
class TokenStatusType extends EbatNs_ComplexType
{
	/**
	 * @var TokenStatusCodeType
	 */
	protected $Status;
	/**
	 * @var string
	 */
	protected $EIASToken;
	/**
	 * @var dateTime
	 */
	protected $ExpirationTime;
	/**
	 * @var dateTime
	 */
	protected $RevocationTime;

	/**
	 * @return TokenStatusCodeType
	 */
	function getStatus()
	{
		return $this->Status;
	}
	/**
	 * @return void
	 * @param TokenStatusCodeType $value 
	 */
	function setStatus($value)
	{
		$this->Status = $value;
	}
	/**
	 * @return string
	 */
	function getEIASToken()
	{
		return $this->EIASToken;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setEIASToken($value)
	{
		$this->EIASToken = $value;
	}
	/**
	 * @return dateTime
	 */
	function getExpirationTime()
	{
		return $this->ExpirationTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setExpirationTime($value)
	{
		$this->ExpirationTime = $value;
	}
	/**
	 * @return dateTime
	 */
	function getRevocationTime()
	{
		return $this->RevocationTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setRevocationTime($value)
	{
		$this->RevocationTime = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('TokenStatusType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Status' =>
					array(
						'required' => false,
						'type' => 'TokenStatusCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'EIASToken' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ExpirationTime' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'RevocationTime' =>
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
