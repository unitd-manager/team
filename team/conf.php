<?
$config['cp.TimeZone'] = 'Asia/Hong_Kong';
date_default_timezone_set($config['cp.TimeZone']);

define('CP_HOST', $_SERVER['HTTP_HOST']);

$docRoot = $_SERVER['DOCUMENT_ROOT'];
//================================================================//
if (CP_HOST == "team.smartprosoft.com" || CP_HOST == "www.team.smartprosoft.com") {
    define('CP_ENV', 'production');
    define('CP_CORE_PATH', $docRoot . '/cmspilotv30/');

} else if (CP_HOST == "team.localhost") {
    $docRoot = $_SERVER['DOCUMENT_ROOT'];
    $rootFolder = substr($docRoot, 0, stripos($docRoot, '/team/'));

    define('CP_ENV', 'local');
    define('CP_CORE_PATH', 'D:/USS Projects/team/team/cmspilotv30/');
}

define('CP_PATH', CP_CORE_PATH . 'CP/');
//================================================================//
require_once(CP_PATH . 'common/lib/inc_path.php');

/*** Local Server **/
$config['local'] = array(
     'db' => array(
          'host'     => 'localhost'
         ,'username' => 'root'
         ,'password' => @$_SERVER['dbPassword']
         ,'dbname'   => 'team'
     )
    ,'display_errors' => true
);

/*** Development Server **/
$config['development'] = $config['local'];
$config['development']['db']['username'] = 'team';
$config['development']['db']['password'] = 's1m2a3r4t5c6o';

/*** Testing Server **/
$config['testing'] = $config['development'];
$config['testing']['db']['dbname']   = 'teamtestsite';
$config['testing']['db']['username'] = 'teamtestsite';
$config['testing']['db']['password'] = 'N>~WV}J#h6i^';
$config['testing']['display_errors'] = true;

/*** Production Server **/
$config['production'] = $config['testing'];
$config['production']['db']['dbname']   = 'team';
$config['production']['db']['username'] = 'team';
$config['production']['db']['password'] = 'lfdIIGxjKGbjd6n';
$config['production']['display_errors'] = true;
//================================================================//
require_once(CP_PATH . 'common/lib/Registry.php');
$cfgCommon = require_once(CP_PATH . 'common/lib/config.php');
$cfgMast = require_once($cfgCommon['cp.masterPath'] . 'lib/config.php');
$cfgLoc  = require_once($cfgCommon['cp.localPath'] . 'lib/config.php');

$cpCfg = array_merge($config, $cfgCommon, $cfgMast, $cfgLoc);
Zend_Registry::set('cpCfg',$cpCfg);
//================================================================//
