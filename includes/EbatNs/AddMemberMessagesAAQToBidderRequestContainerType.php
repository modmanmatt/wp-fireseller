<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'MemberMessageType.php';

/**
 * Holds the content of the request. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/AddMemberMessagesAAQToBidderRequestContainerType.html
 *
 */
class AddMemberMessagesAAQToBidderRequestContainerType extends EbatNs_ComplexType
{
	/**
	 * @var string
	 */
	protected $CorrelationID;
	/**
	 * @var string
	 */
	protected $ItemID;
	/**
	 * @var MemberMessageType
	 */
	protected $MemberMessage;

	/**
	 * @return string
	 */
	function getCorrelationID()
	{
		return $this->CorrelationID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setCorrelationID($value)
	{
		$this->CorrelationID = $value;
	}
	/**
	 * @return string
	 */
	function getItemID()
	{
		return $this->ItemID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setItemID($value)
	{
		$this->ItemID = $value;
	}
	/**
	 * @return MemberMessageType
	 */
	function getMemberMessage()
	{
		return $this->MemberMessage;
	}
	/**
	 * @return void
	 * @param MemberMessageType $value 
	 */
	function setMemberMessage($value)
	{
		$this->MemberMessage = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('AddMemberMessagesAAQToBidderRequestContainerType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'CorrelationID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ItemID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'MemberMessage' =>
					array(
						'required' => false,
						'type' => 'MemberMessageType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
