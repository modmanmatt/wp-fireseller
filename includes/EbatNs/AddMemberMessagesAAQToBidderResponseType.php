<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'AddMemberMessagesAAQToBidderResponseContainerType.php';
require_once 'AbstractResponseType.php';

/**
 * Type defining the <b>AddMemberMessagesAAQToBidderResponseContainer</b> 
 * container, which consists of the <b>Ack</b> field (indicating the result of the 
 * send message operation) and the <b>CorrelationID</b> field (used to track 
 * multiple send message operations performed in one call). 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/AddMemberMessagesAAQToBidderResponseType.html
 *
 */
class AddMemberMessagesAAQToBidderResponseType extends AbstractResponseType
{
	/**
	 * @var AddMemberMessagesAAQToBidderResponseContainerType
	 */
	protected $AddMemberMessagesAAQToBidderResponseContainer;

	/**
	 * @return AddMemberMessagesAAQToBidderResponseContainerType
	 * @param integer $index 
	 */
	function getAddMemberMessagesAAQToBidderResponseContainer($index = null)
	{
		if ($index !== null) {
			return $this->AddMemberMessagesAAQToBidderResponseContainer[$index];
		} else {
			return $this->AddMemberMessagesAAQToBidderResponseContainer;
		}
	}
	/**
	 * @return void
	 * @param AddMemberMessagesAAQToBidderResponseContainerType $value 
	 * @param  $index 
	 */
	function setAddMemberMessagesAAQToBidderResponseContainer($value, $index = null)
	{
		if ($index !== null) {
			$this->AddMemberMessagesAAQToBidderResponseContainer[$index] = $value;
		} else {
			$this->AddMemberMessagesAAQToBidderResponseContainer = $value;
		}
	}
	/**
	 * @return void
	 * @param AddMemberMessagesAAQToBidderResponseContainerType $value 
	 */
	function addAddMemberMessagesAAQToBidderResponseContainer($value)
	{
		$this->AddMemberMessagesAAQToBidderResponseContainer[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('AddMemberMessagesAAQToBidderResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'AddMemberMessagesAAQToBidderResponseContainer' =>
					array(
						'required' => false,
						'type' => 'AddMemberMessagesAAQToBidderResponseContainerType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
