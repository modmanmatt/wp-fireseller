<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Defines the standard 3-letter ISO 4217 currency code set.However, only certain 
 * currency codes are currently valid for use on eBay.The valid codes are 
 * documented below with the notation "(in/out)".Other codes in this list are for 
 * future use.The documentation below specifies English names for each 
 * currency.Alternatively, use GeteBayDetails to retrieve the names 
 * programmatically.A reference: http://www.xe.com/iso4217.htm 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/CurrencyCodeType.html
 *
 * @property string AFA
 * @property string ALL
 * @property string DZD
 * @property string ADP
 * @property string AOA
 * @property string ARS
 * @property string AMD
 * @property string AWG
 * @property string AZM
 * @property string BSD
 * @property string BHD
 * @property string BDT
 * @property string BBD
 * @property string BYR
 * @property string BZD
 * @property string BMD
 * @property string BTN
 * @property string INR
 * @property string BOV
 * @property string BOB
 * @property string BAM
 * @property string BWP
 * @property string BRL
 * @property string BND
 * @property string BGL
 * @property string BGN
 * @property string BIF
 * @property string KHR
 * @property string CAD
 * @property string CVE
 * @property string KYD
 * @property string XAF
 * @property string CLF
 * @property string CLP
 * @property string CNY
 * @property string COP
 * @property string KMF
 * @property string CDF
 * @property string CRC
 * @property string HRK
 * @property string CUP
 * @property string CYP
 * @property string CZK
 * @property string DKK
 * @property string DJF
 * @property string DOP
 * @property string TPE
 * @property string ECV
 * @property string ECS
 * @property string EGP
 * @property string SVC
 * @property string ERN
 * @property string EEK
 * @property string ETB
 * @property string FKP
 * @property string FJD
 * @property string GMD
 * @property string GEL
 * @property string GHC
 * @property string GIP
 * @property string GTQ
 * @property string GNF
 * @property string GWP
 * @property string GYD
 * @property string HTG
 * @property string HNL
 * @property string HKD
 * @property string HUF
 * @property string ISK
 * @property string IDR
 * @property string IRR
 * @property string IQD
 * @property string ILS
 * @property string JMD
 * @property string JPY
 * @property string JOD
 * @property string KZT
 * @property string KES
 * @property string AUD
 * @property string KPW
 * @property string KRW
 * @property string KWD
 * @property string KGS
 * @property string LAK
 * @property string LVL
 * @property string LBP
 * @property string LSL
 * @property string LRD
 * @property string LYD
 * @property string CHF
 * @property string LTL
 * @property string MOP
 * @property string MKD
 * @property string MGF
 * @property string MWK
 * @property string MYR
 * @property string MVR
 * @property string MTL
 * @property string EUR
 * @property string MRO
 * @property string MUR
 * @property string MXN
 * @property string MXV
 * @property string MDL
 * @property string MNT
 * @property string XCD
 * @property string MZM
 * @property string MMK
 * @property string ZAR
 * @property string NAD
 * @property string NPR
 * @property string ANG
 * @property string XPF
 * @property string NZD
 * @property string NIO
 * @property string NGN
 * @property string NOK
 * @property string OMR
 * @property string PKR
 * @property string PAB
 * @property string PGK
 * @property string PYG
 * @property string PEN
 * @property string PHP
 * @property string PLN
 * @property string USD
 * @property string QAR
 * @property string ROL
 * @property string RUB
 * @property string RUR
 * @property string RWF
 * @property string SHP
 * @property string WST
 * @property string STD
 * @property string SAR
 * @property string SCR
 * @property string SLL
 * @property string SGD
 * @property string SKK
 * @property string SIT
 * @property string SBD
 * @property string SOS
 * @property string LKR
 * @property string SDD
 * @property string SRG
 * @property string SZL
 * @property string SEK
 * @property string SYP
 * @property string TWD
 * @property string TJS
 * @property string TZS
 * @property string THB
 * @property string XOF
 * @property string TOP
 * @property string TTD
 * @property string TND
 * @property string TRL
 * @property string TMM
 * @property string UGX
 * @property string UAH
 * @property string AED
 * @property string GBP
 * @property string USS
 * @property string USN
 * @property string UYU
 * @property string UZS
 * @property string VUV
 * @property string VEB
 * @property string VND
 * @property string MAD
 * @property string YER
 * @property string YUM
 * @property string ZMK
 * @property string ZWD
 * @property string ATS
 * @property string CustomCode
 */
class CurrencyCodeType extends EbatNs_FacetType
{
	const CodeType_AFA = 'AFA';
	const CodeType_ALL = 'ALL';
	const CodeType_DZD = 'DZD';
	const CodeType_ADP = 'ADP';
	const CodeType_AOA = 'AOA';
	const CodeType_ARS = 'ARS';
	const CodeType_AMD = 'AMD';
	const CodeType_AWG = 'AWG';
	const CodeType_AZM = 'AZM';
	const CodeType_BSD = 'BSD';
	const CodeType_BHD = 'BHD';
	const CodeType_BDT = 'BDT';
	const CodeType_BBD = 'BBD';
	const CodeType_BYR = 'BYR';
	const CodeType_BZD = 'BZD';
	const CodeType_BMD = 'BMD';
	const CodeType_BTN = 'BTN';
	const CodeType_INR = 'INR';
	const CodeType_BOV = 'BOV';
	const CodeType_BOB = 'BOB';
	const CodeType_BAM = 'BAM';
	const CodeType_BWP = 'BWP';
	const CodeType_BRL = 'BRL';
	const CodeType_BND = 'BND';
	const CodeType_BGL = 'BGL';
	const CodeType_BGN = 'BGN';
	const CodeType_BIF = 'BIF';
	const CodeType_KHR = 'KHR';
	const CodeType_CAD = 'CAD';
	const CodeType_CVE = 'CVE';
	const CodeType_KYD = 'KYD';
	const CodeType_XAF = 'XAF';
	const CodeType_CLF = 'CLF';
	const CodeType_CLP = 'CLP';
	const CodeType_CNY = 'CNY';
	const CodeType_COP = 'COP';
	const CodeType_KMF = 'KMF';
	const CodeType_CDF = 'CDF';
	const CodeType_CRC = 'CRC';
	const CodeType_HRK = 'HRK';
	const CodeType_CUP = 'CUP';
	const CodeType_CYP = 'CYP';
	const CodeType_CZK = 'CZK';
	const CodeType_DKK = 'DKK';
	const CodeType_DJF = 'DJF';
	const CodeType_DOP = 'DOP';
	const CodeType_TPE = 'TPE';
	const CodeType_ECV = 'ECV';
	const CodeType_ECS = 'ECS';
	const CodeType_EGP = 'EGP';
	const CodeType_SVC = 'SVC';
	const CodeType_ERN = 'ERN';
	const CodeType_EEK = 'EEK';
	const CodeType_ETB = 'ETB';
	const CodeType_FKP = 'FKP';
	const CodeType_FJD = 'FJD';
	const CodeType_GMD = 'GMD';
	const CodeType_GEL = 'GEL';
	const CodeType_GHC = 'GHC';
	const CodeType_GIP = 'GIP';
	const CodeType_GTQ = 'GTQ';
	const CodeType_GNF = 'GNF';
	const CodeType_GWP = 'GWP';
	const CodeType_GYD = 'GYD';
	const CodeType_HTG = 'HTG';
	const CodeType_HNL = 'HNL';
	const CodeType_HKD = 'HKD';
	const CodeType_HUF = 'HUF';
	const CodeType_ISK = 'ISK';
	const CodeType_IDR = 'IDR';
	const CodeType_IRR = 'IRR';
	const CodeType_IQD = 'IQD';
	const CodeType_ILS = 'ILS';
	const CodeType_JMD = 'JMD';
	const CodeType_JPY = 'JPY';
	const CodeType_JOD = 'JOD';
	const CodeType_KZT = 'KZT';
	const CodeType_KES = 'KES';
	const CodeType_AUD = 'AUD';
	const CodeType_KPW = 'KPW';
	const CodeType_KRW = 'KRW';
	const CodeType_KWD = 'KWD';
	const CodeType_KGS = 'KGS';
	const CodeType_LAK = 'LAK';
	const CodeType_LVL = 'LVL';
	const CodeType_LBP = 'LBP';
	const CodeType_LSL = 'LSL';
	const CodeType_LRD = 'LRD';
	const CodeType_LYD = 'LYD';
	const CodeType_CHF = 'CHF';
	const CodeType_LTL = 'LTL';
	const CodeType_MOP = 'MOP';
	const CodeType_MKD = 'MKD';
	const CodeType_MGF = 'MGF';
	const CodeType_MWK = 'MWK';
	const CodeType_MYR = 'MYR';
	const CodeType_MVR = 'MVR';
	const CodeType_MTL = 'MTL';
	const CodeType_EUR = 'EUR';
	const CodeType_MRO = 'MRO';
	const CodeType_MUR = 'MUR';
	const CodeType_MXN = 'MXN';
	const CodeType_MXV = 'MXV';
	const CodeType_MDL = 'MDL';
	const CodeType_MNT = 'MNT';
	const CodeType_XCD = 'XCD';
	const CodeType_MZM = 'MZM';
	const CodeType_MMK = 'MMK';
	const CodeType_ZAR = 'ZAR';
	const CodeType_NAD = 'NAD';
	const CodeType_NPR = 'NPR';
	const CodeType_ANG = 'ANG';
	const CodeType_XPF = 'XPF';
	const CodeType_NZD = 'NZD';
	const CodeType_NIO = 'NIO';
	const CodeType_NGN = 'NGN';
	const CodeType_NOK = 'NOK';
	const CodeType_OMR = 'OMR';
	const CodeType_PKR = 'PKR';
	const CodeType_PAB = 'PAB';
	const CodeType_PGK = 'PGK';
	const CodeType_PYG = 'PYG';
	const CodeType_PEN = 'PEN';
	const CodeType_PHP = 'PHP';
	const CodeType_PLN = 'PLN';
	const CodeType_USD = 'USD';
	const CodeType_QAR = 'QAR';
	const CodeType_ROL = 'ROL';
	const CodeType_RUB = 'RUB';
	const CodeType_RUR = 'RUR';
	const CodeType_RWF = 'RWF';
	const CodeType_SHP = 'SHP';
	const CodeType_WST = 'WST';
	const CodeType_STD = 'STD';
	const CodeType_SAR = 'SAR';
	const CodeType_SCR = 'SCR';
	const CodeType_SLL = 'SLL';
	const CodeType_SGD = 'SGD';
	const CodeType_SKK = 'SKK';
	const CodeType_SIT = 'SIT';
	const CodeType_SBD = 'SBD';
	const CodeType_SOS = 'SOS';
	const CodeType_LKR = 'LKR';
	const CodeType_SDD = 'SDD';
	const CodeType_SRG = 'SRG';
	const CodeType_SZL = 'SZL';
	const CodeType_SEK = 'SEK';
	const CodeType_SYP = 'SYP';
	const CodeType_TWD = 'TWD';
	const CodeType_TJS = 'TJS';
	const CodeType_TZS = 'TZS';
	const CodeType_THB = 'THB';
	const CodeType_XOF = 'XOF';
	const CodeType_TOP = 'TOP';
	const CodeType_TTD = 'TTD';
	const CodeType_TND = 'TND';
	const CodeType_TRL = 'TRL';
	const CodeType_TMM = 'TMM';
	const CodeType_UGX = 'UGX';
	const CodeType_UAH = 'UAH';
	const CodeType_AED = 'AED';
	const CodeType_GBP = 'GBP';
	const CodeType_USS = 'USS';
	const CodeType_USN = 'USN';
	const CodeType_UYU = 'UYU';
	const CodeType_UZS = 'UZS';
	const CodeType_VUV = 'VUV';
	const CodeType_VEB = 'VEB';
	const CodeType_VND = 'VND';
	const CodeType_MAD = 'MAD';
	const CodeType_YER = 'YER';
	const CodeType_YUM = 'YUM';
	const CodeType_ZMK = 'ZMK';
	const CodeType_ZWD = 'ZWD';
	const CodeType_ATS = 'ATS';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('CurrencyCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_CurrencyCodeType = new CurrencyCodeType();

?>
