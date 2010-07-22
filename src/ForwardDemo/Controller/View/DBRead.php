<?php
declare(encoding = "utf-8");
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
 * @copyright  2010 The Authors
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @version    SVN: $Id: $
 * @link       http://forwardfw.sourceforge.net
 * @since      File available since Release 0.0.7
 */

/**
 *
 */
require_once 'ForwardFW/Controller/View.php';
require_once 'ForwardFW/Controller/DataHandler.php';

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
class ForwardDemo_Controller_View_DBRead extends ForwardFW_Controller_View
{
    /**
     * The Input of the user
     *
     * @var string
     */
    private $strInput = '';

    /**
     * Setter for strInput
     *
     * @param string $_strInput The string.
     *
     * @return void
     */
    public function setInput($_strInput)
    {
        $this->strInput = $_strInput;
    }

    /**
     * Processes the View.
     *
     * @return void
     */
    public function processView()
    {
        $templater = ForwardFW_Templater::factory($this->application);
        $handler = ForwardFW_Controller_DataHandler::getInstance($this->application);
        $arData = $handler->loadFrom(
            'default',
            array(
                'select' => '*',
                'from' => 'forwarddemo',
            )
        );
        $templater->setVar('arData', $arData);
        return parent::processView();
    }
}
?>