<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'StoreColorSchemeType.php';

/**
 * Store theme. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/StoreThemeType.html
 *
 */
class StoreThemeType extends EbatNs_ComplexType
{
	/**
	 * @var int
	 */
	protected $ThemeID;
	/**
	 * @var string
	 */
	protected $Name;
	/**
	 * @var StoreColorSchemeType
	 */
	protected $ColorScheme;

	/**
	 * @return int
	 */
	function getThemeID()
	{
		return $this->ThemeID;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setThemeID($value)
	{
		$this->ThemeID = $value;
	}
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
	 * @return StoreColorSchemeType
	 */
	function getColorScheme()
	{
		return $this->ColorScheme;
	}
	/**
	 * @return void
	 * @param StoreColorSchemeType $value 
	 */
	function setColorScheme($value)
	{
		$this->ColorScheme = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('StoreThemeType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ThemeID' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Name' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ColorScheme' =>
					array(
						'required' => false,
						'type' => 'StoreColorSchemeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
