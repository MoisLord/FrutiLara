<?php require_once("../pdfjs/web/viewer.html"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Manual del Sistema - FrutiLara</title>
    <style>
        body { margin: 0; padding: 0; }
        #pdf-viewer { width: 100vw; height: 100vh; border: none; }
    </style>
</head>
<body>
    <iframe
        id="pdf-viewer"
        src="../pdfjs/web/viewer.html?file=../../documento/Manual_Frutilara.pdf"
        allowfullscreen>
    </iframe>
</body>
</html>