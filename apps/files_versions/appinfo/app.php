<?php

//require_once 'files_versions/versions.php';
OC::$CLASSPATH['OCA\Files_Versions\Storage'] = 'apps/files_versions/lib/versions.php';
OC::$CLASSPATH['OCA\Files_Versions\Hooks'] = 'apps/files_versions/lib/hooks.php';

OCP\Util::addscript('files_versions', 'versions');

// Listen to write signals
OCP\Util::connectHook('OC_Filesystem', 'write', "OCA\Files_Versions\Hooks", "write_hook");
// Listen to delete and rename signals
OCP\Util::connectHook('OC_Filesystem', 'post_delete', "OCA\Files_Versions\Hooks", "remove_hook");
OCP\Util::connectHook('OC_Filesystem', 'rename', "OCA\Files_Versions\Hooks", "rename_hook");
