<?php

declare(strict_types=1);

return (new \ForwardFW\Config\Runner\HttpMiddlewareRunner())
        ->addService(
            (new ForwardFW\Config\Service\DataHandler\Pdo())
                ->setDsn('mysql:host=db;port=3306;dbname=db')
                ->setUsername('db')
                ->setPassword('db')
                ->setTablePrefix('')
        )
        ->addService(
            (new \ForwardFW\Config\Service\Logger\ChromeLogger())
        )
        ->addMiddleware(
            new \ForwardFW\Config\Middleware\Logger\ChromeLogger()
        )
        ->addMiddleware(
            (new \ForwardFW\Config\Middleware\Application())
                ->setConfig(
                    (new ForwardFW\Config\Application())
                        ->setName('SimpleFormDemo')
                        ->setScreens([
                            'Input'     => \ForwardDemo\Controller\Screen\Input::class,
                            'Textfield' => \ForwardDemo\Controller\Screen\Textfield::class,
                            'Database'  => \ForwardDemo\Controller\Screen\Database::class,
                            'Cache'     => \ForwardDemo\Controller\Screen\Cache::class,
                        ])
                        ->setIdent('SimpleFormDemo')
                        ->setTemplaterConfig(
                            (new ForwardFW\Config\Templater\Smarty())
                                ->setCompilePath(getcwd() . '/../cache/')
                                ->setTemplatePath(getcwd() . '/../data/templates/smarty')
                        )
                )
        );
