<?php
    $md5Ps = md5('12345678');
    $cryptPs = crypt($md5Ps, 'q/bAxDM&IN');
    echo $cryptPs;
?>