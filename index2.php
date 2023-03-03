<?php
// SNMP parameters
$switchIP = "10.181.2.210"; // replace with your switch IP address
$username = "snmpuser"; // replace with your SNMPv3 username
$authPass = "snmpauthcred"; // replace with your SNMPv3 authentication password
$privPass = "snmpauthcred"; // replace with your SNMPv3 privacy password

// SNMP OIDs for interface information
$ifDescrOID = "1.3.6.1.2.1.2.2.1.2"; // interface description
$ifTypeOID = "1.3.6.1.2.1.2.2.1.3"; // interface type
$ifSpeedOID = "1.3.6.1.2.1.2.2.1.5"; // interface speed
$ifStatusOID = "1.3.6.1.2.1.2.2.1.8"; // interface status

// Connect to the switch using SNMPv3
$session = new SNMP(SNMP::VERSION_3, $switchIP, $username, "authPriv", $authPass, $privPass);

// Retrieve interface information
$ifDescrList = $session->walk($ifDescrOID);
$ifTypeList = $session->walk($ifTypeOID);
$ifSpeedList = $session->walk($ifSpeedOID);
$ifStatusList = $session->walk($ifStatusOID);

// Display interface information in a table
echo "<table>";
echo "<tr><th>Description</th><th>Type</th><th>Speed</th><th>Status</th></tr>";
foreach ($ifDescrList as $index => $ifDescr) {
    $ifType = $ifTypeList[$index];
    $ifSpeed = $ifSpeedList[$index];
    $ifStatus = $ifStatusList[$index];
    echo "<tr><td>$ifDescr</td><td>$ifType</td><td>$ifSpeed</td><td>$ifStatus</td></tr>";
}
echo "</table>";
?>
