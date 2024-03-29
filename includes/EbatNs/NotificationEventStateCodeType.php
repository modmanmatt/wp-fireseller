<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Valid notification status codes 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/NotificationEventStateCodeType.html
 *
 * @property string New
 * @property string Failed
 * @property string MarkedDown
 * @property string Pending
 * @property string FailedPending
 * @property string MarkedDownPending
 * @property string Delivered
 * @property string Undeliverable
 * @property string Rejected
 * @property string Canceled
 * @property string CustomCode
 */
class NotificationEventStateCodeType extends EbatNs_FacetType
{
	const CodeType_New = 'New';
	const CodeType_Failed = 'Failed';
	const CodeType_MarkedDown = 'MarkedDown';
	const CodeType_Pending = 'Pending';
	const CodeType_FailedPending = 'FailedPending';
	const CodeType_MarkedDownPending = 'MarkedDownPending';
	const CodeType_Delivered = 'Delivered';
	const CodeType_Undeliverable = 'Undeliverable';
	const CodeType_Rejected = 'Rejected';
	const CodeType_Canceled = 'Canceled';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('NotificationEventStateCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_NotificationEventStateCodeType = new NotificationEventStateCodeType();

?>
