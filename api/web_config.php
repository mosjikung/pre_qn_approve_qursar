<?php

/* Connect Database */
/* define("BASE_HATCH_HOST", "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.6.79)(PORT = 1521)))(CONNECT_DATA=(SID=NYTG)))");
define("BASE_HATCH_USER", "HATCH");
define("BASE_HATCH_PASSWORD", "HATCH");

define("BASE_RTS_HOST", "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.6.79)(PORT = 1521)))(CONNECT_DATA=(SID=NYTG)))");
define("BASE_RTS_USER", "RTS");
define("BASE_RTS_PASSWORD", "RTS");
 */

/* Set Lang */
date_default_timezone_set("Asia/Bangkok");

/* location */
define("BASE_LOCATION", array('HATCH', 'TC')); //Base_location -> dropdown


/**
 * @param $_LocationID
 */
/* function GetConnectByLocation($_baselocation) //ส่วนของการเลือก baselocation
{
    switch ($_baselocation) {
        case 'HATCH':
            return oci_connect(BASE_HATCH_USER, BASE_HATCH_PASSWORD, BASE_HATCH_HOST, 'AL32UTF8');
            break;
        case 'RTS':
            return oci_connect(BASE_RTS_USER, BASE_RTS_PASSWORD, BASE_RTS_HOST, 'AL32UTF8');
            break;
        default:
            return oci_connect('', '', '', 'AL32UTF8');
            break;
    }
} */


/* $username = "webcontrol"; // Use your username
$password = "webcontrol"; // and your password
$database = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.6.80)(PORT = 1521)))(CONNECT_DATA=(SID=NYTG)))";
function ConnectedDB($username,$password,$database){
    return oci_connect($username, $password, $database, 'AL32UTF8'); 
} */

// $q = oci_parse($c, "");
// if($q != false){
//     // parsing empty query != false
//     if(oci_execute($q){
//         // executing empty query != false
//         if(oci_fetch_all($q, $data, 0, -1, OCI_FETCHSTATEMENT_BY_ROW) == false){
//             // but fetching executed empty query results in error (ORA-24338: statement handle not executed)
//             $e = oci_error($q);
//             echo $e['message'];
//         }
//     }
//     else{
//         $e = oci_error($q);
//         echo $e['message'];
//     }
// }
// else{
//     $e = oci_error($link);
//     echo $e['message'];
// }
define("BASE_HATCH_HOST", "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.6.80  )(PORT = 1521)))(CONNECT_DATA=(SID=NYTG)))");
define("BASE_HATCH_USER", "webcontrol");
define("BASE_HATCH_PASSWORD", "webcontrol");

    /* $username = "webcontrol"; // Use your username
    $password = "webcontrol"; // and your password
$database = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.6.80)(PORT = 1521)))(CONNECT_DATA=(SID=NYTG)))"; */
function ConnectedDB(){
    return oci_connect(BASE_HATCH_USER, BASE_HATCH_PASSWORD, BASE_HATCH_HOST, 'AL32UTF8');
}

define("BASE_SO_HOST", "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.6.74)(PORT = 1521))(CONNECT_DATA=(SID=NYTG)))");
define("BASE_SO_USER", "SF5");
define("BASE_SO_PASSWORD", "OMSF5");
function ConnectedDBSO(){
    return oci_connect(BASE_SO_USER, BASE_SO_PASSWORD, BASE_SO_HOST, 'AL32UTF8');
}
