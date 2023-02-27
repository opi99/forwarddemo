<?php

declare(strict_types=1);

/**
 * This file is part of ForwardFW a web application framework.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace ForwardDemo\Controller\Screen;

/**
 * This class is a Demo Screen class.
 */
class Cache extends \ForwardFW\Controller\Screen
{
    /** @var string text input */
    protected string $text;

    /**
     * Loads Data for views and defines which views to use.
     * strView is used.
     *
     * @return boolean True if screen wants to be viewed. Necessary for MultiApps.
     */
    public function controlView(): bool
    {
        // Menu View
        $view = $this->loadView(\ForwardDemo\Controller\View\Menu::class);
        $this->addView($view);

        $configCacheBackend = new \ForwardFW\Config\Cache\Backend\File();
        $configCacheBackend->setPath(getcwd() . '/cache/');

        $configCacheFrontend = new \ForwardFW\Config\Cache\Frontend\Caller();
        $configCacheFrontend->setBackendConfig($configCacheBackend);

        $cache = \ForwardFW\Cache\Frontend::getInstance(
            $this->application,
            $configCacheFrontend
        );

        $cacheCallback = new \ForwardFW\Callback(array($this, 'testCache'));

        $configCacheData = new \ForwardFW\Config\Cache\Data\Caller();
        $configCacheData
            ->setCallback($cacheCallback)
            ->setTimeout(5);

        $this->cached = $cache->getCache($configCacheData);

        return true;
    }

    public function processView(): string
    {
        $templater = $this->application->getTemplater();
        $templater->setVar('strCached', $this->cached);

        return parent::processView();
    }

    /**
     * Generates the String for testing cache.
     *
     * @return string The testputput
     */
    public function testCache(): string
    {
        return 'Testdata';
    }
}
