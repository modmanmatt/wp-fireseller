<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'SellingManagerSoldOrderType.php';
require_once 'AbstractResponseType.php';

/**
 * Response to a GetSellingManagerSaleRecord call. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetSellingManagerSaleRecordResponseType.html
 *
 */
class GetSellingManagerSaleRecordResponseType extends AbstractResponseType
{
	/**
	 * @var SellingManagerSoldOrderType
	 */
	protected $SellingManagerSoldOrder;

	/**
	 * @return SellingManagerSoldOrderType
	 */
	function getSellingManagerSoldOrder()
	{
		return $this->SellingManagerSoldOrder;
	}
	/**
	 * @return void
	 * @param SellingManagerSoldOrderType $value 
	 */
	function setSellingManagerSoldOrder($value)
	{
		$this->SellingManagerSoldOrder = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetSellingManagerSaleRecordResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'SellingManagerSoldOrder' =>
					array(
						'required' => false,
						'type' => 'SellingManagerSoldOrderType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
