<?php
// autogenerated file 05.05.2008 16:30
// $Id: $
// $Log: $
//
//
require_once 'EbatNsCsSetExt_AttributeArrayType.php';
require_once 'EbatNs_ComplexType.php';

/**
 *  
 *
 *
 */
class EbatNsCsSetExt_CharacteristicsListType extends EbatNs_ComplexType
{
	/**
	 * @var EbatNsCsSetExt_AttributeArrayType
	 */
	protected $Initial;
	/**
	 * @var EbatNsCsSetExt_AttributeArrayType
	 */
	protected $Conditional;
	/**
	 * @var EbatNsCsSetExt_AttributeArrayType
	 */
	protected $Other;

	/**
	 * @return EbatNsCsSetExt_AttributeArrayType
	 */
	function getInitial()
	{
		return $this->Initial;
	}
	/**
	 * @return void
	 * @param EbatNsCsSetExt_AttributeArrayType $value 
	 */
	function setInitial($value)
	{
		$this->Initial = $value;
	}
	/**
	 * @return EbatNsCsSetExt_AttributeArrayType
	 */
	function getConditional()
	{
		return $this->Conditional;
	}
	/**
	 * @return void
	 * @param EbatNsCsSetExt_AttributeArrayType $value 
	 */
	function setConditional($value)
	{
		$this->Conditional = $value;
	}
	/**
	 * @return EbatNsCsSetExt_AttributeArrayType
	 */
	function getOther()
	{
		return $this->Other;
	}
	/**
	 * @return void
	 * @param EbatNsCsSetExt_AttributeArrayType $value 
	 */
	function setOther($value)
	{
		$this->Other = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('EbatNsCsSetExt_CharacteristicsListType', 'http://www.intradesys.com/Schemas/ebay/AttributeData_Extension.xsd');
		$this->_elements = array_merge($this->_elements,
			array(
				'Initial' =>
				array(
					'required' => true,
					'type' => 'EbatNsCsSetExt_AttributeArrayType',
					'nsURI' => 'http://www.intradesys.com/Schemas/ebay/AttributeData_Extension.xsd',
					'array' => false,
					'cardinality' => '1..1'
				),
				'Conditional' =>
				array(
					'required' => true,
					'type' => 'EbatNsCsSetExt_AttributeArrayType',
					'nsURI' => 'http://www.intradesys.com/Schemas/ebay/AttributeData_Extension.xsd',
					'array' => false,
					'cardinality' => '1..1'
				),
				'Other' =>
				array(
					'required' => true,
					'type' => 'EbatNsCsSetExt_AttributeArrayType',
					'nsURI' => 'http://www.intradesys.com/Schemas/ebay/AttributeData_Extension.xsd',
					'array' => false,
					'cardinality' => '1..1'
				)
			));

	}
}
?>
