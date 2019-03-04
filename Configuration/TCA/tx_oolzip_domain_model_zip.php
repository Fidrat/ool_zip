<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_oolzip_domain_model_zip',
        'label' => 'country_code',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'country_code,postal_code,place_name,admin_name1,admin_code1,admin_name2,admin_code2,admin_name3,admin_code3,latitude,longitude,accuracy',
        'iconfile' => 'EXT:ool_zip/Resources/Public/Icons/tx_oolzip_domain_model_zip.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, country_code, postal_code, place_name, admin_name1, admin_code1, admin_name2, admin_code2, admin_name3, admin_code3, latitude, longitude, accuracy',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, country_code, postal_code, place_name, admin_name1, admin_code1, admin_name2, admin_code2, admin_name3, admin_code3, latitude, longitude, accuracy, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_oolzip_domain_model_zip',
                'foreign_table_where' => 'AND tx_oolzip_domain_model_zip.pid=###CURRENT_PID### AND tx_oolzip_domain_model_zip.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'country_code' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_oolzip_domain_model_zip.country_code',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'postal_code' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_oolzip_domain_model_zip.postal_code',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'place_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_oolzip_domain_model_zip.place_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'admin_name1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_oolzip_domain_model_zip.admin_name1',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'admin_code1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_oolzip_domain_model_zip.admin_code1',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'admin_name2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_oolzip_domain_model_zip.admin_name2',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'admin_code2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_oolzip_domain_model_zip.admin_code2',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'admin_name3' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_oolzip_domain_model_zip.admin_name3',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'admin_code3' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_oolzip_domain_model_zip.admin_code3',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'latitude' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_oolzip_domain_model_zip.latitude',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'longitude' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_oolzip_domain_model_zip.longitude',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
        'accuracy' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ool_zip/Resources/Private/Language/locallang_db.xlf:tx_oolzip_domain_model_zip.accuracy',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'int'
            ],
        ],
    
    ],
];
