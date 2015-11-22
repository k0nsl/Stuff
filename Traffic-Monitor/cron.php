<?php
$mysqli = mysqli_connect('127.0.0.1','user','pw','db');

function get_url_contents($url){
        $crl = curl_init();
        $timeout = 11;
        curl_setopt ($crl, CURLOPT_URL,$url);
        curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
        $ret = curl_exec($crl);
        curl_close($crl);
        return $ret;
}


/* check connection */

if ($mysqli->connect_errno) {

    echo "Connect failed: %s\n", $mysqli->connect_error;

    exit();

} else {


$query = "SELECT id,uri FROM servers ORDER by id";
	if ($result = $mysqli->query($query)) {

        /* fetch associative array */

        while ($row = $result->fetch_assoc()) {

$server_id = $row['id'];
$url = $row['uri'];
$data = "";
$data = file_get_contents($url);
if ($data == "") {
$data = file_get_contents($url);
}

	$stmt = $mysqli->prepare("SELECT transmitted,mb,mb_in,received FROM traffic WHERE server_id  = ? ORDER BY id DESC LIMIT 1");
	$stmt->bind_param( "i", $server_id); 
	$stmt->execute();
	$stmt->bind_result($transmitted_db,$mb_db,$mb_db_in,$received_db);
	$stmt->fetch();
	$stmt->close();

	echo $transmitted_db;

	$mb = 0;

	list($received,$transmitted) = explode(":", $data);
	echo "<br><br>";
	echo $transmitted;
	$mb = ($transmitted - $transmitted_db) / 1000000.0;
	$mb = $mb / 60;

	if ($mb < 0) {
		$mb = $mb_db;
	}

	$mb_in = ($received - $received_db) / 1000000.0;
        $mb_in = $mb_in / 60;

	if ($mb_in < 0) {
                $mb_in = $mb_db_in;
        }


	$time = time();
	$stmt = $mysqli->prepare("INSERT INTO traffic (server_id,received,transmitted,mb,timestamp,mb_in) VALUES (?,?,?,?,?,?)");
	$stmt->bind_param( "dddddd", $server_id,$received,$transmitted,$mb,$time,$mb_in); 
	$stmt->execute();
	$stmt->close();

	}

}
/* free result set */

$result->free();

sleep(4);

##Cleanup
$query = "SELECT timestamp,id FROM traffic ORDER by timestamp";
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
	$row['timestamp'] = strtotime("+14 minutes", $row['timestamp']);
	if (time() > $row['timestamp']) {
	$stmt = $mysqli->prepare("DELETE FROM traffic WHERE id = ?");
    $stmt->bind_param("i", $row['id']);
    $stmt->execute();
    $stmt->close(); }}
	 /* free result set */
    $result->free();
}
}
?>
