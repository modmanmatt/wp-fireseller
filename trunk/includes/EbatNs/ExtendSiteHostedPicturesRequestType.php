<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'AbstractRequestType.php';

/**
 * This restricted call gives approved sellers the ability to extend the default 
 * andongoing lifetime of pictures uploaded to eBay. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ExtendSiteHostedPicturesRequestType.html
 *
 */
class ExtendSiteHostedPicturesRequestType extends AbstractRequestType
{
	/**
	 * @var anyURI
	 */
	protected $PictureURL;
	/**
	 * @var int
	 */
	protected $ExtensionInDays;

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
	 * @return int
	 */
	function getExtensionInDays()
	{
		return $this->ExtensionInDays;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setExtensionInDays($value)
	{
		$this->ExtensionInDays = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ExtendSiteHostedPicturesRequestType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'PictureURL' =>
					array(
						'required' => false,
						'type' => 'anyURI',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => true,
						'cardinality' => '0..*'
					),
					'ExtensionInDays' =>
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
