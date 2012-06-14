<?php

/**
 * Initialization file for the Registry extension.
 *
 * Documentation:	 		https://www.mediawiki.org/wiki/Extension:Registry
 * Support					https://www.mediawiki.org/wiki/Extension_talk:Registry
 * Source code:				https://gerrit.wikimedia.org/r/gitweb?p=mediawiki/extensions/Registry.git
 *
 * @file
 * @ingroup Registry
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */

/**
 * This documentation group collects source code files belonging to Registry.
 *
 * @defgroup Registry Registry
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}

if ( version_compare( $wgVersion, '1.20c', '<' ) ) { // Needs to be 1.20c because version_compare() works in confusing ways.
	die( '<b>Error:</b> Registry requires MediaWiki 1.20 or above.' );
}

define( 'Registry_VERSION', '0.1 alpha' );

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'Registry',
	'version' => Registry_VERSION,
	'author' => array(
		'', // TODO: link?
	),
	'url' => 'https://www.mediawiki.org/wiki/Extension:Registry',
	'descriptionmsg' => 'registry-desc'
);

$dir = dirname( __FILE__ ) . '/';

// i18n
$wgExtensionMessagesFiles['Registry'] 			= $dir . 'Registry.i18n.php';
$wgExtensionMessagesFiles['RegistryAliases'] 	= $dir . 'Registry.i18n.alias.php';



// Autoloading
$wgAutoloadClasses['Registry\Entry'] 				= $dir . 'includes/Entry.php';
$wgAutoloadClasses['Registry\Hooks'] 				= $dir . 'includes/Hooks.php';
$wgAutoloadClasses['Registry\Pager'] 				= $dir . 'includes/Pager.php';
$wgAutoloadClasses['Registry\Settings'] 			= $dir . 'includes/Settings.php';
$wgAutoloadClasses['Registry\Table'] 				= $dir . 'includes/Table.php';

$wgAutoloadClasses['Registry\Special'] 				= $dir . 'includes/specials/Registry.php';



// Hooks
$wgHooks['LoadExtensionSchemaUpdates'][] 			= 'Registry\Hooks::onSchemaUpdate';
$wgHooks['UnitTestsList'][]							= 'Registry\Hooks::registerUnitTests';



// Special page registration
$wgSpecialPages['Registry'] 						= 'Registry\Special';



$wgLogTypes[] = 'registry';
//$wgLogActionsHandlers['registry/*'] = 'Registry\LogFormatter';



$wgAvailableRights[] = 'registry-view'; // View the registry
$wgAvailableRights[] = 'registry-add'; // Add to the registry
$wgAvailableRights[] = 'registry-update'; // Update items in the registry
$wgAvailableRights[] = 'registry-delete'; // Delete items in the registry



// API module registration
$wgAPIListModules['registry'] 						= 'Registry\Query';
$wgAPIModules['registrywrite'] 						= 'Registry\Write';



$egRegistrySettings = array();
