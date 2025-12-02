<?php

    $section = !empty($_REQUEST['filename'])?$_REQUEST['filename']:"";
    $doctype = !empty($_REQUEST['doctype'])?$_REQUEST['doctype']:"";
    //$forav = !empty($_REQUEST['forav'])?$_REQUEST['forav']:"";
    $filename = $section;
    if($filename != "" && file_exists('../../uploads/'.$doctype .'/'.$filename))
    {
        $file = $filename; // Decode URL-encoded string
        $filepath = '../../uploads/'.$doctype .'/'.$filename;

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    }
?>