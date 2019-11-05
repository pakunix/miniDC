<?
$mes=date('n');
$ano=date('Y');
$dia=date('d');
$seg=date('s');
$gmt=date('O')*-1;
 $gmt_=str_replace('0','',$gmt);
 if ($gmt_>0){$df=-3+$gmt_;}
 if ($gmt_<0){$df=3+$gmt_;}
 $df=str_replace('-','',$df);
 $hora=date('H');
 if ($gmt<0)
 {
 while ($df!=0)
 {
 --$hora;--$df;
 if ($hora>24){$hora=0;}
 }
 }
 if ($gmt>0)
 {
 while ($df!=0)
 {
 ++$hora;--$df;
 if ($hora<0){$hora=24;}
 }
 }
?>
