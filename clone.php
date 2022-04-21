<?php
function CloneExternalPDF($endpoint) {
    $newFileName    = 'filename'; // Specify new filename.
    $oldFileName    = basename($endpoint, '.pdf'); // Or keep the old filename. I'm not the boss of you.
    $path           = 'pdfs/'.$oldFileName.'.pdf'; // Specify location to save to.
    $file_download  = curl_init();

    curl_setopt($file_download, CURLOPT_URL, $endpoint);
    curl_setopt($file_download, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($file_download, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($file_download, CURLOPT_AUTOREFERER, true);
    
    $result = curl_exec($file_download);
    file_put_contents($path, $result);

    return 'https://your-url.com/'.$path;  // Specify your URL
}

$yourPath = CloneExternalPDF('https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf');