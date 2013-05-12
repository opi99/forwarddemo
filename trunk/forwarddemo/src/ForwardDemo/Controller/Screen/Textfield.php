<?php
/**
 * This file is part of ForwardFW a web application framework.
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * PHP version 5
 *
 * @category   Application
 * @package    ForwardDemo
 * @subpackage Controller
 * @author     Alexander Opitz <opitz.alexander@primacom.net>
 * @copyright  2010-2013 The Authors
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link       http://forwardfw.sourceforge.net
 * @since      File available since Release 0.0.6
 */

namespace ForwardDemo\Controller\Screen;

require_once 'ForwardFW/Controller/Screen.php';
require_once 'ForwardFW/Controller/ApplicationInterface.php';

/**
 * This class is a Demo Screen class.
 *
 * @category   Application
 * @package    ForwardDemo
 * @subpackage Controller
 * @author     Alexander Opitz <opitz.alexander@primacom.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link       http://forwardfw.sourceforge.net
 */
class Textfield extends \ForwardFW\Controller\Screen
{
    /**
     * Constructor
     *
     * @param ForwardFW\Controller\ApplicationInterface $application The running application.
     *
     * @return void
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
    public function controlInput()
    {
        $this->strInput = $this->getParameter('text');
        return true;
    }

    /**
     * Loads Data for views and defines which views to use.
     * strView is used.
     *
     * @return boolean True if screen wants to be viewed. Necessary for MultiApps.
     */
    public function controlView()
    {
        // Menu View
        $view = $this->loadView('ForwardDemo\Controller\View\Menu');
        $this->addView($view);

        // Textfield View
        $view = $this->loadView('ForwardDemo\Controller\View\Textfield');
        $view->setInput($this->strInput);
        $this->addView($view);

        return true;
    }
}
