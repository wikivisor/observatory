<?php
wfLoadExtension( 'SemanticMediaWiki' );
enableSemantics( 'observatory.wiki' );
wfLoadExtension( 'SemanticACL' );

$smwgPageSpecialProperties = array_merge(
        $smwgPageSpecialProperties, [ '_CDAT', '_LEDT' ]
);
$sespgEnabledPropertyList = [
	'_CUSER'
];
$smwgParserFeatures = $smwgParserFeatures | SMW_PARSER_LINV;
$smwgEnabledQueryDependencyLinksStore = true;
$smwgCacheType = 'redis';
