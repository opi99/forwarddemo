<?php

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', true);

set_include_path(dirname(__FILE__) . '/../forwardfw/src' . PATH_SEPARATOR . get_include_path());
set_include_path(dirname(__FILE__) . '/src' . PATH_SEPARATOR . get_include_path());
set_include_path(dirname(__FILE__) . '/../forwardfw/libs' . PATH_SEPARATOR . get_include_path());
set_include_path(dirname(__FILE__) . '/libs' . PATH_SEPARATOR . get_include_path());

require_once 'ForwardFW/Autoloader.php';

$GLOBALS['ForwardFW\\Filter\\RequestResponse'] = array(
    (new ForwardFW\Config\Filter\RequestResponse\FirePhp()),
    (new ForwardFW\Config\Filter\RequestResponse\RegisterServices())
        ->addService(
            (new ForwardFW\Config\Service\DataHandler\Mdb2())
                ->setDsn('mysqli://john:doe@localhost/forwardfw')
                ->setTablePrefix('')
        ),
    (new ForwardFW\Config\Filter\RequestResponse\Application())
        ->setConfig(
            (new ForwardFW\Config\Application())
                ->setName('SimpleFormDemo')
                ->setScreens(
                    array(
                        'Input'     => 'ForwardDemo\\Controller\\Screen\\Input',
                        'Textfield' => 'ForwardDemo\\Controller\\Screen\\Textfield',
                        'Database'  => 'ForwardDemo\\Controller\\Screen\\Database',
                        'Cache'     => 'ForwardDemo\\Controller\\Screen\\Cache',
                    )
                )
                ->setIdent('SimpleFormDemo')
                ->setTemplaterConfig(
                    (new ForwardFW\Config\Templater\Smarty())
                        ->setCompilePath(getcwd() . '/../cache/')
                        ->setTemplatePath(getcwd() . '/../data/templates/smarty')
                )
        )
);
