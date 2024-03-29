<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'UserIDType.php';
require_once 'SecondChanceOfferDurationCodeType.php';
require_once 'RecipientRelationCodeType.php';
require_once 'AmountType.php';
require_once 'AbstractRequestType.php';
require_once 'ItemIDType.php';

/**
 * Ends the eBay Motors listing specified by ItemID and creates a new 
 * TransactionConfirmation Request (TCR) for the item, thus enabling the TCR 
 * recipient topurchase the item. You can also use this call to see if a new TCR 
 * can be createdfor the specified item. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/AddTransactionConfirmationItemRequestType.html
 *
 */
class AddTransactionConfirmationItemRequestType extends AbstractRequestType
{
	/**
	 * @var UserIDType
	 */
	protected $RecipientUserID;
	/**
	 * @var string
	 */
	protected $VerifyEligibilityOnly;
	/**
	 * @var string
	 */
	protected $RecipientPostalCode;
	/**
	 * @var RecipientRelationCodeType
	 */
	protected $RecipientRelationType;
	/**
	 * @var AmountType
	 */
	protected $NegotiatedPrice;
	/**
	 * @var SecondChanceOfferDurationCodeType
	 */
	protected $ListingDuration;
	/**
	 * @var ItemIDType
	 */
	protected $ItemID;
	/**
	 * @var string
	 */
	protected $Comments;

	/**
	 * @return UserIDType
	 */
	function getRecipientUserID()
	{
		return $this->RecipientUserID;
	}
	/**
	 * @return void
	 * @param UserIDType $value 
	 */
	function setRecipientUserID($value)
	{
		$this->RecipientUserID = $value;
	}
	/**
	 * @return string
	 */
	function getVerifyEligibilityOnly()
	{
		return $this->VerifyEligibilityOnly;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setVerifyEligibilityOnly($value)
	{
		$this->VerifyEligibilityOnly = $value;
	}
	/**
	 * @return string
	 */
	function getRecipientPostalCode()
	{
		return $this->RecipientPostalCode;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setRecipientPostalCode($value)
	{
		$this->RecipientPostalCode = $value;
	}
	/**
	 * @return RecipientRelationCodeType
	 */
	function getRecipientRelationType()
	{
		return $this->RecipientRelationType;
	}
	/**
	 * @return void
	 * @param RecipientRelationCodeType $value 
	 */
	function setRecipientRelationType($value)
	{
		$this->RecipientRelationType = $value;
	}
	/**
	 * @return AmountType
	 */
	function getNegotiatedPrice()
	{
		return $this->NegotiatedPrice;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setNegotiatedPrice($value)
	{
		$this->NegotiatedPrice = $value;
	}
	/**
	 * @return SecondChanceOfferDurationCodeType
	 */
	function getListingDuration()
	{
		return $this->ListingDuration;
	}
	/**
	 * @return void
	 * @param SecondChanceOfferDurationCodeType $value 
	 */
	function setListingDuration($value)
	{
		$this->ListingDuration = $value;
	}
	/**
	 * @return ItemIDType
	 */
	function getItemID()
	{
		return $this->ItemID;
	}
	/**
	 * @return void
	 * @param ItemIDType $value 
	 */
	function setItemID($value)
	{
		$this->ItemID = $value;
	}
	/**
	 * @return string
	 */
	function getComments()
	{
		return $this->Comments;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setComments($value)
	{
		$this->Comments = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('AddTransactionConfirmationItemRequestType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'RecipientUserID' =>
					array(
						'required' => true,
						'type' => 'UserIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '1..1'
					),
					'VerifyEligibilityOnly' =>
					array(
						'required' => true,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '1..1'
					),
					'RecipientPostalCode' =>
					array(
						'required' => true,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '1..1'
					),
					'RecipientRelationType' =>
					array(
						'required' => true,
						'type' => 'RecipientRelationCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '1..1'
					),
					'NegotiatedPrice' =>
					array(
						'required' => true,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '1..1'
					),
					'ListingDuration' =>
					array(
						'required' => true,
						'type' => 'SecondChanceOfferDurationCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '1..1'
					),
					'ItemID' =>
					array(
						'required' => true,
						'type' => 'ItemIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '1..1'
					),
					'Comments' =>
					array(
						'required' => true,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '1..1'
					)
				));
	}
}
?>
