<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'GalleryTypeCodeType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'PictureSourceCodeType.php';
require_once 'PhotoDisplayCodeType.php';
require_once 'GalleryStatusCodeType.php';

/**
 * Contains the data for a picture associated with an item.Replaces the deprecated 
 * SiteHostedPicture andVendorHostedPicture. Not applicable to Half.com. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PictureDetailsType.html
 *
 */
class PictureDetailsType extends EbatNs_ComplexType
{
	/**
	 * @var GalleryTypeCodeType
	 */
	protected $GalleryType;
	/**
	 * @var anyURI
	 */
	protected $GalleryURL;
	/**
	 * @var PhotoDisplayCodeType
	 */
	protected $PhotoDisplay;
	/**
	 * @var anyURI
	 */
	protected $PictureURL;
	/**
	 * @var PictureSourceCodeType
	 */
	protected $PictureSource;
	/**
	 * @var token
	 */
	protected $GalleryDuration;
	/**
	 * @var GalleryStatusCodeType
	 */
	protected $GalleryStatus;
	/**
	 * @var string
	 */
	protected $GalleryErrorInfo;
	/**
	 * @var anyURI
	 */
	protected $ExternalPictureURL;

	/**
	 * @return GalleryTypeCodeType
	 */
	function getGalleryType()
	{
		return $this->GalleryType;
	}
	/**
	 * @return void
	 * @param GalleryTypeCodeType $value 
	 */
	function setGalleryType($value)
	{
		$this->GalleryType = $value;
	}
	/**
	 * @return anyURI
	 */
	function getGalleryURL()
	{
		return $this->GalleryURL;
	}
	/**
	 * @return void
	 * @param anyURI $value 
	 */
	function setGalleryURL($value)
	{
		$this->GalleryURL = $value;
	}
	/**
	 * @return PhotoDisplayCodeType
	 */
	function getPhotoDisplay()
	{
		return $this->PhotoDisplay;
	}
	/**
	 * @return void
	 * @param PhotoDisplayCodeType $value 
	 */
	function setPhotoDisplay($value)
	{
		$this->PhotoDisplay = $value;
	}
	/**
	 * @return anyURI
	 * @param integer $index 
	 */
	function getPictureURL($index = null)
	{
		if ($index !== null) {
			return $this->PictureURL[$index];
		} else {
			return $this->PictureURL;
		}
	}
	/**
	 * @return void
	 * @param anyURI $value 
	 * @param  $index 
	 */
	function setPictureURL($value, $index = null)
	{
		if ($index !== null) {
			$this->PictureURL[$index] = $value;
		} else {
			$this->PictureURL = $value;
		}
	}
	/**
	 * @return void
	 * @param anyURI $value 
	 */
	function addPictureURL($value)
	{
		$this->PictureURL[] = $value;
	}
	/**
	 * @return PictureSourceCodeType
	 */
	function getPictureSource()
	{
		return $this->PictureSource;
	}
	/**
	 * @return void
	 * @param PictureSourceCodeType $value 
	 */
	function setPictureSource($value)
	{
		$this->PictureSource = $value;
	}
	/**
	 * @return token
	 */
	function getGalleryDuration()
	{
		return $this->GalleryDuration;
	}
	/**
	 * @return void
	 * @param token $value 
	 */
	function setGalleryDuration($value)
	{
		$this->GalleryDuration = $value;
	}
	/**
	 * @return GalleryStatusCodeType
	 */
	function getGalleryStatus()
	{
		return $this->GalleryStatus;
	}
	/**
	 * @return void
	 * @param GalleryStatusCodeType $value 
	 */
	function setGalleryStatus($value)
	{
		$this->GalleryStatus = $value;
	}
	/**
	 * @return string
	 */
	function getGalleryErrorInfo()
	{
		return $this->GalleryErrorInfo;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setGalleryErrorInfo($value)
	{
		$this->GalleryErrorInfo = $value;
	}
	/**
	 * @return anyURI
	 * @param integer $index 
	 */
	function getExternalPictureURL($index = null)
	{
		if ($index !== null) {
			return $this->ExternalPictureURL[$index];
		} else {
			return $this->ExternalPictureURL;
		}
	}
	/**
	 * @return void
	 * @param anyURI $value 
	 * @param  $index 
	 */
	function setExternalPictureURL($value, $index = null)
	{
		if ($index !== null) {
			$this->ExternalPictureURL[$index] = $value;
		} else {
			$this->ExternalPictureURL = $value;
		}
	}
	/**
	 * @return void
	 * @param anyURI $value 
	 */
	function addExternalPictureURL($value)
	{
		$this->ExternalPictureURL[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('PictureDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'GalleryType' =>
					array(
						'required' => false,
						'type' => 'GalleryTypeCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'GalleryURL' =>
					array(
						'required' => false,
						'type' => 'anyURI',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PhotoDisplay' =>
					array(
						'required' => false,
						'type' => 'PhotoDisplayCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PictureURL' =>
					array(
						'required' => false,
						'type' => 'anyURI',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => true,
						'cardinality' => '0..*'
					),
					'PictureSource' =>
					array(
						'required' => false,
						'type' => 'PictureSourceCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'GalleryDuration' =>
					array(
						'required' => false,
						'type' => 'token',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'GalleryStatus' =>
					array(
						'required' => false,
						'type' => 'GalleryStatusCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'GalleryErrorInfo' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ExternalPictureURL' =>
					array(
						'required' => false,
						'type' => 'anyURI',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
