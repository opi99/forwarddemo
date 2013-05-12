<?php

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', true);

require_once '../../forwardfw/config.php';

ini_set('include_path', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'src' . PATH_SEPARATOR . ini_get('include_path'));
ini_set('include_path', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'libs' . PATH_SEPARATOR . ini_get('include_path'));

$GLOBALS['ForwardFW\\Filter\\RequestResponse'] = array(
    'ForwardFW\\Filter\\RequestResponse\\FirePHP',
    'ForwardFW\\Filter\\RequestResponse\\Application',
);

$GLOBALS['ForwardFW\\Application']            = array(
    'class' => 'ForwardFW\\Controller\\Application',
    'name'  => 'SimpleFormDemo',
);

$GLOBALS['ForwardFW\\Templater']              = array(
    'Templater' => 'ForwardFW\\Templater\\Smarty',
//     'Templater' => 'ForwardFW\\Templater\\Twig',
);

$GLOBALS['ForwardFW\\Templater\\Smarty']       = array(
    'CompilePath'  => getcwd() . '/../cache/',
    'TemplatePath' => getcwd() . '/../data/templates/smarty',
);

$GLOBALS['ForwardFW\\Templater\\Twig']         = array(
    'CompilePath'  => getcwd() . '/../cache/',
    'TemplatePath' => getcwd() . '/../data/templates/twig',
);

$GLOBALS['SimpleFormDemo']['screens']        = array(
    'Input'     => 'ForwardDemo\\Controller\\Screen\\Input',
    'Textfield' => 'ForwardDemo\\Controller\\Screen\\Textfield',
    'Database'  => 'ForwardDemo\\Controller\\Screen\\Database',
    'Cache'     => 'ForwardDemo\\Controller\\Screen\\Cache',
);
