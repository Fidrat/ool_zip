<?php
namespace OolongMedia\OolZip\Domain\Model;

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

/**
 * Zip
 */
class Zip extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * countryCode
     *
     * @var string
     */
    protected $countryCode = '';

    /**
     * postalCode
     *
     * @var string
     */
    protected $postalCode = '';

    /**
     * placeName
     *
     * @var string
     */
    protected $placeName = '';

    /**
     * adminName1
     *
     * @var string
     */
    protected $adminName1 = '';

    /**
     * adminCode1
     *
     * @var string
     */
    protected $adminCode1 = '';

    /**
     * adminName2
     *
     * @var string
     */
    protected $adminName2 = '';

    /**
     * adminCode2
     *
     * @var string
     */
    protected $adminCode2 = '';

    /**
     * adminName3
     *
     * @var string
     */
    protected $adminName3 = '';

    /**
     * adminCode3
     *
     * @var string
     */
    protected $adminCode3 = '';

    /**
     * latitude
     *
     * @var float
     */
    protected $latitude = 0.0;

    /**
     * longitude
     *
     * @var float
     */
    protected $longitude = 0.0;

    /**
     * accuracy
     *
     * @var string
     */
    protected $accuracy = '';

    /**
     * Returns the countryCode
     *
     * @return string $countryCode
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Sets the countryCode
     *
     * @param string $countryCode
     * @return void
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * Returns the postalCode
     *
     * @return string $postalCode
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Sets the postalCode
     *
     * @param string $postalCode
     * @return void
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * Returns the placeName
     *
     * @return string $placeName
     */
    public function getPlaceName()
    {
        return $this->placeName;
    }

    /**
     * Sets the placeName
     *
     * @param string $placeName
     * @return void
     */
    public function setPlaceName($placeName)
    {
        $this->placeName = $placeName;
    }

    /**
     * Returns the adminName1
     *
     * @return string $adminName1
     */
    public function getAdminName1()
    {
        return $this->adminName1;
    }

    /**
     * Sets the adminName1
     *
     * @param string $adminName1
     * @return void
     */
    public function setAdminName1($adminName1)
    {
        $this->adminName1 = $adminName1;
    }

    /**
     * Returns the adminCode1
     *
     * @return string $adminCode1
     */
    public function getAdminCode1()
    {
        return $this->adminCode1;
    }

    /**
     * Sets the adminCode1
     *
     * @param string $adminCode1
     * @return void
     */
    public function setAdminCode1($adminCode1)
    {
        $this->adminCode1 = $adminCode1;
    }

    /**
     * Returns the adminName2
     *
     * @return string $adminName2
     */
    public function getAdminName2()
    {
        return $this->adminName2;
    }

    /**
     * Sets the adminName2
     *
     * @param string $adminName2
     * @return void
     */
    public function setAdminName2($adminName2)
    {
        $this->adminName2 = $adminName2;
    }

    /**
     * Returns the adminCode2
     *
     * @return string $adminCode2
     */
    public function getAdminCode2()
    {
        return $this->adminCode2;
    }

    /**
     * Sets the adminCode2
     *
     * @param string $adminCode2
     * @return void
     */
    public function setAdminCode2($adminCode2)
    {
        $this->adminCode2 = $adminCode2;
    }

    /**
     * Returns the adminName3
     *
     * @return string $adminName3
     */
    public function getAdminName3()
    {
        return $this->adminName3;
    }

    /**
     * Sets the adminName3
     *
     * @param string $adminName3
     * @return void
     */
    public function setAdminName3($adminName3)
    {
        $this->adminName3 = $adminName3;
    }

    /**
     * Returns the adminCode3
     *
     * @return string $adminCode3
     */
    public function getAdminCode3()
    {
        return $this->adminCode3;
    }

    /**
     * Sets the adminCode3
     *
     * @param string $adminCode3
     * @return void
     */
    public function setAdminCode3($adminCode3)
    {
        $this->adminCode3 = $adminCode3;
    }

    /**
     * Returns the latitude
     *
     * @return float $latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Sets the latitude
     *
     * @param float $latitude
     * @return void
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Returns the longitude
     *
     * @return float $longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Sets the longitude
     *
     * @param float $longitude
     * @return void
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Returns the accuracy
     *
     * @return int $accuracy
     */
    public function getAccuracy()
    {
        return $this->accuracy;
    }

	/**
     * Returns the accuracy
     *
     * @return string $accuracy
     */
    public function getAccuracyTxt()
    {
		$labels = [0=>"Unknown", 1=>"Estimated", 2=>"25%", 3=>"50%", 4=>"75%", 5=>"90%", 6=>"Centered (100%)"];
        return $labels[ $this->getAccuracy() ];
    }

    /**
     * Sets the accuracy
     *
     * @param int $accuracy
     * @return void
     */
    public function setAccuracy($accuracy)
    {
        $this->accuracy = $accuracy;
    }
}
