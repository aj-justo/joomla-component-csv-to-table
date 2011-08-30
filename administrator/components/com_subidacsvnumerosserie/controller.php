<?php
/**
 * @version      $Id$
 * @package      csvToTable
 * @copyright    Copyright (C) 2011 Angel Justo. All rights reserved.
 * @license      GNU/GPL
 * @link         http://ajweb.eu
 */

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
 
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

class subidacsvnumerosserieController extends JController{

    function display() {
		//JRequest::getCmd(var, default value *, get or post * )
    	$viewName	= JRequest::getCmd( 'view', 'upload' );
        $viewLayout = JRequest::getCmd( 'layout', 'default' );
		

		
		$file = JRequest::getVar('csvfile', null, 'files', 'array');
		if($file) {
			jimport('joomla.filesystem.file');
			//$filename = JFile::makeSafe($file['name']);
			
			$src = $file['tmp_name'];
			require 'lib/csvToTable.class.php';
			$csvToTable = new csvToTable();
			 $JConfig = new JConfig;
			$connectionObject = mysql_connect($JConfig->host, $JConfig->user, $JConfig->password);
			mysql_select_db($JConfig->db, $connectionObject);
			$csvToTable->DB_SetConnectionObject($connectionObject);
			
			//$queryObject = '$connectionObject->setQuery';
			//$csvToTable->DB_SetPrepareQueryObject($queryObject);
			
			$execQueryObject = 'mysql_query';
			$csvToTable->DB_setExecQueryObject($execQueryObject);	
			
			$csvToTable->readCsv($src, $hasColNames=true);
			$csvToTable->toTable('test');			
		}
		
          
		//Set up the source and destination of the file
		
		//$dest = JPATH_ROOT.BI_IMAGE_BASE."myfile.jpg";
		//JFile::upload($src, $dest);
		
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
		
        //parent::display();
		
    }
}
