<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group html
 * @group rtl
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
require_once('TCPDF/examples/tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 006');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();



// create some HTML content

$head = '<table id="TABELINHA" class="table table-bordered" border="1">
            <thead>
            <tr>
                <th>Prontuário</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Sexo</th>
                <th>Curso</th>
                <th>Campus</th>
                <th>Modalidades</th>
                
            </tr>
            </thead>
            <tbody>
            ';
$tabela = array();
array_push($tabela,$head);
$i=0;
foreach($this->getView()->alunos_inscritos_eventos as $aluno_inscrito_evento) {
    
    $content = '    
        <tr>
            <td>'. $aluno_inscrito_evento->__get('ALU_PRONTUARIO') .'</td>
            <td>'. $aluno_inscrito_evento->__get('ALU_NOME').'</td>
            <td>'. $aluno_inscrito_evento->__get('ALU_CPF').'</td>
            <td>'. $aluno_inscrito_evento->__get('ALU_DATA_NASCIMENTO').'</td>
            <td>'. $aluno_inscrito_evento->__get('ALU_SEXO').'</td>
            <td>'. $aluno_inscrito_evento->__get('CUR_NOME').'</td>
            <td>'. $aluno_inscrito_evento->__get('CAM_NOME').'</td>
            <td>'. $aluno_inscrito_evento->__get('MDE_NOME').'</td>
        </tr>
    ';
    array_push($tabela,$content);
    
    $i++;
    
}
/* print_r($tabela);
exit(); */ 
$footer = "</tbody></table>";

array_push($tabela,$footer);

for($x=0 ; $x < $i+2 ; $x++){
    @$fim .= $tabela[$x];
}
/* print_r($fim);
exit(); */ 


/* print_r($fim);
exit(); */
// output the HTML content
$pdf->writeHTML($fim, true, false, true, false, '');


// reset pointer to the last page
$pdf->lastPage();


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
