<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * These codes indicate the current state or status of a an eBayuser account. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/UserStatusCodeType.html
 *
 * @property string Unknown
 * @property string Suspended
 * @property string Confirmed
 * @property string Unconfirmed
 * @property string Ghost
 * @property string InMaintenance
 * @property string Deleted
 * @property string CreditCardVerify
 * @property string AccountOnHold
 * @property string Merged
 * @property string RegistrationCodeMailOut
 * @property string TermPending
 * @property string UnconfirmedHalfOptIn
 * @property string CreditCardVerifyHalfOptIn
 * @property string UnconfirmedPassport
 * @property string CreditCardVerifyPassport
 * @property string UnconfirmedExpress
 * @property string Guest
 * @property string CustomCode
 */
class UserStatusCodeType extends EbatNs_FacetType
{
	const CodeType_Unknown = 'Unknown';
	const CodeType_Suspended = 'Suspended';
	const CodeType_Confirmed = 'Confirmed';
	const CodeType_Unconfirmed = 'Unconfirmed';
	const CodeType_Ghost = 'Ghost';
	const CodeType_InMaintenance = 'InMaintenance';
	const CodeType_Deleted = 'Deleted';
	const CodeType_CreditCardVerify = 'CreditCardVerify';
	const CodeType_AccountOnHold = 'AccountOnHold';
	const CodeType_Merged = 'Merged';
	const CodeType_RegistrationCodeMailOut = 'RegistrationCodeMailOut';
	const CodeType_TermPending = 'TermPending';
	const CodeType_UnconfirmedHalfOptIn = 'UnconfirmedHalfOptIn';
	const CodeType_CreditCardVerifyHalfOptIn = 'CreditCardVerifyHalfOptIn';
	const CodeType_UnconfirmedPassport = 'UnconfirmedPassport';
	const CodeType_CreditCardVerifyPassport = 'CreditCardVerifyPassport';
	const CodeType_UnconfirmedExpress = 'UnconfirmedExpress';
	const CodeType_Guest = 'Guest';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('UserStatusCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_UserStatusCodeType = new UserStatusCodeType();

?>
