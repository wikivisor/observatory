<?php
$wgDefaultSkin = "vector";
wfLoadSkin( 'Vector' );

$wgHooks['SetupAfterCache'][] = function(){
        \Bootstrap\BootstrapManager::getInstance()->addAllBootstrapModules();
        return true;
};
$wgHooks['ParserAfterParse'][]=function( Parser &$parser, &$text, StripState &$stripState ){
        $parser->getOutput()->addModuleStyles( 'ext.bootstrap.styles' );
        $parser->getOutput()->addModules( 'ext.bootstrap.scripts' );
        return true;
};
$wgDefaultUserOptions['skin-responsive'] = 1;
$wgHiddenPrefs[] = 'skin-responsive';

