<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'OolongMedia.OolZip',
            'Zip',
            [
                'Zip' => 'compare, list, show, edit, update'
            ],
            // non-cacheable actions
            [
                'Zip' => 'compare, list, show, edit'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    zip {
                        iconIdentifier = ool_zip-plugin-zip
                        title = LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_ool_zip_zip.name
                        description = LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_ool_zip_zip.description
                        tt_content_defValues {
                            CType = list
                            list_type = oolzip_zip
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
		$iconRegistry->registerIcon(
			'ool_zip-plugin-zip',
			\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
			['source' => 'EXT:ool_zip/Resources/Public/Icons/zip.svg']
		);
		
    }
);
