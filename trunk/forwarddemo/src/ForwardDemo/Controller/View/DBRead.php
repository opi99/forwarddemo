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
 * @copyright  2010-2015 The Authors
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link       http://forwardfw.sourceforge.net
 * @since      File available since Release 0.0.7
 */

namespace ForwardDemo\Controller\View;

/**
 * This class is a Demo Screen class to read from Database.
 *
 * @category   Application
 * @package    ForwardDemo
 * @subpackage Controller
 * @author     Alexander Opitz <opitz.alexander@primacom.net>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link       http://forwardfw.sourceforge.net
 */
class DBRead extends \ForwardFW\Controller\View
{
    /**
     * Processes the View.
     *
     * @return void
     */
    public function processView()
    {
        $dataHandler = $this->application->getServiceManager()->getService('ForwardFW\\Controller\\DataHandlerInterface');

        $data = $dataHandler->loadFromCached(
            'default',
            array(
                'select' => '*',
                'from' => 'forwarddemo',
            )
        );

        $templater = $this->application->getTemplater();
        $templater->setVar('arData', $data);

        return parent::processView();
    }
}
