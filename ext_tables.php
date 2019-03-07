<?php
USE \TYPO3\CMS\Core\Utility\GeneralUtility;
USE \TYPO3\CMS\Extbase\Utility\ExtensionUtility;
USE \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {
		/***/
		$vendor = "OolongMedia";
		$extensionKey = "ool_zip";
		$extensionName = GeneralUtility::underscoredToUpperCamelCase($extensionKey);
		/***/
	
        ExtensionUtility::registerPlugin(
            $extensionName, //'OolongMedia.OolZip',
            $pluginName = 'Zip',
            'Zip management'
        );

     
        ExtensionManagementUtility::addStaticFile($extensionKey, 'Configuration/TypoScript', 'Zip code');

        ExtensionManagementUtility::addLLrefForTCAdescr('tx_oolzip_domain_model_zip', 'EXT:ool_zip/Resources/Private/Language/locallang_csh_tx_oolzip_domain_model_zip.xlf');
        ExtensionManagementUtility::allowTableOnStandardPages('tx_oolzip_domain_model_zip');

		/*****/
		// register flexform
		$flexformFile = 'FILE:EXT:ool_zip/Configuration/FlexForm/flexform.xml';
		$pluginSignature = strtolower($extensionName . '_' . $pluginName);
		$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
		
		ExtensionManagementUtility::addPiFlexFormValue(
			$pluginSignature, 
			$flexformFile
		);
		/******/
		
		
		ExtensionUtility::registerPlugin(
            $extensionName, //'OolongMedia.OolZip',
            'WsZip',
            'WS - GET zip by zip and dist'
        );
		
    }
);
