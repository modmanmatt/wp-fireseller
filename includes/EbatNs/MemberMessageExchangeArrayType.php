<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'MemberMessageExchangeType.php';

/**
 * Container for messages. Returned for GetMemberMessages if messages that meet the 
 * request criteria exist. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/MemberMessageExchangeArrayType.html
 *
 */
class MemberMessageExchangeArrayType extends EbatNs_ComplexType
{
	/**
	 * @var MemberMessageExchangeType
	 */
	protected $MemberMessageExchange;

	/**
	 * @return MemberMessageExchangeType
	 * @param integer $index 
	 */
	function getMemberMessageExchange($index = null)
	{
		if ($index !== null) {
			return $this->MemberMessageExchange[$index];
		} else {
			return $this->MemberMessageExchange;
		}
	}
	/**
	 * @return void
	 * @param MemberMessageExchangeType $value 
	 * @param  $index 
	 */
	function setMemberMessageExchange($value, $index = null)
	{
		if ($index !== null) {
			$this->MemberMessageExchange[$index] = $value;
		} else {
			$this->MemberMessageExchange = $value;
		}
	}
	/**
	 * @return void
	 * @param MemberMessageExchangeType $value 
	 */
	function addMemberMessageExchange($value)
	{
		$this->MemberMessageExchange[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('MemberMessageExchangeArrayType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'MemberMessageExchange' =>
					array(
						'required' => false,
						'type' => 'MemberMessageExchangeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
