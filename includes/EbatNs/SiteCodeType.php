<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * eBay sites (by the country in which each resides) on which a user is 
 * registeredand on which items can be listed. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SiteCodeType.html
 *
 * @property string US
 * @property string Canada
 * @property string UK
 * @property string Australia
 * @property string Austria
 * @property string Belgium_French
 * @property string France
 * @property string Germany
 * @property string Italy
 * @property string Belgium_Dutch
 * @property string Netherlands
 * @property string Spain
 * @property string Switzerland
 * @property string Taiwan
 * @property string eBayMotors
 * @property string HongKong
 * @property string Singapore
 * @property string India
 * @property string China
 * @property string Ireland
 * @property string Malaysia
 * @property string Philippines
 * @property string Poland
 * @property string Sweden
 * @property string CustomCode
 * @property string CanadaFrench
 */
class SiteCodeType extends EbatNs_FacetType
{
	const CodeType_US = 'US';
	const CodeType_Canada = 'Canada';
	const CodeType_UK = 'UK';
	const CodeType_Australia = 'Australia';
	const CodeType_Austria = 'Austria';
	const CodeType_Belgium_French = 'Belgium_French';
	const CodeType_France = 'France';
	const CodeType_Germany = 'Germany';
	const CodeType_Italy = 'Italy';
	const CodeType_Belgium_Dutch = 'Belgium_Dutch';
	const CodeType_Netherlands = 'Netherlands';
	const CodeType_Spain = 'Spain';
	const CodeType_Switzerland = 'Switzerland';
	const CodeType_Taiwan = 'Taiwan';
	const CodeType_eBayMotors = 'eBayMotors';
	const CodeType_HongKong = 'HongKong';
	const CodeType_Singapore = 'Singapore';
	const CodeType_India = 'India';
	const CodeType_China = 'China';
	const CodeType_Ireland = 'Ireland';
	const CodeType_Malaysia = 'Malaysia';
	const CodeType_Philippines = 'Philippines';
	const CodeType_Poland = 'Poland';
	const CodeType_Sweden = 'Sweden';
	const CodeType_CustomCode = 'CustomCode';
	const CodeType_CanadaFrench = 'CanadaFrench';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SiteCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SiteCodeType = new SiteCodeType();

?>
