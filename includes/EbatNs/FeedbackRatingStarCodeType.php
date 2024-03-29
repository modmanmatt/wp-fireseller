<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * The color of a feedback score star visually denotes therange in which the 
 * member's summary feedback score falls. The scoreis the net positive feedback 
 * minus the net negative feedback leftfor the member. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/FeedbackRatingStarCodeType.html
 *
 * @property string None
 * @property string Yellow
 * @property string Blue
 * @property string Turquoise
 * @property string Purple
 * @property string Red
 * @property string Green
 * @property string YellowShooting
 * @property string TurquoiseShooting
 * @property string PurpleShooting
 * @property string RedShooting
 * @property string GreenShooting
 * @property string SilverShooting
 * @property string CustomCode
 */
class FeedbackRatingStarCodeType extends EbatNs_FacetType
{
	const CodeType_None = 'None';
	const CodeType_Yellow = 'Yellow';
	const CodeType_Blue = 'Blue';
	const CodeType_Turquoise = 'Turquoise';
	const CodeType_Purple = 'Purple';
	const CodeType_Red = 'Red';
	const CodeType_Green = 'Green';
	const CodeType_YellowShooting = 'YellowShooting';
	const CodeType_TurquoiseShooting = 'TurquoiseShooting';
	const CodeType_PurpleShooting = 'PurpleShooting';
	const CodeType_RedShooting = 'RedShooting';
	const CodeType_GreenShooting = 'GreenShooting';
	const CodeType_SilverShooting = 'SilverShooting';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('FeedbackRatingStarCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_FeedbackRatingStarCodeType = new FeedbackRatingStarCodeType();

?>
