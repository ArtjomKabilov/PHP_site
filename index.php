<?php
// SNMP parameters
$switchIP = "10.181.2.210"; // replace with your switch IP address
$User = "snmpuser"; // replace with your SNMP community string
$password = "snmpauthcred";

// SNMP OID for system description
$sysDescrOID = "1.3.6.1.2.1.1.1.0";

// Connect to the switch using SNMP
$session = new SNMP(SNMP::VERSION_3, $switchIP, $User, $password);
$sysDescr = $session->get($sysDescrOID);

// Display the system description
echo "Switch system description: $sysDescr";
?>
