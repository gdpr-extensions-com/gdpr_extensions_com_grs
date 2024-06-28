<?php
defined('TYPO3') || die();

$frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'GdprExtensionsComGrs',
    'gdprgoogle_reviewslider',
    'Google Reviews Slider'
);

$fields = [
    // 'gdpr_business_locations' => [
    //     'config' => [
    //         'type' => 'select',
    //         'renderType' => 'selectMultipleSideBySide',
    //         'itemsProcFunc' => 'GdprExtensionsCom\GdprExtensionsComGrs\Utility\ProcessSliderItems->getLocationsforRoodPid',
    //     ],
    // ],
    'gdpr_background_color' => [
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
        ],
    ],
    'gdpr_color_of_border' => [
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
        ],
    ],
    'gdpr_color_of_text' => [
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
        ],
    ],

    'gdpr_total_color_of_text' => [
        'config' => [
            'type' => 'input',
            'renderType' => 'colorpicker',
        ],
    ],
    'gdpr_alt_text' => [
        'config' => [
            'type' => 'input',
            'size' => '30',
        ],
    ],
    'gdpr_same_as_url' => [
        'config' => [
            'type' => 'input',
            'size' => '30',
            'renderType' => 'inputLink',
        ],
    ],
    'tx_gdprreviewsclient_slider_max_reviews' => [
        'displayCond' => 'FIELD:gdpr_show_all_reviews:=:0',
        'config' => [
            'type' => 'input',
            'size' => 10,
            'eval' => 'trim,int',
            'range' => [
                'lower' => 1,
                'upper' => 100,
            ],
            'default' => 4,
            'slider' => [
                'step' => 1,
                'width' => 200,
            ],
        ],
    ],

    'gdpr_show_all_reviews' => [
        'onChange' => 'reload',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'items' => [
                [
                    0 => '',
                    1 => '',
                ],
            ],
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $fields);

$GLOBALS['TCA']['tt_content']['types']['gdprextensionscomgrs_gdprgoogle_reviewslider'] = [
    'showitem' => '
                --palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
                 gdpr_color_of_border; Border Color,
                 gdpr_color_of_text; Text Color,
                 gdpr_same_as_url; Same as URL,
                 gdpr_alt_text; Alternate Text For images,
                 gdpr_background_color; Background Color,
                 tx_gdprreviewsclient_slider_max_reviews; Max. number of reviews,
                 gdpr_show_all_reviews; Show All Reviews,

                --div--;' . $frontendLanguageFilePrefix . 'tabs.appearance,
                --palette--;' . $frontendLanguageFilePrefix . 'palette.frames;frames,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
                --div--;' . $frontendLanguageFilePrefix . 'tabs.access,
                hidden;' . $frontendLanguageFilePrefix . 'field.default.hidden,
                --palette--;' . $frontendLanguageFilePrefix . 'palette.access;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
        ',
];
