<?php

// User permissions
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['createaccount'] = false;

$wgGroupPermissions['user']['edit'] = true;
$wgGroupPermissions['user']['createpage'] = false;
$wgGroupPermissions['user']['move'] = false;
$wgGroupPermissions['user']['reupload'] = false;
$wgGroupPermissions['user']['editcontentmodel'] = false;
$wgGroupPermissions['user']['createaccount'] = false;

$wgGroupPermissions['observer']['edit'] = true;
$wgGroupPermissions['observer']['createpage'] = true;
$wgGroupPermissions['observer']['move'] = true;
$wgGroupPermissions['observer']['reupload'] = true;
$wgGroupPermissions['observer']['editcontentmodel'] = true;
$wgGroupPermissions['observer']['createaccount'] = false;

$wgGroupPermissions['sysop']['edit'] = true;
$wgGroupPermissions['sysop']['createpage'] = true;
$wgGroupPermissions['sysop']['move'] = true;
$wgGroupPermissions['sysop']['reupload'] = true;
$wgGroupPermissions['sysop']['editcontentmodel'] = true;
$wgGroupPermissions['sysop']['createaccount'] = true;

# Protect templates
$wgNamespaceProtection[NS_TEMPLATE] = ['editinterface'];
