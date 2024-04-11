<?php
    include('../phpqrcode/qrlib.php');
    $badgeID = $_GET['id']; 
    echo "Data received: " . $badgeID; 

    ob_start("callback");
    $debugLog = ob_get_contents();
    ob_end_clean();

    // outputs image directly into browser, as PNG stream
    QRcode::png($badgeID, false, QR_ECLEVEL_M, 15, 5);
