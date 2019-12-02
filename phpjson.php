<?php
$con = mysqli_connect("localhost","root","", "db_ajax");

$json = '{"message": {';
$query = mysqli_query( $con, "select * from message");
$json .= '"pesan": [ ';
while ($x = mysqli_fetch_array($query)) {
    $json .= '{';
    $json .= '"id": "' . $x['message_id'] . '",
    "user": "' . htmlspecialchars($x['username']) . '",
    "text": "' . htmlspecialchars($x['message']) . '",
    "time": "' . $x['post_time'] . '"
    },';

}
    // menghilangkan koma di akhir
$json = substr($json,0,strlen($json)-1);
// var_dump($json);

// lengkapi penutup format json
$json .= ']';
$json .= '}}';

echo $json;

?>