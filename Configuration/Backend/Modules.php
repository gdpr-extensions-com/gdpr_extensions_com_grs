<?php

if ((int)\TYPO3\CMS\Core\Utility\VersionNumberUtility::getCurrentTypo3Version() >= 12) {
   

        return[
            'gdpr' => [
                'labels' => 'LLL:EXT:gdpr_extensions_com_grs/Resources/Private/Language/locallang_mod_web.xlf',
                'iconIdentifier' => 'gdpr_extensions_com_tab',
                'navigationComponent' => '@typo3/backend/page-tree/page-tree-element',
            ],

            'grs' => [
                'parent' => 'gdpr',
                'position' => [],
                'access' => 'user,group',
                'iconIdentifier' => 'gdprgoogle_reviewslider',
                'path' => '/module/grs',
                'labels' => 'LLL:EXT:gdpr_extensions_com_grs/Resources/Private/Language/locallang_gdprmanager.xlf',
                'extensionName' => 'GdprExtensionsComGrs',
                'controllerActions' => [
                    \GdprExtensionsCom\GdprExtensionsComGrs\Controller\GdprManagerController::class => [
                        'list',
                        'index',
                        'show',
                        'new',
                        'create',
                        'edit',
                        'update',
                        'delete',
                        'uploadImage',
                        'manage'
                    ],
                ],
            ]
        ];

    }


