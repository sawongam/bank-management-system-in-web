<?php
// PP Check
$extensions = ['jpg', 'jpeg', 'png', 'gif'];
$pp_default = "./img/pp_default.jpg";
$pp = $pp_default; // Default to the default image

foreach ($extensions as $extension) {
    $pp_acc = "./img/pp_" . $_SESSION['AccNo'] . "." . $extension;
    if (file_exists($pp_acc)) {
        $pp = $pp_acc;
        break; // Exit the loop as soon as we find an image
    }
}