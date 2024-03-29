<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'TopRatedProgramCodeType.php';

/**
 * Container for top-rated seller program information. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/TopRatedSellerDetailsType.html
 *
 */
class TopRatedSellerDetailsType extends EbatNs_ComplexType
{
	/**
	 * @var TopRatedProgramCodeType
	 */
	protected $TopRatedProgram;

	/**
	 * @return TopRatedProgramCodeType
	 * @param integer $index 
	 */
	function getTopRatedProgram($index = null)
	{
		if ($index !== null) {
			return $this->TopRatedProgram[$index];
		} else {
			return $this->TopRatedProgram;
		}
	}
	/**
	 * @return void
	 * @param TopRatedProgramCodeType $value 
	 * @param  $index 
	 */
	function setTopRatedProgram($value, $index = null)
	{
		if ($index !== null) {
			$this->TopRatedProgram[$index] = $value;
		} else {
			$this->TopRatedProgram = $value;
		}
	}
	/**
	 * @return void
	 * @param TopRatedProgramCodeType $value 
	 */
	function addTopRatedProgram($value)
	{
		$this->TopRatedProgram[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('TopRatedSellerDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'TopRatedProgram' =>
					array(
						'required' => false,
						'type' => 'TopRatedProgramCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
