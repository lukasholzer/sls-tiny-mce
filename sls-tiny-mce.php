<?php
/*
Plugin Name: SLS TinyMCE Custom Styles
Plugin URI: www.sls-eventservice.at/
Description: Site specific code changes for sls-eventservice.at editor styles
Version: 1.0.1
Author: Lukas Holzer
Author URI: http://www.typeflow.cc/
Copyright: Lukas Holzer
Text Domain: sls-2017-editor
*/


define('FILE_ROOT', dirname(__FILE__));

require_once( FILE_ROOT . '/core/Singleton.php');
require_once( FILE_ROOT . '/components/SLSTinyMCE.php');

class SLS2k17TinyMCE extends Singleton {
    public static $pluginName;
    public static $version;

    const TEXTDOMAIN = 'sls-2017-editor';

    protected function __construct() {

        self::$pluginName = __('SLS TinyMCE Custom Styles', SLS2k17TinyMCE::TEXTDOMAIN);
        self::$version = '1.0.1';

        if ( !is_admin() ) return;

        new SLSTinyMCE();

    }
}

SLS2k17TinyMCE::run();

?>
