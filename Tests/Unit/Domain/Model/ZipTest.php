<?php
namespace OolongMedia\OolZip\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class ZipTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \OolongMedia\OolZip\Domain\Model\Zip
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \OolongMedia\OolZip\Domain\Model\Zip();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getCountryCodeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCountryCode()
        );
    }

    /**
     * @test
     */
    public function setCountryCodeForStringSetsCountryCode()
    {
        $this->subject->setCountryCode('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'countryCode',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPostalCodeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPostalCode()
        );
    }

    /**
     * @test
     */
    public function setPostalCodeForStringSetsPostalCode()
    {
        $this->subject->setPostalCode('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'postalCode',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPlaceNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPlaceName()
        );
    }

    /**
     * @test
     */
    public function setPlaceNameForStringSetsPlaceName()
    {
        $this->subject->setPlaceName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'placeName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAdminName1ReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAdminName1()
        );
    }

    /**
     * @test
     */
    public function setAdminName1ForStringSetsAdminName1()
    {
        $this->subject->setAdminName1('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'adminName1',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAdminCode1ReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAdminCode1()
        );
    }

    /**
     * @test
     */
    public function setAdminCode1ForStringSetsAdminCode1()
    {
        $this->subject->setAdminCode1('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'adminCode1',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAdminName2ReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAdminName2()
        );
    }

    /**
     * @test
     */
    public function setAdminName2ForStringSetsAdminName2()
    {
        $this->subject->setAdminName2('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'adminName2',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAdminCode2ReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAdminCode2()
        );
    }

    /**
     * @test
     */
    public function setAdminCode2ForStringSetsAdminCode2()
    {
        $this->subject->setAdminCode2('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'adminCode2',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAdminName3ReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAdminName3()
        );
    }

    /**
     * @test
     */
    public function setAdminName3ForStringSetsAdminName3()
    {
        $this->subject->setAdminName3('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'adminName3',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAdminCode3ReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAdminCode3()
        );
    }

    /**
     * @test
     */
    public function setAdminCode3ForStringSetsAdminCode3()
    {
        $this->subject->setAdminCode3('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'adminCode3',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLatitudeReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getLatitude()
        );
    }

    /**
     * @test
     */
    public function setLatitudeForFloatSetsLatitude()
    {
        $this->subject->setLatitude(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'latitude',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getLongitudeReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getLongitude()
        );
    }

    /**
     * @test
     */
    public function setLongitudeForFloatSetsLongitude()
    {
        $this->subject->setLongitude(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'longitude',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getAccuracyReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAccuracy()
        );
    }

    /**
     * @test
     */
    public function setAccuracyForStringSetsAccuracy()
    {
        $this->subject->setAccuracy('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'accuracy',
            $this->subject
        );
    }
}
