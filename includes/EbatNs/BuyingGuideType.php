<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'UserIDType.php';
require_once 'EbatNs_ComplexType.php';

/**
 * Information that identifies a buying guide. A buying guide provides content 
 * about particularproduct areas, categories, or subjects to help buyers decide 
 * which type of itemto purchase based on their particular interests.Buying guides 
 * are useful to buyers who do not have a specific product in mind.For example, a 
 * digital camera buying guide could help a buyer determine what kind ofdigital 
 * camera is right for them. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/BuyingGuideType.html
 *
 */
class BuyingGuideType extends EbatNs_ComplexType
{
	/**
	 * @var string
	 */
	protected $Name;
	/**
	 * @var anyURI
	 */
	protected $URL;
	/**
	 * @var string
	 */
	protected $CategoryID;
	/**
	 * @var int
	 */
	protected $ProductFinderID;
	/**
	 * @var string
	 */
	protected $Title;
	/**
	 * @var string
	 */
	protected $Text;
	/**
	 * @var dateTime
	 */
	protected $CreationTime;
	/**
	 * @var UserIDType
	 */
	protected $UserID;

	/**
	 * @return string
	 */
	function getName()
	{
		return $this->Name;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setName($value)
	{
		$this->Name = $value;
	}
	/**
	 * @return anyURI
	 */
	function getURL()
	{
		return $this->URL;
	}
	/**
	 * @return void
	 * @param anyURI $value 
	 */
	function setURL($value)
	{
		$this->URL = $value;
	}
	/**
	 * @return string
	 */
	function getCategoryID()
	{
		return $this->CategoryID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setCategoryID($value)
	{
		$this->CategoryID = $value;
	}
	/**
	 * @return int
	 */
	function getProductFinderID()
	{
		return $this->ProductFinderID;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setProductFinderID($value)
	{
		$this->ProductFinderID = $value;
	}
	/**
	 * @return string
	 */
	function getTitle()
	{
		return $this->Title;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setTitle($value)
	{
		$this->Title = $value;
	}
	/**
	 * @return string
	 */
	function getText()
	{
		return $this->Text;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setText($value)
	{
		$this->Text = $value;
	}
	/**
	 * @return dateTime
	 */
	function getCreationTime()
	{
		return $this->CreationTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setCreationTime($value)
	{
		$this->CreationTime = $value;
	}
	/**
	 * @return UserIDType
	 */
	function getUserID()
	{
		return $this->UserID;
	}
	/**
	 * @return void
	 * @param UserIDType $value 
	 */
	function setUserID($value)
	{
		$this->UserID = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('BuyingGuideType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Name' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'URL' =>
					array(
						'required' => false,
						'type' => 'anyURI',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'CategoryID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ProductFinderID' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Title' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Text' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'CreationTime' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'UserID' =>
					array(
						'required' => false,
						'type' => 'UserIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
