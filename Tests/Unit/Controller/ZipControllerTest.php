<?php
namespace OolongMedia\OolZip\Tests\Unit\Controller;

/**
 * Test case.
 */
class ZipControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \OolongMedia\OolZip\Controller\ZipController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\OolongMedia\OolZip\Controller\ZipController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllZipsFromRepositoryAndAssignsThemToView()
    {

        $allZips = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $zipRepository = $this->getMockBuilder(\OolongMedia\OolZip\Domain\Repository\ZipRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $zipRepository->expects(self::once())->method('findAll')->will(self::returnValue($allZips));
        $this->inject($this->subject, 'zipRepository', $zipRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('zips', $allZips);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenZipToView()
    {
        $zip = new \OolongMedia\OolZip\Domain\Model\Zip();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('zip', $zip);

        $this->subject->showAction($zip);
    }
}
