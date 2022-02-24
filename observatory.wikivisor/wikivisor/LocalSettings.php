<?php
// Timezone
$wgLocaltimezone = "UTC";
$wgAmericanDates = true;

// Job queue
$wgJobRunRate = 0;

// Cache settings
$wgObjectCaches['redis'] = [
    'class'                => 'RedisBagOStuff',
    'servers'              => [ '127.0.0.1:6379' ],
    // 'connectTimeout'    => 1,
    // 'persistent'        => false,
    // 'password'          => 'secret',
    // 'automaticFailOver' => true,
];

$wgMainCacheType = CACHE_ACCEL;
$wgSessionCacheType = CACHE_DB;
$wgParserCacheType = 'redis';
$wgUseLocalMessageCache = true;

$wgJobTypeConf['default'] = [
    'class'          => 'JobQueueRedis',
    'redisServer'    => '127.0.0.1:6379',
    'redisConfig'    => [],
    'claimTTL'       => 3600,
    'daemonized'     => true
];

// FileCache
# $wgUseFileCache = true;
# $wgFileCacheDirectory = "/var/www/html/w/filecache";
$wgUseGzip = true;

// General settings
$wgPFEnableStringFunctions = true;
$wgRestrictDisplayTitle = false;
$wgAllowSiteCSSOnRestrictedPages = true;
$wgAllowExternalImages = true;
$wgNativeImageLazyLoading  = true;
$wgShowIPinHeader = false;

// Skin settings
wfLoadExtension( 'Bootstrap' );

// Vector
# require_once( 'VectorSettings.php' );

// Chameleon
require_once( 'ChameleonSettings.php' );

// Additional extensions
wfLoadExtension( 'Arrays' );
wfLoadExtension( 'EmbedVideo' );
wfLoadExtension( 'InviteSignup' );
// wfLoadExtension( 'LinkTitles' );
wfLoadExtension( 'Loops' );
wfLoadExtension( 'MyVariables' );
wfLoadExtension( 'PageForms' );
wfLoadExtension( 'PageNotice' );
wfLoadExtension( 'RottenLinks' );
wfLoadExtension( 'SemanticBreadcrumbLinks' );
wfLoadExtension( 'UserFunctions' );
wfLoadExtension( 'Variables' );
wfLoadExtension( 'VoteNY' );
wfLoadExtension( 'Widgets' );

// CodeMirror
$wgCodeMirrorEnableBracketMatching = true;
$wgCodeMirrorAccessibilityColors = true;
$wgCodeMirrorLineNumberingNamespaces = null;

// EmbedVideo
$wgEmbedVideoDefaultWidth = 1024;

// InviteSignup
$wgGroupPermissions['sysop']['invitesignup'] = true;
$wgGroupPermissions['observer']['invitesignup'] = false;
$wgISGroups = [ 'observer' ];

// Editor settings
$wgDefaultUserOptions['visualeditor-enable'] = 1;
$wgHiddenPrefs[] = 'visualeditor-enable';
# $wgVisualEditorUseSingleEditTab = true;

$wgVisualEditorEnableWikitext = true;
$wgDefaultUserOptions['visualeditor-newwikitext'] = 1;
$wgHiddenPrefs[] = 'visualeditor-newwikitext';

$wgVisualEditorEnableDiffPage = true;
$wgVisualEditorEnableVisualSectionEditing = true;
$wgVisualEditorEnableExperimentalCode = true;
$wgHiddenPrefs[] = 'visualeditor-betatempdisable';

$wgDefaultUserOptions['usecodemirror'] = 1;

// Allow string functions
$wgPFEnableStringFunctions = true;

// LinkTitles
$wgLinkTitlesParseOnEdit = false;
$wgLinkTitlesParseOnRender = true;
$wgLinkTitlesFirstOnly = true;

// UserFunctions
$wgUFAllowedNamespaces = array_fill( 0, 4000, true );
$wgUFEnableSpecialContexts = true;

// VoteNY
$wgGroupPermissions['*']['voteny'] = true;

// Add classes to the body tag
$wgHooks['OutputPageBodyAttributes'][] = function ( OutputPage $out, Skin $skin, &$bodyAttrs ) {
   $default = $bodyAttrs['class'];
   if ( $out->getUser()->getOption('gadget-Dark-theme') ){
      $bodyAttrs['class'] = $default . ' dark-theme';
   }
   if ( $out->getUser()->isAnon() ) {
      $bodyAttrs['class'] = $default . ' notloggedin';
   }
};

// Datatables
$wgResourceModules['ext.datatables'] = [
    'scripts' => [ 'extensions/wikivisor/datatables/datatables.min.js' ],
    'styles' => [ 'extensions/wikivisor/datatables/datatables.min.css' ],
];

// Load modules
$wgHooks['BeforePageDisplay'] = function( $out, $skin ) {
        $out->addModules(['ext.datatables']);
        $code = <<<'START_END_MARKER'
<!-- Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400&display=swap" rel="stylesheet">
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="/w/extensions/wikivisor/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/w/extensions/wikivisor/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/w/extensions/wikivisor/favicon/favicon-16x16.png">
<link rel="manifest" href="/w/extensions/wikivisor/favicon/site.webmanifest">
<link rel="mask-icon" href="/w/extensions/wikivisor/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="/w/extensions/wikivisor/favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#6f5d8d">
<meta name="msapplication-config" content="/w/extensions/wikivisor/favicon/browserconfig.xml">
<meta name="theme-color" content="#6f5d8d">
START_END_MARKER;
     $out->addHeadItem( 'head-tags-load', $code );
};

// Sitemap namespaces
$wgSitemapNamespaces = [ 0, 2, 4, 12 ];

// CDN & Varnish
$wgUseCdn = true;
$wgCdnServers = ['127.0.0.1:6081'];
$wgUsePrivateIPs = true;

// Debug
$wgShowExceptionDetails = true;
$smwgChangePropagationProtection = false;
