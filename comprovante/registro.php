<?php

 require_once '../vendor/autoload.php';


 $out = '
        <table border="1">
        <tr>
            <th>.name.</th>
            <th>teste</th>
            <th>teste</th>
        </tr>
          <tr>
            <td>123123</td>
            <td>123123</td>
            <td>123123</td>
        </tr>
        </table>
        ';


 




$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($out);
//$mpdf->Output();


$mpdf->Output('arquivos.pdf','F');

// $link = 'http://localhost/www/php/projetoPdf/arquivo.pdf';

// echo "Faça o download ".$link;



