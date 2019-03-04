<?php
namespace OolongMedia\OolZip\Domain\Repository;

/***
 *
 * This file is part of the "Zip code" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019
 *
 ***/
use TYPO3\CMS\Core\Utility\DebugUtility as D;

/**
 * The repository for Zips
 */
class ZipRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    
	/**
	 * Return the distance from one lat/long to lat/long pairs in db zips
	 * 
	 * NOTE : Problème d'alias avec la WHERE clause -- TODO : mysql pure dist query
	 * 
     * @param \OolongMedia\OolZip\Domain\Model\Zip $zip
	 * @return type
	 */
	public function findDistancesFrom($zip){
		$lat = $zip->getLatitude();
		$long = $zip->getLongitude();
		$query = $this->createQuery();
		
		$sql = "SELECT postal_code, admin_name1, place_name, latitude, longitude, " .
			"6371 * acos( cos( radians(t.latitude) ) * cos( radians( " . $lat . " ) ) * cos( radians( $long ) - radians(t.longitude) ) + sin( radians(t.latitude) )  * sin( radians( $lat ) ) ) as distance " . 
			"FROM `tx_oolzip_domain_model_zip` as t " .
			" WHERE uid <> " . $zip->getUid();
		
		// TODO : hidden, deleted etc...
		
		$query->statement($sql);
		return $query->execute(TRUE);
	}
	
}
