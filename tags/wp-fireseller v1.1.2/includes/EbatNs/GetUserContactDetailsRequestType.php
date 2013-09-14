<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'AbstractRequestType.php';

/**
 * Returns contact information for a specified user, given that a bidding 
 * relationship(as either a buyer or seller) exists between the caller and the 
 * user. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetUserContactDetailsRequestType.html
 *
 */
class GetUserContactDetailsRequestType extends AbstractRequestType
{
	/**
	 * @var string
	 */
	protected $ItemID;
	/**
	 * @var string
	 */
	protected $ContactID;
	/**
	 * @var string
	 */
	protected $RequesterID;

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
	 * @return string
	 */
	function getContactID()
	{
		return $this->ContactID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setContactID($value)
	{
		$this->ContactID = $value;
	}
	/**
	 * @return string
	 */
	function getRequesterID()
	{
		return $this->RequesterID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setRequesterID($value)
	{
		$this->RequesterID = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetUserContactDetailsRequestType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ItemID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ContactID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'RequesterID' =>
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
