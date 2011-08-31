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

class subidacsvnumerosserieViewUpload extends JView
{
    function display($tpl = null)
    {
    	JToolBarHelper::title( 'CsvToTable v' . CSVTOTABLE_VERSION );
        $bar = & JToolBar::getInstance('toolbar');
		
        $model = &$this->getModel();

		$rows = $model->getFirstRows();

		$this->assignRef( 'rows', $rows );
        parent::display($tpl);
    }
}
