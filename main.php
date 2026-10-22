<?php
declare(strict_types=1);
// PO and delivery quantities use integer base units; prices use cents.
function threeWayMatch(int $ordered,int $received,int $invoiced,int $poRate,int $invoiceRate): array {
    if (min($ordered,$received,$invoiced,$poRate,$invoiceRate)<0) {
        throw new InvalidArgumentException('Negative quantities or prices');
    }
    $issues=[];
    if ($received>$ordered) { $issues[]='over-delivery'; }
    if ($invoiced>$received) { $issues[]='unreceived-quantity'; }
    if ($invoiceRate!==$poRate) { $issues[]='price-mismatch'; }
    return ['payable'=>$issues===[],'issues'=>$issues,'invoice_cents'=>$invoiced*$invoiceRate];
}
if (realpath($_SERVER['SCRIPT_FILENAME']??'')===__FILE__) {
    echo json_encode(threeWayMatch(100,80,90,1250,1250),JSON_PRETTY_PRINT).PHP_EOL;
}
