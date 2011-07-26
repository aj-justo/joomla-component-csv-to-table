<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include '../administrator/components/com_csvtotable/lib/csvToTable.class.php';

class StackTest extends PHPUnit_Framework_TestCase {
	private $csvString;
	private $csvFile = 'test.csv';
	private $csvToTable;
		
	
	public function setUp() {
		$this->csvString = "col1,col2,col3,col4\nthis,that,other,again\nsecondline,other,again,but";
		$this->csvToTable = new csvToTable();
		$this->csvToTable->setDebug(True);
		
		$connectionObject = mysql_connect('ajmacbook.local', 'test1', '23x04');
		mysql_select_db('test', $connectionObject);
		$this->csvToTable->DB_SetConnectionObject($connectionObject);
		
		$execQueryObject = 'mysql_query';
		$this->csvToTable->DB_setExecQueryObject($execQueryObject);		
	}
	
	public function testReadCsv() {
		$csvArray = $this->csvToTable->readCsv($this->csvString, $hasColNames=true);
		$this->assertTrue(is_array($csvArray) and !empty($csvArray) );
		$this->assertTrue(is_resource($this->csvToTable->readCsv($this->csvFile, true)) );
	}
	
	public function testWriteToTable() {
		//$csvArray = $this->csvToTable->readCsv($this->csvString, $hasColNames=true);
		$this->assertTrue(is_resource($this->csvToTable->readCsv($this->csvFile, true)) );
		$this->assertTrue($this->csvToTable->toTable('test'));
	}
}
