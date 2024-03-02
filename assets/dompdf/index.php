<?php
use Dompdf\Dompdf;
require_once 'autoload.inc.php';

// function pdf_create($html, $xfilename, $stream=true, $papersize = 'letter', $orientation = 'portrait')
// {

	// Reference the Dompdf namespace
	

	// Instantiate and use the dompdf class
	$dompdf = new Dompdf();
	// Load HTML content
	$html = "
	<table>
		<thead>
			<tr>
				<th>header</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>data</td>
			</tr>
		</tbody>
	</table>"


// }