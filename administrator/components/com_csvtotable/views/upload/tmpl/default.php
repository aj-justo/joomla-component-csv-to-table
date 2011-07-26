<?php
/**
 * @version      $Id$
 * @package      csvToTable
 * @copyright    Copyright (C) 2011 Angel Justo. All rights reserved.
 * @license      GNU/GPL
 * @link         http://ajweb.eu
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>CSV to Table</title>

</head>
<body class="contentpane">

	<h2>Select a CSV file to import into DB</h2>
	<form enctype="multipart/form-data" method="POST" action="" >
		<input type="file" name="csvfile" />
	</form>

</body>
</html>