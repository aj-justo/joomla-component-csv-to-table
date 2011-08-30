<?php
/**
 * @version      $Id$
 * @package      csvToTable
 * @copyright    Copyright (C) 2011 Angel Justo. All rights reserved.
 * @license      GNU/GPL
 * @link         http://ajweb.eu
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

define('CSVTOTABLE_VERSION', '1.0.0');

// Require the base controller
require_once( JPATH_COMPONENT_ADMINISTRATOR . DS . 'controller.php' );

// Require specific controller if requested
if( $controller = JRequest::getCmd('controller') ) {
    require_once ( JPATH_COMPONENT_ADMINISTRATOR . DS . 'controllers' . DS . $controller . '.php' );
}

// Create the controller
$classname  = 'subidacsvnumerosserieController'.$controller;
$controller = new $classname();

// Perform the Request task
$controller->execute( JRequest::getCmd( 'task' ) );

$controller->redirect();



