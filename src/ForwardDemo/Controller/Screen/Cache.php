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
 * @since      File available since Release 0.0.8
 */

/**
 *
 */
require_once 'ForwardFW/Controller/Screen.php';
require_once 'ForwardFW/Interface/Application.php';

require_once 'ForwardFW/Callback.php';
require_once 'ForwardFW/Cache/Frontend/Function.php';

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
class ForwardDemo_Controller_Screen_Cache extends ForwardFW_Controller_Screen
{
    /**
     * @var string Holds cached data
     */
    private $strCached;

    /**
     * Loads Data for views and defines which views to use.
     * strView is used.
     *
     * @return boolean True if screen wants to be viewed. Necessary for MultiApps.
     */
    public function controlView()
    {
        // Menu View
        $view = $this->loadView('ForwardDemo_Controller_View_Menu');
        $this->addView($view);

        $configCacheSystem = new ForwardFW_Config_CacheSystem();
        $configCacheSystem
            ->setCacheBackend('ForwardFW_Cache_Backend_Session')
            ->setCacheFrontend('ForwardFW_Cache_Frontend_Function');
        $cache = ForwardFW_Cache::getInstance($this->application, $configCacheSystem);

        $cacheCallback = new ForwardFW_Callback(array($this, 'testCache'));

        $configCacheData = new ForwardFW_Config_FunctionCacheData();
        $configCacheData
            ->setCallback($cacheCallback)
            ->setTimeout(5);
        $this->strCached = $cache->getCache($configCacheData);

        return true;
    }

    /**
     * (php-nondoc)
     *
     * @return void
     */
    public function processView()
    {
        $templater = ForwardFW_Templater::factory($this->application);
        $templater->setVar('strInput', $this->strInput);
        $templater->setVar('strCached', $this->strCached);
        return parent::processView();
    }

    /**
     * Generates the String for testing cache.
     *
     * @return string The testputput
     */
    public function testCache()
    {
        return 'Testdata';
    }
}
?>