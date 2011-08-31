<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.model' );
 
/**
 * Hello Model
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class SubidanumerosserieModelRows extends JModel
{
    var $rowsLimit = 50;
	var $table     = 'csvtotable';  
   
    function getFirstRows()
    {
        $JConfig = new JConfig;
		$connectionObject = mysql_connect($JConfig->host, $JConfig->user, $JConfig->password);
		mysql_select_db($JConfig->db, $connectionObject);
		
		// get first x rows from the table 
		$rowsSQL = 'SELECT * FROM '.$this->table.' LIMIT '.$this->rowsLimit;
		$rowsQuery = mysql_query($rowsSQL);
          
		if( !$rowsQuery ) return False;

		$rowsArray = mysql_fetch_assoc($rowsQuery);
		return $rowsArray;
    }
}