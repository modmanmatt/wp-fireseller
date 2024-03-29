<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'AbstractRequestType.php';

/**
 * No longer recommended. This supports an older ID-based format for describing 
 * item specifics and product details.Most eBay categories no longer support 
 * ID-based attributes.The remaining categories (e.g., US eBay Motors) will drop 
 * support for ID-based attributes by May 2012. New applications should not use 
 * ID-based attributes. Existing applications should be updated to remove all 
 * dependencieson ID-based attributes now. Instead, use FindProducts in eBay's 
 * Shopping API to search for product details.<br><br>Retrieves the attributes a 
 * seller can use to form a query whensearching for Pre-filled Item Information to 
 * use in a listing fora category that is catalog-enabled. This call is applicable 
 * foruse cases related to listing items with Pre-filled ItemInformation. 
 * Specifically, it retrieves datathat you use to construct valid 
 * "single-attribute" queries. Theattributes describe search criteria (e.g., 
 * Author) and sortingcriteria (e.g., Publication Year), as appropriate for 
 * thecategory. GetProductSearchPage does not conduct the actualproduct search. It 
 * only returns data about what you can searchon. Use the data as input to 
 * GetProductSearchResults to conductthe actual search for product information. To 
 * retrieve ProductFinder search criteria (querying against multiple 
 * attributes),use GetProductFinder instead. See the eBay Web Services guide foran 
 * overview of Pre-filled Item Information and details aboutsearching for catalog 
 * products. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetProductSearchPageRequestType.html
 *
 */
class GetProductSearchPageRequestType extends AbstractRequestType
{
	/**
	 * @var string
	 */
	protected $AttributeSystemVersion;
	/**
	 * @var int
	 */
	protected $AttributeSetID;

	/**
	 * @return string
	 */
	function getAttributeSystemVersion()
	{
		return $this->AttributeSystemVersion;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setAttributeSystemVersion($value)
	{
		$this->AttributeSystemVersion = $value;
	}
	/**
	 * @return int
	 * @param integer $index 
	 */
	function getAttributeSetID($index = null)
	{
		if ($index !== null) {
			return $this->AttributeSetID[$index];
		} else {
			return $this->AttributeSetID;
		}
	}
	/**
	 * @return void
	 * @param int $value 
	 * @param  $index 
	 */
	function setAttributeSetID($value, $index = null)
	{
		if ($index !== null) {
			$this->AttributeSetID[$index] = $value;
		} else {
			$this->AttributeSetID = $value;
		}
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function addAttributeSetID($value)
	{
		$this->AttributeSetID[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetProductSearchPageRequestType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'AttributeSystemVersion' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'AttributeSetID' =>
					array(
						'required' => true,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => true,
						'cardinality' => '1..*'
					)
				));
	}
}
?>
