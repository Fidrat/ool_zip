<?php
namespace OolongMedia\OolZip\Controller;

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
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * ZipController
 */
class ZipController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * zipRepository
     *
     * @var \OolongMedia\OolZip\Domain\Repository\ZipRepository
     * @inject
     */
    protected $zipRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        //$zips = $this->zipRepository->findAll();
        $zips = $this->zipRepository->findByAdminName1("quebec");
		
        $this->view->assign('zips', $zips);
    }

    /**
     * action show
     *
     * @param \OolongMedia\OolZip\Domain\Model\Zip $zip
     * @return void
     */
    public function showAction(\OolongMedia\OolZip\Domain\Model\Zip $zip)
    {
        $this->view->assign('zip', $zip);
    }

	/**
     * action edit
     *
     * @param \OolongMedia\OolZip\Domain\Model\Zip $zip
     * @return void
     */
    public function editAction(\OolongMedia\OolZip\Domain\Model\Zip $zip)
    {
		//D::debug( $zip );
        $this->view->assign('zip', $zip);
    }
	
	/**
     * action update
     *
     * @param \OolongMedia\OolZip\Domain\Model\Zip $zip
     * @return \OolongMedia\OolZip\Domain\Model\Zip 
     */
    public function updateAction(\OolongMedia\OolZip\Domain\Model\Zip $zip)
    {
		$this->zipRepository->update( $zip );
        $this->forward('show', NULL, NULL, array( 'zip'=>$zip ) );
    }

	/**
     * action compare
     *
     * @param string $zipText
     * @param int $distanceMax
	 * 
     * @return void
     */
    public function compareAction( $zipText=NULL, $distanceMax=0 )
    {
		if( !is_null($zipText) ){
			$this->view->assignMultiple( array('zipText'=>$zipText, 'distanceMax'=>$distanceMax ) );

			$zip = $this->zipRepository->findOneByPostalCode( strtoupper($zipText) );

			$closeZips = array();
			$cpCommaList = array();

			if($zip){
				$this->view->assign('zip', $zip);

				if($distanceMax > 0){					
					$zips = $this->zipRepository->findDistancesFrom( $zip );
					
					foreach( $zips as $z ){		
						if( $z['distance'] < $distanceMax ){
							$closeZips[] = $z;
							$cpCommaList[] = strtolower( $z['postal_code'] );
						}
					}
					
					$this->view->assign('closeZips', $closeZips);
				}
				
				$this->view->assign('cpCommaList', implode(",", $cpCommaList) );
				
			}	
		}
		
    }
	
	
	/**
     * action ajaxAction
     *
     */
    public function ajaxAction()
    {
		$this->response->addAdditionalHeaderData('<meta name="robots" content="noindex, nofollow">');
		// TODO : ajax test management
		return true;
		exit;
    }

	
	
}
