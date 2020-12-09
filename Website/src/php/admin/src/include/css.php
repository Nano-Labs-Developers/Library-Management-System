<?php

    /**
     *  Given a file, i.e. /css/base.css, replaces it with a string containing the
     *  file's mtime, i.e. /css/base.1221534296.css.
     *  
     *  @param $file  The file to be loaded.  Must be an absolute path (i.e.
     *                starting with slash).
     */
    function auto_version($file)
    {
    if(strpos($file, '/') !== 0 || !file_exists($_SERVER['DOCUMENT_ROOT'] . $file))
        return $file;

    $mtime = filemtime($_SERVER['DOCUMENT_ROOT'] . $file);
    return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1", $file);
    }

?>

<!-- Custom fonts for this template-->
<link href="<?php echo auto_version("https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.0.7/vendor/fontawesome-free/css/all.min.css"); ?>" rel="stylesheet">
<link href="<?php echo auto_version("https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"); ?>" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php echo auto_version("https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.0.7/css/sb-admin-2.min.css"); ?>" rel="stylesheet">

