<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'StoreLogoType.php';

/**
 * Set of Store logos. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/StoreLogoArrayType.html
 *
 */
class StoreLogoArrayType extends EbatNs_ComplexType
{
	/**
	 * @var StoreLogoType
	 */
	protected $Logo;

	/**
	 * @return StoreLogoType
	 * @param integer $index 
	 */
	function getLogo($index = null)
	{
		if ($index !== null) {
			return $this->Logo[$index];
		} else {
			return $this->Logo;
		}
	}
	/**
	 * @return void
	 * @param StoreLogoType $value 
	 * @param  $index 
	 */
	function setLogo($value, $index = null)
	{
		if ($index !== null) {
			$this->Logo[$index] = $value;
		} else {
			$this->Logo = $value;
		}
	}
	/**
	 * @return void
	 * @param StoreLogoType $value 
	 */
	function addLogo($value)
	{
		$this->Logo[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('StoreLogoArrayType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Logo' =>
					array(
						'required' => false,
						'type' => 'StoreLogoType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
