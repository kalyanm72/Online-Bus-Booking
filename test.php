<?php
        $ch = curl_init();

        // set url
        $from="Gwalior";
        $to="Bhopal";
        $dat="2020-12-05";
        curl_setopt($ch, CURLOPT_URL, "http://localhost/online3/Read_route_single.php?fromLoc=" . $from . "&toLoc=" . $to . "&dep_date=" . $dat );

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = json_decode(curl_exec($ch));
        print_r(json_encode($output->data));
 ?>
