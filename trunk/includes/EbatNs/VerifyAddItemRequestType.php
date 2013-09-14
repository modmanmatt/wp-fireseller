<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'ExternalProductIDType.php';
require_once 'ItemType.php';
require_once 'AbstractRequestType.php';

/**
 * Enables a seller to specify the definition of a new item and submit the 
 * definition to eBay without creating a listing.&nbsp;<b>Also for 
 * Half.com</b>.<br><br>Sellers who engage in cross-border trade on sites that 
 * require a recoupment agreement, must agree to therecoupment terms before adding 
 * or verifying items. This agreement allows eBay to reimbursea buyer during a 
 * dispute and then recoup the cost from the seller. The US site is a recoupment 
 * site, and the agreement is located <a 
 * href="https://scgi.ebay.com/ws/eBayISAPI.dll?CBTRecoupAgreement">here</a>. The 
 * list of the sites where a user has agreed to the recoupment terms is returned by 
 * the GetUser response. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/VerifyAddItemRequestType.html
 *
 */
class VerifyAddItemRequestType extends AbstractRequestType
{
	/**
	 * @var ItemType
	 */
	protected $Item;
	/**
	 * @var boolean
	 */
	protected $IncludeExpressRequirements;
	/**
	 * @var ExternalProductIDType
	 */
	protected $ExternalProductID;

	/**
	 * @return ItemType
	 */
	function getItem()
	{
		return $this->Item;
	}
	/**
	 * @return void
	 * @param ItemType $value 
	 */
	function setItem($value)
	{
		$this->Item = $value;
	}
	/**
	 * @return boolean
	 */
	function getIncludeExpressRequirements()
	{
		return $this->IncludeExpressRequirements;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setIncludeExpressRequirements($value)
	{
		$this->IncludeExpressRequirements = $value;
	}
	/**
	 * @return ExternalProductIDType
	 */
	function getExternalProductID()
	{
		return $this->ExternalProductID;
	}
	/**
	 * @return void
	 * @param ExternalProductIDType $value 
	 */
	function setExternalProductID($value)
	{
		$this->ExternalProductID = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('VerifyAddItemRequestType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Item' =>
					array(
						'required' => false,
						'type' => 'ItemType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'IncludeExpressRequirements' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ExternalProductID' =>
					array(
						'required' => false,
						'type' => 'ExternalProductIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
