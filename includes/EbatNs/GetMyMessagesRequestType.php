<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'MyMessagesAlertIDArrayType.php';
require_once 'PaginationType.php';
require_once 'MyMessagesExternalMessageIDArrayType.php';
require_once 'MyMessagesMessageIDArrayType.php';
require_once 'AbstractRequestType.php';

/**
 * Retrieves information about the messages sent to a given user. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetMyMessagesRequestType.html
 *
 */
class GetMyMessagesRequestType extends AbstractRequestType
{
	/**
	 * @var MyMessagesAlertIDArrayType
	 */
	protected $AlertIDs;
	/**
	 * @var MyMessagesMessageIDArrayType
	 */
	protected $MessageIDs;
	/**
	 * @var long
	 */
	protected $FolderID;
	/**
	 * @var dateTime
	 */
	protected $StartTime;
	/**
	 * @var dateTime
	 */
	protected $EndTime;
	/**
	 * @var MyMessagesExternalMessageIDArrayType
	 */
	protected $ExternalMessageIDs;
	/**
	 * @var PaginationType
	 */
	protected $Pagination;
	/**
	 * @var boolean
	 */
	protected $IncludeHighPriorityMessageOnly;

	/**
	 * @return MyMessagesAlertIDArrayType
	 */
	function getAlertIDs()
	{
		return $this->AlertIDs;
	}
	/**
	 * @return void
	 * @param MyMessagesAlertIDArrayType $value 
	 */
	function setAlertIDs($value)
	{
		$this->AlertIDs = $value;
	}
	/**
	 * @return MyMessagesMessageIDArrayType
	 */
	function getMessageIDs()
	{
		return $this->MessageIDs;
	}
	/**
	 * @return void
	 * @param MyMessagesMessageIDArrayType $value 
	 */
	function setMessageIDs($value)
	{
		$this->MessageIDs = $value;
	}
	/**
	 * @return long
	 */
	function getFolderID()
	{
		return $this->FolderID;
	}
	/**
	 * @return void
	 * @param long $value 
	 */
	function setFolderID($value)
	{
		$this->FolderID = $value;
	}
	/**
	 * @return dateTime
	 */
	function getStartTime()
	{
		return $this->StartTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setStartTime($value)
	{
		$this->StartTime = $value;
	}
	/**
	 * @return dateTime
	 */
	function getEndTime()
	{
		return $this->EndTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setEndTime($value)
	{
		$this->EndTime = $value;
	}
	/**
	 * @return MyMessagesExternalMessageIDArrayType
	 */
	function getExternalMessageIDs()
	{
		return $this->ExternalMessageIDs;
	}
	/**
	 * @return void
	 * @param MyMessagesExternalMessageIDArrayType $value 
	 */
	function setExternalMessageIDs($value)
	{
		$this->ExternalMessageIDs = $value;
	}
	/**
	 * @return PaginationType
	 */
	function getPagination()
	{
		return $this->Pagination;
	}
	/**
	 * @return void
	 * @param PaginationType $value 
	 */
	function setPagination($value)
	{
		$this->Pagination = $value;
	}
	/**
	 * @return boolean
	 */
	function getIncludeHighPriorityMessageOnly()
	{
		return $this->IncludeHighPriorityMessageOnly;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setIncludeHighPriorityMessageOnly($value)
	{
		$this->IncludeHighPriorityMessageOnly = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetMyMessagesRequestType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'AlertIDs' =>
					array(
						'required' => false,
						'type' => 'MyMessagesAlertIDArrayType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'MessageIDs' =>
					array(
						'required' => false,
						'type' => 'MyMessagesMessageIDArrayType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'FolderID' =>
					array(
						'required' => false,
						'type' => 'long',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'StartTime' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'EndTime' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ExternalMessageIDs' =>
					array(
						'required' => false,
						'type' => 'MyMessagesExternalMessageIDArrayType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Pagination' =>
					array(
						'required' => false,
						'type' => 'PaginationType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'IncludeHighPriorityMessageOnly' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
