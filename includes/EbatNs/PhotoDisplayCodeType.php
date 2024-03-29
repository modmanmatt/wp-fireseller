<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Specifies the type of image display used in a listing. Some options areonly 
 * available if images are hosted through eBay Picture Services (EPS).Cannot be 
 * used with Listing Designer layouts (specified in Item.ListingDesigner). 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PhotoDisplayCodeType.html
 *
 * @property string None
 * @property string SlideShow
 * @property string SuperSize
 * @property string PicturePack
 * @property string SiteHostedPictureShow
 * @property string VendorHostedPictureShow
 * @property string SuperSizePictureShow
 * @property string CustomCode
 */
class PhotoDisplayCodeType extends EbatNs_FacetType
{
	const CodeType_None = 'None';
	const CodeType_SlideShow = 'SlideShow';
	const CodeType_SuperSize = 'SuperSize';
	const CodeType_PicturePack = 'PicturePack';
	const CodeType_SiteHostedPictureShow = 'SiteHostedPictureShow';
	const CodeType_VendorHostedPictureShow = 'VendorHostedPictureShow';
	const CodeType_SuperSizePictureShow = 'SuperSizePictureShow';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('PhotoDisplayCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_PhotoDisplayCodeType = new PhotoDisplayCodeType();

?>
