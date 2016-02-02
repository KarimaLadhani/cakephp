<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;
use App\Controller\IndividualTController;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('Route');

Router::scope('/', function ($routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'IndividualT', 'action' => 'login','login']);
    
    /**
     * ...and connect the rest of 'Pages' controller's URLs.

     */   
   $routes->connect('/login',['controller'=> 'IndividualT','action'=>'login']);
    $routes->connect('/register',['controller'=> 'IndividualT','action'=>'register']);    
    $routes->connect('/dashboard/',['controller'=> 'IndividualT','action'=>'dashboard']);
    $routes->connect('/logout',['controller'=> 'IndividualT','action'=>'logout']);
   	
    $routes->connect('/forgot', ['controller'=>'IndividualT','action'=>'forgot']);
    $routes->connect('/usereditlogin', ['controller'=>'IndividualT','action'=>'usereditlogin']);
    $routes->connect('/usereditprofile',['controller'=>'IndividualT','action'=>'usereditprofile']);
    $routes->connect('/registerexam',['controller'=>'IndividualT','action'=>'registerexam']);
    $routes->connect('/confirmexamregistration',['controller'=>'IndividualT','action'=>'confirmexamregistration']);
	$routes->connect('/confirmexamregistrationcc',['controller'=>'IndividualT','action'=>'confirmexamregistrationcc']);
	$routes->connect('/confirmexamregistrationch',['controller'=>'IndividualT','action'=>'confirmexamregistrationch']);
	$routes->connect('/confirmexamregistrationpc',['controller'=>'IndividualT','action'=>'confirmexamregistrationpc']);
	$routes->connect('/selectmailaddress',['controller'=> 'IndividualT','action'=>'selectmailaddress']);
    $routes->connect('/viewexamhistory',['controller'=> 'IndividualT','action'=>'viewexamhistory']);    
    $routes->connect('/changeworkinfo',['controller'=>'IndividualT','action'=>'changeworkinfo']);
	$routes->connect('/updateworkinfo',['controller'=>'IndividualT','action'=>'updateworkinfo']);
	$routes->connect('/createnewworkinfo',['controller'=>'IndividualT','action'=>'createnewworkinfo']);
	$routes->connect('/retakeexam',['controller'=>'IndividualT','action'=>'retakeexam']);
	$routes->connect('/deferexam',['controller'=>'IndividualT','action'=>'deferexam']);
	$routes->connect('/examconfirmletter',['controller'=>'IndividualT','action'=>'examconfirmletter']);
	
	//The following are paypal redirection URL'S..These need to be updated based on the redirection URLs given by CEPI	
	$routes->connect('/paypalcancel',['controller'=>'IndividualT','action'=>'paypalcancel']);
	$routes->connect('/paypalerror',['controller'=>'IndividualT','action'=>'paypalerror']);
	$routes->connect('/paypalsuccess',['controller'=>'IndividualT','action'=>'paypalsuccess']);
	
	
	//THE FOLLOWING ROUTES ARE FOR ADMIN ONLY
	$routes->connect('/admin/login',['controller'=> 'AdministratorT','action'=>'login']);
	$routes->connect('/admin/logout',['controller'=> 'AdministratorT','action'=>'logout']);
	$routes->connect('/admin/menuboard',['controller'=> 'AdministratorT','action'=>'menuboard']);
	$routes->connect('/admin/createexam', ['controller'=>'ExaminationT','action'=>'createexam']);	
	$routes->connect('/admin/displayexam', ['controller'=>'ExaminationT','action'=>'displayexam']);
	$routes->connect('/admin/displayregisteredstudentsforexam/*',['controller'=> 'ExaminationT','action'=>'displayregisteredstudentsforexam']);
    $routes->connect('/admin/displayceapp',['controller'=> 'CeApplicationT','action'=>'displayceapp']);	
    //$routes->connect('/admin/logout',['controller'=> 'AdministratorT','action'=>'logout']);
	
    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `InflectedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'InflectedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    /*$routes->fallbacks('InflectedRoute');*/
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
