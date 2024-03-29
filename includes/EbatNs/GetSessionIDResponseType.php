<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'AbstractResponseType.php';

/**
 * Contains the generated SessionID, which is a unique identifier for 
 * authenticating data entry during the process that creates a user token. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetSessionIDResponseType.html
 *
 */
class GetSessionIDResponseType extends AbstractResponseType
{
	/**
	 * @var string
	 */
	protected $SessionID;

	/**
	 * @return string
	 */
	function getSessionID()
	{
		return $this->SessionID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setSessionID($value)
	{
		$this->SessionID = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetSessionIDResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'SessionID' =>
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
