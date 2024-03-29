<?php
// autogenerated file 10.09.2012 12:58
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Supported event ticket types. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/TicketEventTypeCodeType.html
 *
 * @property string Any
 * @property string DE_ComedyAndKabarett
 * @property string DE_FreizeitAndEvents
 * @property string DE_KonzerteAndFestivals
 * @property string DE_KulturAndKlassik
 * @property string DE_MusicalsAndShows
 * @property string DE_Sportveranstaltungen
 * @property string DE_Sonstige
 * @property string UK_AmusementParks
 * @property string UK_Comedy
 * @property string UK_ConcertsAndGigs
 * @property string UK_ConferencesAndSeminars
 * @property string UK_ExhibitionsAndShows
 * @property string UK_Experiences
 * @property string UK_SportingEvents
 * @property string UK_TheatreCinemaAndCircus
 * @property string UK_Other
 * @property string US_Concerts
 * @property string US_Movies
 * @property string US_SportingEvents
 * @property string US_Theater
 * @property string US_Other
 * @property string CustomCode
 */
class TicketEventTypeCodeType extends EbatNs_FacetType
{
	const CodeType_Any = 'Any';
	const CodeType_DE_ComedyAndKabarett = 'DE_ComedyAndKabarett';
	const CodeType_DE_FreizeitAndEvents = 'DE_FreizeitAndEvents';
	const CodeType_DE_KonzerteAndFestivals = 'DE_KonzerteAndFestivals';
	const CodeType_DE_KulturAndKlassik = 'DE_KulturAndKlassik';
	const CodeType_DE_MusicalsAndShows = 'DE_MusicalsAndShows';
	const CodeType_DE_Sportveranstaltungen = 'DE_Sportveranstaltungen';
	const CodeType_DE_Sonstige = 'DE_Sonstige';
	const CodeType_UK_AmusementParks = 'UK_AmusementParks';
	const CodeType_UK_Comedy = 'UK_Comedy';
	const CodeType_UK_ConcertsAndGigs = 'UK_ConcertsAndGigs';
	const CodeType_UK_ConferencesAndSeminars = 'UK_ConferencesAndSeminars';
	const CodeType_UK_ExhibitionsAndShows = 'UK_ExhibitionsAndShows';
	const CodeType_UK_Experiences = 'UK_Experiences';
	const CodeType_UK_SportingEvents = 'UK_SportingEvents';
	const CodeType_UK_TheatreCinemaAndCircus = 'UK_TheatreCinemaAndCircus';
	const CodeType_UK_Other = 'UK_Other';
	const CodeType_US_Concerts = 'US_Concerts';
	const CodeType_US_Movies = 'US_Movies';
	const CodeType_US_SportingEvents = 'US_SportingEvents';
	const CodeType_US_Theater = 'US_Theater';
	const CodeType_US_Other = 'US_Other';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('TicketEventTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_TicketEventTypeCodeType = new TicketEventTypeCodeType();

?>
