<?php
    include('../phpqrcode/qrlib.php');
    // outputs image directly into browser, as PNG stream
    QRcode::png('https://cs.sfasu.edu/csci4267-00102/BackFrontEndStrikesBack/webapp/');
    // echo '<img src="example_001_simple_png_output.php" />';
