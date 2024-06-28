<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComGrs',
        'gdprgoogle_reviewslider',
        [
            \GdprExtensionsCom\GdprExtensionsComGrs\Controller\GdprGoogleReviewsliderController::class => 'index'
        ],
        // non-cacheable actions
        [
            \GdprExtensionsCom\GdprExtensionsComGrs\Controller\GdprGoogleReviewsliderController::class => '',
            \GdprExtensionsCom\GdprExtensionsComGrs\Controller\GdprManagerController::class => 'create, update, delete'
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );
    
    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
       'mod.wizards.newContentElement.wizardItems {
              gdpr.header = LLL:EXT:gdpr_extensions_com_grs/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_grs_gdprgoogle_reviewslider.name.tab
       }'
   );
    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.gdpr {
                elements {
                    gdprgoogle_reviewslider {
                        iconIdentifier = gdpr_extensions_com_tab
                        title = LLL:EXT:gdpr_extensions_com_grs/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_grs_gdprgoogle_reviewslider.name
                        description = LLL:EXT:gdpr_extensions_com_grs/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_grs_gdprgoogle_reviewslider.description
                        tt_content_defValues {
                            CType = gdprextensionscomgrs_gdprgoogle_reviewslider
                        }
                    }
                }
                show = *
            }
       }'
    );

     $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks'][\GdprExtensionsCom\GdprExtensionsComGrs\Commands\SyncReviewsTask::class] = [
            'extension' => 'GdprExtensionsComGrs',
            'title' => 'Fetch Google Reviews',
            'description' => 'Fetch google reviews from GDPR-extensions-com dashboard ',
            'additionalFields' => \GdprExtensionsCom\GdprExtensionsComGrs\Commands\SyncReviewsTask::class,
        ];
  
})();
