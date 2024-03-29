<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'MyeBayFavoriteSearchType.php';

/**
 * A list of favorite searches a user has saved on the My eBay page. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/MyeBayFavoriteSearchListType.html
 *
 */
class MyeBayFavoriteSearchListType extends EbatNs_ComplexType
{
	/**
	 * @var int
	 */
	protected $TotalAvailable;
	/**
	 * @var MyeBayFavoriteSearchType
	 */
	protected $FavoriteSearch;

	/**
	 * @return int
	 */
	function getTotalAvailable()
	{
		return $this->TotalAvailable;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setTotalAvailable($value)
	{
		$this->TotalAvailable = $value;
	}
	/**
	 * @return MyeBayFavoriteSearchType
	 * @param integer $index 
	 */
	function getFavoriteSearch($index = null)
	{
		if ($index !== null) {
			return $this->FavoriteSearch[$index];
		} else {
			return $this->FavoriteSearch;
		}
	}
	/**
	 * @return void
	 * @param MyeBayFavoriteSearchType $value 
	 * @param  $index 
	 */
	function setFavoriteSearch($value, $index = null)
	{
		if ($index !== null) {
			$this->FavoriteSearch[$index] = $value;
		} else {
			$this->FavoriteSearch = $value;
		}
	}
	/**
	 * @return void
	 * @param MyeBayFavoriteSearchType $value 
	 */
	function addFavoriteSearch($value)
	{
		$this->FavoriteSearch[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('MyeBayFavoriteSearchListType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'TotalAvailable' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'FavoriteSearch' =>
					array(
						'required' => false,
						'type' => 'MyeBayFavoriteSearchType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
