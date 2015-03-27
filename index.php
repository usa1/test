<!DOCTYPE html>
<html>
<head>
    <title>IpChecker</title>
    <?php include("IpChecker.php"); ?>
</head>
<body>
<?php
$apiKey = 'c54a8b1946269ac0178f3d7385c6a09debd318a58854f11512110fa492f58eb5';
$ips = array(
    '108.132.144.115',
    '72.90.67.140',
    @gethostbyname('speechpad.com')
);
foreach($ips as $ip) {
    $ipchecker = new IpChecker($apiKey, $ip);
    $ipchecker->setKey($apiKey);
    echo "<br>";
    echo "Ip Address: " . $ipchecker->getIp($ip).'<br>';
    echo "City: " . $ipchecker->getCity($ip).'<br>';
    echo "State: " . $ipchecker->getState($ip).'<br>';
    echo "Country: " . $ipchecker->getCountry($ip).'<br>';
    echo "<br><hr>";
}
?>
</body>
</html>