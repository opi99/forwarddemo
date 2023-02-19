<?php

return (new ForwardFW\Config\Runner())
        ->addService(
            (new ForwardFW\Config\Service\DataHandler\Mdb2())
                ->setDsn('mysqli://john:doe@localhost/forwardfw')
                ->setTablePrefix('')
        )
        ->addService(
            (new \ForwardFW\Config\Service\Logger\ChromeLogger())
        )
        ->addMiddleware(
            new \ForwardFW\Config\Middleware\ChromeLogger()
        )
        ->addMiddleware(
            (new \ForwardFW\Config\Middleware\Application())
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
