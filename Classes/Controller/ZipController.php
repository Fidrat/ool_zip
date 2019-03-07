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

use SvenJuergens\T3Slack\Service\T3Slack;

/**
 * ZipController
 */
class ZipController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * zipRepository
     *
     * @var \OolongMedia\OolZip\Domain\Repository\ZipRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
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
     * action webServiceAction
     *
     */
    public function webServiceAction()
    {
		//die( "ws dev" );
		
		$allparams = \TYPO3\CMS\Core\Utility\GeneralUtility::_GET();
		$err = [];
		$args = [];
		
		if( !array_key_exists('z', $allparams) ){
			$err[] = "Pas de paramètre z";
		}else{
			$args['z'] = $allparams['z'];
		}
		
		if( !array_key_exists('d', $allparams) ){
			$err[] = "Pas de paramètre d";
		}else{
			$args['d'] = (int)$allparams['d'];
		}
		
		if(count($err)){
			print_r($err);
			die;
		}
		
		$zip = $this->zipRepository->findOneByPostalCode( strtoupper($args['z']) );
		
		//D::debug($zip);
		if( is_null( $zip ) ){
			print "pas de match avec '" . $args['z'] . "' dans la bd - sorry";
			die; // todo manage error msg
		}
		
		// All good, let's do the job
		$closeZips = array();
		$cpCommaList = array();
		
		$zips = $this->zipRepository->findDistancesFrom( $zip );
					
		foreach( $zips as $z ){		
			if( $z['distance'] < $args['d'] ){
				$closeZips[] = $z;
				$cpCommaList[] = strtolower( $z['postal_code'] );
			}
		}
		
		$client = GeneralUtility::makeInstance(T3Slack::class);
		$client->send( implode(",", $cpCommaList) );			
		
		$this->view->assign('cpCommaList', implode(",", $cpCommaList) );
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
