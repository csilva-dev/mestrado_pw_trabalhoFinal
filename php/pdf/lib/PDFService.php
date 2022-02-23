<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);


class PDFService {

    function generatePDF($cabecalho, $linhas, $cliente) {
        require_once __DIR__ . '/../vendor/tcpdf/tcpdf.php';
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, '', '', array(
            0,
            0,
            0
        ), array(
            255,
            255,
            255
        ));
        $pdf->SetTitle('Fatura Nº - ' . $cabecalho['num']);
        $pdf->SetMargins(20, 10, 20, true);
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once (dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        $pdf->SetFont('helvetica', '', 11);
        $pdf->AddPage();
        $orderedDate = date('d F Y', strtotime($cabecalho['data']));

        require_once __DIR__ . '/../Template/purchase-invoice-template.php';
        $html = getHTMLPurchaseDataToPDF($cabecalho, $linhas, $cliente, $orderedDate);
        $filename = "fatura_-" . $cabecalho['num'];
        $pdf->writeHTML($html, true, false, true, false, '');
        ob_end_clean();
        $pdf->Output($filename . '.pdf', 'I');
    }
}

?>