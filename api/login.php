<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json;charset=utf-8');

set_time_limit ( 60000 );

use \Psr\Http\Message\ResponseInterface as Response; // ไลบราลี้สำหรับจัดการคำร้องขอ
use \Psr\Http\Message\ServerRequestInterface as Request; // ไลบราลี้สำหรับจัดการคำตอบกลับ

require './vendor/autoload.php'; // ดึงไฟ์ autoload.php เข้ามา
//include_once './class.oracle.php'; // Class Connect Oracle
include_once './util.php'; // ดึงไฟ์ util.php เข้ามา
include_once './web_config.php';
$app = new \Slim\App; // สร้าง object หลักของระบบ

function ConnectDbAll($_sql){
  $DataRows = array();
  $conn = ConnectedDB();
  if(!$conn){
    $_err = oci_error();
    echo $_err;
  }else{
    $objParse = oci_parse($conn,$_sql);
    $objEx = oci_execute($objParse);
    if($objEx){
      $objResult = oci_fetch_all($objParse,$DataRows,null,null, OCI_FETCHSTATEMENT_BY_ROW);
    }else{
      echo "IT's wrong";
    }
  }
  return $DataRows;
}

function ConnectDbNYGM($_sql){
  $DataRows = array();
  $conn = ConnectedDBSO();
  if(!$conn){
    $_err = oci_error();
    echo $_err;
  }else{
    $objParse = oci_parse($conn,$_sql);
    $objEx = oci_execute($objParse);
    if($objEx){
      $objResult = oci_fetch_all($objParse,$DataRows,null,null, OCI_FETCHSTATEMENT_BY_ROW);
    }else{
      echo "IT's wrong";
    }
  }
  return $DataRows;
}

 $app->post('/test', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url

  $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
  $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
  
 
  $_sql = "SELECT C.USER_EMP_ID As EMP_CODE, P.*
  FROM CTL_USER C, NYIS.PS_SALES_SECURITY P
  WHERE C.USER_ID = P.USER_ID
  AND C.USER_ID = '".$name."'
  AND C.USER_PASSWORD = '".$password."'
  AND C.USER_ACTIVE = 'Y'";
  
  $result_out = new stdClass();
  $DataRows = [];
  $resultArray = array();
  $DataRows = ConnectDbAll($_sql);

  if($DataRows != false){
  foreach ($DataRows as $row){
    array_push($resultArray,$row);
  }
  $result_out->data =  $resultArray;
  $result_out->status = (true);
  $result_out->status_login = (true);
  $result_out->sql = $_sql;
}else{
  $result_out->data =  $resultArray;
  $result_out->status = (false);
  $result_out->status_login = (false);
  $result_out->sql = $_sql;
}

  $LoginArray = [

  ];

$resultArray2 = array();
array_push($resultArray2,$LoginArray);
$response->getBody()->write(json_encode($result_out)); // สงคำตอบกลับ

  return $response; // ส่งคำตอบกลับร้า
});


$app->post('/testorg', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url

  $name = isset($_REQUEST['USER_ID']) ? $_REQUEST['USER_ID'] : '';
  
  
 
   $_sql = "SELECT *  FROM MASTER_CUT_USER_CTL WHERE USER_ID = '".$name."'";
  
   $result_out = new stdClass();
  $DataRows = [];
  $resultArray = array();
  $DataRows = ConnectDbNYGM($_sql);

  if($DataRows != false){
  foreach ($DataRows as $row){
    array_push($resultArray,$row);
  }
  $result_out->data =  $resultArray;
  $result_out->status = (true);
  $result_out->status_login = (true);
}else{
  $result_out->data =  $resultArray;
  $result_out->status = (false);
  $result_out->status_login = (false);
}

  $LoginArray = [

  ];

$resultArray2 = array();
array_push($resultArray2,$LoginArray);
$response->getBody()->write(json_encode($result_out)); // สงคำตอบกลับ */

  return $response; // ส่งคำตอบกลับร้า
});

$app->post('/test2', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url
    
  $username = "webcontrol"; // Use your username
$password = "webcontrol"; // and your password
$database = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.6.80)(PORT = 1521)))(CONNECT_DATA=(SID=NYTG)))"; 
$objConnect = oci_connect($username, $password, $database, 'AL32UTF8');
  $strSQL = "SELECT * FROM CTL_USER where user_id = 'pk' and USER_LNAME !='null'";
  $objParse = oci_parse($objConnect, $strSQL);
  oci_execute ($objParse,OCI_DEFAULT);
 while($objResult = oci_fetch_array($objParse,OCI_BOTH)){
      $arr1= array(
        'Status'  => true,
        'member' => $objResult['USER_ID'],
        'NAME' => $objResult['USER_FNAME'],
        'LNAME' => $objResult['USER_LNAME'],
        'LANG' => $objResult['DEFAULT_LANGUAGE'],
      );
      $array2[] = $arr1;
  }
   
   $data = json_encode($array2);
      
  
  $response->getBody()->write($data); // สงคำตอบกลับ

  return $response; // ส่งคำตอบกลับร้า
});

$app->post('/checkuser', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url

    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '';
    $passwordu= isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
  $username = "webcontrol"; // Use your username
 $password = "webcontrol"; // and your password
 $database = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.6.80)(PORT = 1521)))(CONNECT_DATA=(SID=NYTG)))"; 
 $objConnect = oci_connect($username, $password, $database, 'AL32UTF8');
  echo $strSQL = "SELECT * FROM CTL_USER where user_id = '".$user_id."' and password = '".$passwordu."'";
  $objParse = oci_parse($objConnect, $strSQL);
  oci_execute ($objParse,OCI_DEFAULT);
 while($objResult = oci_fetch_array($objParse,OCI_BOTH)){
      $arr1= array(
        'Status'  => true,
        'USER_ID' => $objResult['USER_ID'],
        'NAME' => $objResult['USER_FNAME'],
        'LNAME' => $objResult['USER_LNAME'],
        'LANG' => $objResult['DEFAULT_LANGUAGE'],
        'EMAIL' => $objResult['USER_MAIL'],
        'USER_EMP_ID' => $objResult['USER_EMP_ID']
      );
      $array2[] = $arr1;
  }
    
  $data = json_encode($array2); 
      
  
  $response->getBody()->write($data); // สงคำตอบกลับ

  return $response; // ส่งคำตอบกลับร้า
});
$app->post('/insert', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url
  $role_id = isset($_REQUEST['role_id']) ? $_REQUEST['role_id'] : '';
  $role_description = isset($_REQUEST['role_description']) ? $_REQUEST['role_description'] : '';
  $username = "webcontrol"; // Use your username
$password = "webcontrol"; // and your password
$database = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 172.16.6.80)(PORT = 1521)))(CONNECT_DATA=(SID=NYTG)))"; 
$objConnect = oci_connect($username, $password, $database, 'AL32UTF8');
  $strSQL = "INSERT INTO DOC_ROLE (ROLE_ID,ROLE_DESCRIPTION) VALUES ('".$role_id."','".$role_description."')";
  $objParse = oci_parse($objConnect, $strSQL);
 $check =  oci_execute ($objParse);

    if($check){

      $arr1= array(
        'Status'  => 'success',
        'role_id' => $role_id,
        'role_description' => $role_description
        
      );
    }else{
      $arr1 = array(
        'Status' => 'Failed',
      );
    }
      $array2[] = $arr1;
  
   
   $data = json_encode($array2);
      
  
  $response->getBody()->write($data); // สงคำตอบกลับ

  return $response; // ส่งคำตอบกลับร้า
});


$app->run(); //สั่งระบบให้ทำงาน

?>