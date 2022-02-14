<?php

 require_once '../vendor/autoload.php';


 $out = '
        <table border="1">
        <tr>
            <th>teste</th>
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


$mpdf->Output('arquivoz.pdf','D');

// $link = 'http://localhost/www/php/projetoPdf/arquivo.pdf';

// echo "Faça o download ".$link;



