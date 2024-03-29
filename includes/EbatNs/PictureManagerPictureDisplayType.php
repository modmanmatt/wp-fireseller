<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'PictureManagerPictureDisplayTypeCodeType.php';

/**
 * Defines various styles of picture display for images in Picture Manager albums. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PictureManagerPictureDisplayType.html
 *
 */
class PictureManagerPictureDisplayType extends EbatNs_ComplexType
{
	/**
	 * @var PictureManagerPictureDisplayTypeCodeType
	 */
	protected $DisplayType;
	/**
	 * @var anyURI
	 */
	protected $URL;
	/**
	 * @var int
	 */
	protected $Size;
	/**
	 * @var int
	 */
	protected $Height;
	/**
	 * @var int
	 */
	protected $Width;

	/**
	 * @return PictureManagerPictureDisplayTypeCodeType
	 */
	function getDisplayType()
	{
		return $this->DisplayType;
	}
	/**
	 * @return void
	 * @param PictureManagerPictureDisplayTypeCodeType $value 
	 */
	function setDisplayType($value)
	{
		$this->DisplayType = $value;
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
	 * @return int
	 */
	function getSize()
	{
		return $this->Size;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setSize($value)
	{
		$this->Size = $value;
	}
	/**
	 * @return int
	 */
	function getHeight()
	{
		return $this->Height;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setHeight($value)
	{
		$this->Height = $value;
	}
	/**
	 * @return int
	 */
	function getWidth()
	{
		return $this->Width;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setWidth($value)
	{
		$this->Width = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('PictureManagerPictureDisplayType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'DisplayType' =>
					array(
						'required' => false,
						'type' => 'PictureManagerPictureDisplayTypeCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
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
					'Size' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Height' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Width' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
