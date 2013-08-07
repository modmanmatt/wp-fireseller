<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'SellingManagerEmailLogType.php';
require_once 'AbstractResponseType.php';

/**
 * Returns the log of emails not sent. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetSellingManagerEmailLogResponseType.html
 *
 */
class GetSellingManagerEmailLogResponseType extends AbstractResponseType
{
	/**
	 * @var SellingManagerEmailLogType
	 */
	protected $EmailLog;

	/**
	 * @return SellingManagerEmailLogType
	 * @param integer $index 
	 */
	function getEmailLog($index = null)
	{
		if ($index !== null) {
			return $this->EmailLog[$index];
		} else {
			return $this->EmailLog;
		}
	}
	/**
	 * @return void
	 * @param SellingManagerEmailLogType $value 
	 * @param  $index 
	 */
	function setEmailLog($value, $index = null)
	{
		if ($index !== null) {
			$this->EmailLog[$index] = $value;
		} else {
			$this->EmailLog = $value;
		}
	}
	/**
	 * @return void
	 * @param SellingManagerEmailLogType $value 
	 */
	function addEmailLog($value)
	{
		$this->EmailLog[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetSellingManagerEmailLogResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'EmailLog' =>
					array(
						'required' => false,
						'type' => 'SellingManagerEmailLogType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
