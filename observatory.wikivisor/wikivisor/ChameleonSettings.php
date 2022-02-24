<?php
wfLoadSkin( 'chameleon' );
$wgDefaultSkin='chameleon';

$egChameleonLayoutFile= $IP . '/extensions/wikivisor/skins/chameleon/layouts/custom.xml';
$egChameleonThemeFile = '';
$egChameleonExternalStyleModules = [
        $IP . '/extensions/wikivisor/skins/chameleon/custom.scss' => 'afterMain',
];
$egChameleonExternalStyleVariables = [
        'container-max-widths' => '(sm: 540px, md: 768px, lg: 1105px, xl: 1440px)',
        'headings-font-family' => 'Alte Haas Grotesk, sans-serif',
        'font-family-base' => 'Lato, sans-serif',
];
$egChameleonEnableExternalLinkIcons = true;
# $egScssCacheType = CACHE_NONE;

