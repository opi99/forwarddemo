<?php

return (new ForwardFW\Config\Runner())
        ->addService(
            (new ForwardFW\Config\Service\DataHandler\Mdb2())
                ->setDsn('mysqli://john:doe@localhost/forwardfw')
                ->setTablePrefix('')
        )
        ->addProcessor(
            new ForwardFW\Config\Filter\RequestResponse\FirePhp()
        )
        ->addProcessor(
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
        )
