<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * The designations for the different types of information that you want returned 
 * byGeteBayDetails. The details are returned for the specified eBay site. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DetailNameCodeType.html
 *
 * @property string CountryDetails
 * @property string CurrencyDetails
 * @property string PaymentOptionDetails
 * @property string RegionDetails
 * @property string ShippingLocationDetails
 * @property string ShippingServiceDetails
 * @property string SiteDetails
 * @property string TaxJurisdiction
 * @property string URLDetails
 * @property string TimeZoneDetails
 * @property string RegionOfOriginDetails
 * @property string DispatchTimeMaxDetails
 * @property string ItemSpecificDetails
 * @property string UnitOfMeasurementDetails
 * @property string ShippingPackageDetails
 * @property string CustomCode
 * @property string ShippingCarrierDetails
 * @property string ListingStartPriceDetails
 * @property string ReturnPolicyDetails
 * @property string BuyerRequirementDetails
 * @property string ListingFeatureDetails
 * @property string VariationDetails
 * @property string ExcludeShippingLocationDetails
 * @property string RecoupmentPolicyDetails
 * @property string ShippingCategoryDetails
 */
class DetailNameCodeType extends EbatNs_FacetType
{
	const CodeType_CountryDetails = 'CountryDetails';
	const CodeType_CurrencyDetails = 'CurrencyDetails';
	const CodeType_PaymentOptionDetails = 'PaymentOptionDetails';
	const CodeType_RegionDetails = 'RegionDetails';
	const CodeType_ShippingLocationDetails = 'ShippingLocationDetails';
	const CodeType_ShippingServiceDetails = 'ShippingServiceDetails';
	const CodeType_SiteDetails = 'SiteDetails';
	const CodeType_TaxJurisdiction = 'TaxJurisdiction';
	const CodeType_URLDetails = 'URLDetails';
	const CodeType_TimeZoneDetails = 'TimeZoneDetails';
	const CodeType_RegionOfOriginDetails = 'RegionOfOriginDetails';
	const CodeType_DispatchTimeMaxDetails = 'DispatchTimeMaxDetails';
	const CodeType_ItemSpecificDetails = 'ItemSpecificDetails';
	const CodeType_UnitOfMeasurementDetails = 'UnitOfMeasurementDetails';
	const CodeType_ShippingPackageDetails = 'ShippingPackageDetails';
	const CodeType_CustomCode = 'CustomCode';
	const CodeType_ShippingCarrierDetails = 'ShippingCarrierDetails';
	const CodeType_ListingStartPriceDetails = 'ListingStartPriceDetails';
	const CodeType_ReturnPolicyDetails = 'ReturnPolicyDetails';
	const CodeType_BuyerRequirementDetails = 'BuyerRequirementDetails';
	const CodeType_ListingFeatureDetails = 'ListingFeatureDetails';
	const CodeType_VariationDetails = 'VariationDetails';
	const CodeType_ExcludeShippingLocationDetails = 'ExcludeShippingLocationDetails';
	const CodeType_RecoupmentPolicyDetails = 'RecoupmentPolicyDetails';
	const CodeType_ShippingCategoryDetails = 'ShippingCategoryDetails';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('DetailNameCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_DetailNameCodeType = new DetailNameCodeType();

?>
