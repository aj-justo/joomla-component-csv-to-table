<?php
/**
 * @version      $Id$
 * @package      csvToTable
 * @copyright    Copyright (C) 2011 Angel Justo. All rights reserved.
 * @license      GNU/GPL
 * @link         http://ajweb.eu
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

class csvtotableController extends JController{

    function display() {
		//JRequest::getCmd(var, default value *, get or post * )
    	$viewName	= JRequest::getCmd( 'view', 'upload' );
        $viewLayout = JRequest::getCmd( 'layout', 'default' );

        // get the view & set the layout
        $view = & $this->getView( $viewName,  'html');
        $view->setLayout( $viewLayout );

        // Get/Create the model
        if ( $model = & $this->getModel( $viewName ) ) {
            // Push the model into the view (as default)
            $view->setModel( $model, true );
        }

        // Display the view
        $view->display();
		
        parent::display();
		
    }
}
