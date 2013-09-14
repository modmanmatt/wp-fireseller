<?php
// autogenerated file 05.05.2008 16:30
// $Id: $
// $Log: $
//
//
require_once 'EbatNsCsSetExt_AttributeSetArrayType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'EbatNsCsSetExt_CharacteristicsSetArrayType.php';
require_once 'EbatNsCsSetExt_GlobalSettingsType.php';

/**
 *  
 *
 *
 */
class EbatNsCsSetExt_AttributeDataType extends EbatNs_ComplexType
{
	/**
	 * @var EbatNsCsSetExt_AttributeSetArrayType
	 */
	protected $Attributes;
	/**
	 * @var EbatNsCsSetExt_CharacteristicsSetArrayType
	 */
	protected $Characteristics;
	/**
	 * @var EbatNsCsSetExt_GlobalSettingsType
	 */
	protected $GlobalSettings;

	/**
	 * @return EbatNsCsSetExt_AttributeSetArrayType
	 * @param integer $index 
	 */
	function getAttributes($index = null)
	{
		if ($index !== null) {
			return $this->Attributes[$index];
		} else {
			return $this->Attributes;
		}
	}
	/**
	 * @return void
	 * @param EbatNsCsSetExt_AttributeSetArrayType $value 
	 * @param  $index 
	 */
	function setAttributes($value, $index = null)
	{
		if ($index !== null) {
			$this->Attributes[$index] = $value;
		} else {
			$this->Attributes = $value;
		}
	}
	/**
	 * @return void
	 * @param EbatNsCsSetExt_AttributeSetArrayType $value 
	 */
	function addAttributes($value)
	{
		$this->Attributes[] = $value;
	}
	/**
	 * @return EbatNsCsSetExt_CharacteristicsSetArrayType
	 * @param integer $index 
	 */
	function getCharacteristics($index = null)
	{
		if ($index !== null) {
			return $this->Characteristics[$index];
		} else {
			return $this->Characteristics;
		}
	}
	/**
	 * @return void
	 * @param EbatNsCsSetExt_CharacteristicsSetArrayType $value 
	 * @param  $index 
	 */
	function setCharacteristics($value, $index = null)
	{
		if ($index !== null) {
			$this->Characteristics[$index] = $value;
		} else {
			$this->Characteristics = $value;
		}
	}
	/**
	 * @return void
	 * @param EbatNsCsSetExt_CharacteristicsSetArrayType $value 
	 */
	function addCharacteristics($value)
	{
		$this->Characteristics[] = $value;
	}
	/**
	 * @return EbatNsCsSetExt_GlobalSettingsType
	 */
	function getGlobalSettings()
	{
		return $this->GlobalSettings;
	}
	/**
	 * @return void
	 * @param EbatNsCsSetExt_GlobalSettingsType $value 
	 */
	function setGlobalSettings($value)
	{
		$this->GlobalSettings = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('EbatNsCsSetExt_AttributeDataType', 'http://www.intradesys.com/Schemas/ebay/AttributeData_Extension.xsd');
		$this->_elements = array_merge($this->_elements,
			array(
				'Attributes' =>
				array(
					'required' => false,
					'type' => 'EbatNsCsSetExt_AttributeSetArrayType',
					'nsURI' => 'http://www.intradesys.com/Schemas/ebay/AttributeData_Extension.xsd',
					'array' => true,
					'cardinality' => '0..*'
				),
				'Characteristics' =>
				array(
					'required' => false,
					'type' => 'EbatNsCsSetExt_CharacteristicsSetArrayType',
					'nsURI' => 'http://www.intradesys.com/Schemas/ebay/AttributeData_Extension.xsd',
					'array' => true,
					'cardinality' => '0..*'
				),
				'GlobalSettings' =>
				array(
					'required' => false,
					'type' => 'EbatNsCsSetExt_GlobalSettingsType',
					'nsURI' => 'http://www.intradesys.com/Schemas/ebay/AttributeData_Extension.xsd',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
