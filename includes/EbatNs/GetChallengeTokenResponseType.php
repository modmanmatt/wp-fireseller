<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
//
require_once 'AbstractResponseType.php';

/**
 * Response to GetChallengeToken request. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/GetChallengeTokenResponseType.html
 *
 */
class GetChallengeTokenResponseType extends AbstractResponseType
{
	/**
	 * @var string
	 */
	protected $ChallengeToken;
	/**
	 * @var string
	 */
	protected $ImageChallengeURL;
	/**
	 * @var string
	 */
	protected $AudioChallengeURL;

	/**
	 * @return string
	 */
	function getChallengeToken()
	{
		return $this->ChallengeToken;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setChallengeToken($value)
	{
		$this->ChallengeToken = $value;
	}
	/**
	 * @return string
	 */
	function getImageChallengeURL()
	{
		return $this->ImageChallengeURL;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setImageChallengeURL($value)
	{
		$this->ImageChallengeURL = $value;
	}
	/**
	 * @return string
	 */
	function getAudioChallengeURL()
	{
		return $this->AudioChallengeURL;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setAudioChallengeURL($value)
	{
		$this->AudioChallengeURL = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('GetChallengeTokenResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ChallengeToken' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ImageChallengeURL' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'AudioChallengeURL' =>
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
