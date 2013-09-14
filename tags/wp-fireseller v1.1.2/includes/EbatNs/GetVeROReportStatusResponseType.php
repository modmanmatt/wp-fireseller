<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'VeROReportPacketStatusCodeType.php';
require_once 'VeROReportedItemDetailsType.php';
require_once 'AbstractResponseType.php';
require_once 'PaginationResultType.php';

/**
 * Contains status information for items reported by the VeRO Program member. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetVeROReportStatusResponseType.html
 *
 */
class GetVeROReportStatusResponseType extends AbstractResponseType
{
	/**
	 * @var PaginationResultType
	 */
	protected $PaginationResult;
	/**
	 * @var boolean
	 */
	protected $HasMoreItems;
	/**
	 * @var int
	 */
	protected $ItemsPerPage;
	/**
	 * @var int
	 */
	protected $PageNumber;
	/**
	 * @var long
	 */
	protected $VeROReportPacketID;
	/**
	 * @var VeROReportPacketStatusCodeType
	 */
	protected $VeROReportPacketStatus;
	/**
	 * @var VeROReportedItemDetailsType
	 */
	protected $ReportedItemDetails;

	/**
	 * @return PaginationResultType
	 */
	function getPaginationResult()
	{
		return $this->PaginationResult;
	}
	/**
	 * @return void
	 * @param PaginationResultType $value 
	 */
	function setPaginationResult($value)
	{
		$this->PaginationResult = $value;
	}
	/**
	 * @return boolean
	 */
	function getHasMoreItems()
	{
		return $this->HasMoreItems;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setHasMoreItems($value)
	{
		$this->HasMoreItems = $value;
	}
	/**
	 * @return int
	 */
	function getItemsPerPage()
	{
		return $this->ItemsPerPage;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setItemsPerPage($value)
	{
		$this->ItemsPerPage = $value;
	}
	/**
	 * @return int
	 */
	function getPageNumber()
	{
		return $this->PageNumber;
	}
	/**
	 * @return void
	 * @param int $value 
	 */
	function setPageNumber($value)
	{
		$this->PageNumber = $value;
	}
	/**
	 * @return long
	 */
	function getVeROReportPacketID()
	{
		return $this->VeROReportPacketID;
	}
	/**
	 * @return void
	 * @param long $value 
	 */
	function setVeROReportPacketID($value)
	{
		$this->VeROReportPacketID = $value;
	}
	/**
	 * @return VeROReportPacketStatusCodeType
	 */
	function getVeROReportPacketStatus()
	{
		return $this->VeROReportPacketStatus;
	}
	/**
	 * @return void
	 * @param VeROReportPacketStatusCodeType $value 
	 */
	function setVeROReportPacketStatus($value)
	{
		$this->VeROReportPacketStatus = $value;
	}
	/**
	 * @return VeROReportedItemDetailsType
	 */
	function getReportedItemDetails()
	{
		return $this->ReportedItemDetails;
	}
	/**
	 * @return void
	 * @param VeROReportedItemDetailsType $value 
	 */
	function setReportedItemDetails($value)
	{
		$this->ReportedItemDetails = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetVeROReportStatusResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'PaginationResult' =>
					array(
						'required' => false,
						'type' => 'PaginationResultType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'HasMoreItems' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ItemsPerPage' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PageNumber' =>
					array(
						'required' => false,
						'type' => 'int',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'VeROReportPacketID' =>
					array(
						'required' => false,
						'type' => 'long',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'VeROReportPacketStatus' =>
					array(
						'required' => false,
						'type' => 'VeROReportPacketStatusCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ReportedItemDetails' =>
					array(
						'required' => false,
						'type' => 'VeROReportedItemDetailsType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
