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

namespace ForwardDemo\Controller\View;

/**
 * This class is a Demo Screen class.
 */
class Menu extends \ForwardFW\Controller\View
{
    /**
     * Processes the View.
     *
     * @return void
     */
    public function processView(): string
    {
        $templater = $this->application->getTemplater();
        $templater
            ->setVar('arMenu', $this->application->getScreens())
            ->setVar('strProcessScreen', $this->application->getProcessScreen());

        return parent::processView();
    }
}
