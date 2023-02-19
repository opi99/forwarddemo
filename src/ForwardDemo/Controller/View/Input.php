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
class Input extends \ForwardFW\Controller\View
{
    /** @var string The Input of the user */
    private string $input = '';

    /**
     * Setter for input string
     */
    public function setInput(string $input): void
    {
        $this->input = $input;
    }

    /**
     * Processes the View.
     */
    public function processView(): string
    {
        $templater = $this->application->getTemplater();
        $templater->setVar('strInput', $this->input);

        return parent::processView();
    }
}
