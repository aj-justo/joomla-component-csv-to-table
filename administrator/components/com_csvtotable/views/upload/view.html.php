<?php
/**
 * J!Dump
 * @version      $Id$
 * @package      jdump
 * @copyright    Copyright (C) 2006-2011 Mathias Verraes. All rights reserved.
 * @license      GNU/GPL
 * @link         https://github.com/mathiasverraes/jdump
 */
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

class csvtotableViewUpload extends JView
{
    function display($tpl = null)
    {
    	JToolBarHelper::title( 'CsvToTable v' . CSVTOTABLE_VERSION );
        $bar = & JToolBar::getInstance('toolbar');
		
        $greeting = "Hello, World!";
		$this->assignRef( 'greeting', $greeting );

        parent::display($tpl);
    }
}
