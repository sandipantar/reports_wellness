<?php
function count_pages($pdfname) {

  $pdftext = file_get_contents($pdfname);
  $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);

  return $num;
}

$pdfname = 'https://new.wellnessslg.com/assets/pdf/srihari.pdf';
$pages = count_pages($pdfname);

echo $pages;
  
?>