<?php 
getFileList('../../../storage/*');

function getFileList($path) {
    $files = glob($path);
    $array = array();
    foreach($files as $file) {
        $array[] = array('src' => $file, 'selected' => false);
    }
    $res = json_encode($array, JSON_PRETTY_PRINT);
    echo $res;
}
?>