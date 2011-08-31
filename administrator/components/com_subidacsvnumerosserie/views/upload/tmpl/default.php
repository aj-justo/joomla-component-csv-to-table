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
  <title>Importación de CSV a Base de Datos</title>

</head>
<body class="contentpane">

	<h2>Seleccionar fichero CSV para importar</h2>
	<form enctype="multipart/form-data" method="POST" action=""  >
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		<input type="file" name="csvfile" />
		<input type="submit" value="Upload" />
	</form>
	
	<?php
		if( !empty($this->rows) ):
	?>
	<h3 style="margin-top: 2em;">Muestra de las primeras 50 filas subidas:</h3>
	<table style="border-collapse: collapse; margin-top: 1em; border:1px solid #666" >
		<tr>
		<?php foreach($this->rows[0] as $k=>$v): ?>		
			<th style="padding: 0.5em; background-color: #ccc; border: 1px solid #999"><?php print $k ?></th>		
		<?php endforeach; ?>
		</tr>
		
		<?php foreach( $this->rows as $row ): ?>			
			<tr>
				<?php foreach( $row as $k=>$v ): ?>
					<td style="padding: 0.5em; border: 1px solid #999" ><?php print $v ?></td>
				<?php endforeach; ?>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>

</body>
</html>