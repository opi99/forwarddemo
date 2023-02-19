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
class Input extends \ForwardFW\Controller\Screen
{
    /** @var string text input */
    protected string $text;

    /**
     * @param ForwardFW\Controller\ApplicationInterface $application The running application.
     */
    public function __construct(\ForwardFW\Controller\ApplicationInterface $application)
    {
        parent::__construct($application);
    }

    /**
     * Control the user input, if available.
     *
     * @return boolean True if all user input was accepted.
     */
    public function controlInput(): bool
    {
        $this->text = (string) $this->getParameter('text');
        return true;
    }

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

        // Input View
        $view = $this->loadView(\ForwardDemo\Controller\View\Input::class);
        $view->setInput($this->text);
        $this->addView($view);

        return true;
    }
}
