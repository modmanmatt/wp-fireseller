<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'ListingTipType.php';
require_once 'EbatNs_ComplexType.php';

/**
 * (out) Contains a list of tips on improving a listing's details, if any. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ListingTipArrayType.html
 *
 */
class ListingTipArrayType extends EbatNs_ComplexType
{
	/**
	 * @var ListingTipType
	 */
	protected $ListingTip;

	/**
	 * @return ListingTipType
	 * @param integer $index 
	 */
	function getListingTip($index = null)
	{
		if ($index !== null) {
			return $this->ListingTip[$index];
		} else {
			return $this->ListingTip;
		}
	}
	/**
	 * @return void
	 * @param ListingTipType $value 
	 * @param  $index 
	 */
	function setListingTip($value, $index = null)
	{
		if ($index !== null) {
			$this->ListingTip[$index] = $value;
		} else {
			$this->ListingTip = $value;
		}
	}
	/**
	 * @return void
	 * @param ListingTipType $value 
	 */
	function addListingTip($value)
	{
		$this->ListingTip[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ListingTipArrayType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ListingTip' =>
					array(
						'required' => false,
						'type' => 'ListingTipType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
