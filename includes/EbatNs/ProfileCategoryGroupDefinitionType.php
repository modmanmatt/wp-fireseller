<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * Type defining the <b>PaymentProfileCategoryGroup</b>, 
 * <b>ReturnPolicyProfileCategoryGroup</b>, and 
 * <b>ShippingProfileCategoryGroup</b>fields, which are all returned in the 
 * <b>GetCategoryFeature</b> response if theseBusiness Policies profile types apply 
 * to the category. Each of these fields is returned as anempty element. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ProfileCategoryGroupDefinitionType.html
 *
 */
class ProfileCategoryGroupDefinitionType extends EbatNs_ComplexType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ProfileCategoryGroupDefinitionType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__])) {
			self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()], array());
		}
	}
}
?>
