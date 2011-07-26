<?php
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
		$this->csvToTable->DB_SetConnectionObject($connectionObject);
		
		$prepareQueryObject = 'mysql_real_escape_string';
		$this->csvToTable->DB_SetPrepareQueryObject($prepareQueryObject);
		
		$execQueryObject = 'mysql_query';
		$this->csvToTable->DB_setExecQueryObject($execQueryObject);		
	}
	
	public function testReadCsv() {
		$this->assertTrue(is_array($this->csvToTable->readCsv($this->csvString, $hasColNames=true)) );
		//$this->assertTrue(is_resource($this->csvToTable->readCsv($this->csvFile, true)) );
	}
	
	public function testWriteToTable() {
		$this->assertTrue($this->csvToTable->toTable('test1'));
	}
}
