<?php
    echo $_SERVER['DOCUMENT_ROOT'];
    move_uploaded_file(
        $_FILES['pdf']['tmp_name'], 
        $_SERVER['DOCUMENT_ROOT'] . "bis/dist/document/test.pdf"
    );
?>