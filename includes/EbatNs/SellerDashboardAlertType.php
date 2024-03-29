<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'SellerDashboardAlertSeverityCodeType.php';
require_once 'EbatNs_ComplexType.php';

/**
 * A message to help the you understand your status as a seller (PowerSeller 
 * status, policy compliance status, etc.). 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SellerDashboardAlertType.html
 *
 */
class SellerDashboardAlertType extends EbatNs_ComplexType
{
	/**
	 * @var SellerDashboardAlertSeverityCodeType
	 */
	protected $Severity;
	/**
	 * @var string
	 */
	protected $Text;

	/**
	 * @return SellerDashboardAlertSeverityCodeType
	 */
	function getSeverity()
	{
		return $this->Severity;
	}
	/**
	 * @return void
	 * @param SellerDashboardAlertSeverityCodeType $value 
	 */
	function setSeverity($value)
	{
		$this->Severity = $value;
	}
	/**
	 * @return string
	 */
	function getText()
	{
		return $this->Text;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setText($value)
	{
		$this->Text = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SellerDashboardAlertType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'Severity' =>
					array(
						'required' => false,
						'type' => 'SellerDashboardAlertSeverityCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Text' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
