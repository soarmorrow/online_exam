<?php

if (isset($_POST['data']) && !empty($_POST['data'])):
    $set = json_decode($_POST['data']);
        print_r($set);
endif;
die('error');

