<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json;charset=utf-8');
require_once __DIR__ . '/../api/web_config.php';

set_time_limit ( 60000 );

use \Psr\Http\Message\ResponseInterface as Response; // ไลบราลี้สำหรับจัดการคำร้องขอ
use \Psr\Http\Message\ServerRequestInterface as Request; // ไลบราลี้สำหรับจัดการคำตอบกลับ

require './vendor/autoload.php'; // ดึงไฟ์ autoload.php เข้ามา
//include_once './class.oracle.php'; // Class Connect Oracle
include_once './util.php'; // ดึงไฟ์ util.php เข้ามา
include_once './web_config.php';
$app = new \Slim\App; // สร้าง object หลักของระบบ

date_default_timezone_set("Asia/Bangkok");

function ConnectDbAll($_sql){
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
      echo "Connect Data Base error";
    }
  }
  oci_close($conn);
  return $DataRows;
 
}
function ConnectDbnoAll($_sql){
  $DataRows = array();
  $conn = ConnectedDBSO();
  if(!$conn){
    $_err = oci_error();
    echo $_err;
  }else{
    $objParse = oci_parse($conn,$_sql);
    $objEx = oci_execute($objParse);
    if($objEx){
      
    }else{
      echo "Connect Data Base error";
    }
  }
  oci_close($conn);
  return $DataRows;
  
}

  $app->post('/find_all_data', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url
      
    $username = isset($_REQUEST['USERNAME']) ? $_REQUEST['USERNAME'] : '';

    $_sql = "SELECT  DISTINCT M.ORDER_NO,M.ORDER_DATE,QH.RQN_APPROVED,QH.CUSTOMER_ID, QH.CUSTOMER_NAME, QH.TEAM_NAME
    FROM SF5.DFIT_MORDER M, SF5.DFIT_DORDER D, SF5.DFIT_QN_RED QD, SF5.DFIT_QN_REH QH
    WHERE M.ORDER_NO=D.ORDER_NO
    AND M.ORDER_NO=QH.ORDER_NO
    AND D.ORDER_NO=QD.ORDER_NO
    AND D.LINE_ID=QD.LINE_ID
    AND QH.TEAM_NAME in (SELECT TEAM FROM  WEBCONTROL.CTL_USER_APP_SYSTEM@BIS.WORLD AP WHERE AP.APPROVE_SYS='Approve QN' and AP.POSITION = 'DVM' and AP.ACTIVE='Y' and AP.USER_ID = 'IT-LOGON')
    AND M.ENTRY_DATE >= TO_DATE('08/08/2022','DD/MM/RRRR')
    AND QD.CONFIRM_PLAN = 'CONFIRM'
    AND NVL(QD.CONTRACT_ORDERED,0) > 0
    AND QH.APPROVED_VP_BY  IS NULL
    ORDER BY 1
    ";
    $result_out = new stdClass();
    $DataRows = [];
    $resultArray = array(); //data
    $DataRows = ConnectDbAll($_sql);
  
    if ($DataRows != false) {
      foreach ($DataRows as $row) {
        array_push($resultArray, $row);
      }
      $result_out->data =  $resultArray;
      $result_out->status = (true);
    } else {
      $result_out->data =  $resultArray;
      $result_out->status = (false);
    }
  
    $SearchArray = [];
  
    $resultArray2 = array();
    array_push($resultArray2, $SearchArray);
    $response->getBody()->write(json_encode($result_out)); // สงคำตอบกลับ
  
    return $response; // ส่งคำตอบกลับร้า
  });

  $app->post('/find_detail_qn', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url

  

    $qn_no = isset($_REQUEST['QN_NO']) ? $_REQUEST['QN_NO'] : '';
    

  $_sql = "SELECT m.*, (SELECT EXPIRED_DATE FROM  DFIC_MORDER o WHERE o.ORDER_NO = m.ORDER_NO) EXPIRED_DATE 
  FROM DFIT_QN_REH m
  WHERE ORDER_NO = '".$qn_no."'";
  
 $result_out = new stdClass();
    $DataRows = [];
    $resultArray = array(); //data
    $DataRows = ConnectDbAll($_sql);
  
    if($DataRows != false){
    foreach ($DataRows as $row){
      array_push($resultArray,$row);
    }
    $result_out->data =  $resultArray;
    $result_out->status = (true);
    $result_out->sql = $_sql;
  }else{
    $result_out->data =  $resultArray;
    $result_out->status = (false);
    $result_out->sql = $_sql;
  }
  
    $SearchArray = [
  
    ];
  
  $resultArray2 = array();
  array_push($resultArray2,$SearchArray);  
  $response->getBody()->write(json_encode($result_out)); // สงคำตอบกลับ
    return $response; // ส่งคำตอบกลับร้า
  });

  $app->post('/find_option_qn', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url

  

    $line_id = isset($_REQUEST['LINE_ID']) ? $_REQUEST['LINE_ID'] : '';
    

  $_sql = "SELECT OP_NAME
  FROM DFIT_QN_RQO
  WHERE OP_TYPE = 'OPTION'
  AND  LINE_ID =  '".$line_id."'
  ";
  
 $result_out = new stdClass();
    $DataRows = [];
    $resultArray = array(); //data
    $DataRows = ConnectDbAll($_sql);
  
    if($DataRows != false){
    foreach ($DataRows as $row){
      array_push($resultArray,$row);
    }
    $result_out->data =  $resultArray;
    $result_out->status = (true);
    $result_out->sql = $_sql;
  }else{
    $result_out->data =  $resultArray;
    $result_out->status = (false);
    $result_out->sql = $_sql;
  }
  
    $SearchArray = [
  
    ];
  
  $resultArray2 = array();
  array_push($resultArray2,$SearchArray);  
  $response->getBody()->write(json_encode($result_out)); // สงคำตอบกลับ
    return $response; // ส่งคำตอบกลับร้า
  });

  $app->post('/find_remark_qn', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url

  

    $line_id = isset($_REQUEST['LINE_ID']) ? $_REQUEST['LINE_ID'] : '';
    

  $_sql = "SELECT OP_NAME
  FROM DFIT_QN_RQO
  WHERE OP_TYPE = 'PROCESS'
  AND  LINE_ID =  '".$line_id."'
  ";
  
 $result_out = new stdClass();
    $DataRows = [];
    $resultArray = array(); //data
    $DataRows = ConnectDbAll($_sql);
  
    if($DataRows != false){
    foreach ($DataRows as $row){
      array_push($resultArray,$row);
    }
    $result_out->data =  $resultArray;
    $result_out->status = (true);
    $result_out->sql = $_sql;
  }else{
    $result_out->data =  $resultArray;
    $result_out->status = (false);
    $result_out->sql = $_sql;
  }
  
    $SearchArray = [
  
    ];
  
  $resultArray2 = array();
  array_push($resultArray2,$SearchArray);  
  $response->getBody()->write(json_encode($result_out)); // สงคำตอบกลับ
    return $response; // ส่งคำตอบกลับร้า
  });

  $app->post('/find_knit_plan', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url

  

    $line_id = isset($_REQUEST['LINE_ID']) ? $_REQUEST['LINE_ID'] : '';
    

  $_sql = "SELECT S.SEQ, M.*
  FROM DFIT_QN_PLAN_SEQ S, (SELECT M.* FROM DFIT_QN_RED_PLAN M WHERE PLAN_TYPE = 'KNIT') M
  WHERE S.SEQ = M.PLAN_SEQ
  AND LINE_ID = '".$line_id."'
  ORDER BY PERIOD_WEEK
  
  ";
  
 $result_out = new stdClass();
    $DataRows = [];
    $resultArray = array(); //data
    $DataRows = ConnectDbAll($_sql);
  
    if($DataRows != false){
    foreach ($DataRows as $row){
      array_push($resultArray,$row);
    }
    $result_out->data =  $resultArray;
    $result_out->status = (true);
    $result_out->sql = $_sql;
  }else{
    $result_out->data =  $resultArray;
    $result_out->status = (false);
    $result_out->sql = $_sql;
  }
  
    $SearchArray = [
  
    ];
  
  $resultArray2 = array();
  array_push($resultArray2,$SearchArray);  
  $response->getBody()->write(json_encode($result_out)); // สงคำตอบกลับ
    return $response; // ส่งคำตอบกลับร้า
  });

  $app->post('/find_ship_plan', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url

  

    $line_id = isset($_REQUEST['LINE_ID']) ? $_REQUEST['LINE_ID'] : '';
    

  $_sql = "SELECT S.SEQ, M.*
  FROM DFIT_QN_PLAN_SEQ S, (SELECT M.* FROM DFIT_QN_RED_PLAN M WHERE PLAN_TYPE = 'SHIP' AND ITEM_1='PRODUCTION') M
  WHERE S.SEQ = M.PLAN_SEQ
  AND LINE_ID = '".$line_id."'
  ORDER BY PERIOD_WEEK
  
  ";
  
 $result_out = new stdClass();
    $DataRows = [];
    $resultArray = array(); //data
    $DataRows = ConnectDbAll($_sql);
  
    if($DataRows != false){
    foreach ($DataRows as $row){
      array_push($resultArray,$row);
    }
    $result_out->data =  $resultArray;
    $result_out->status = (true);
    $result_out->sql = $_sql;
  }else{
    $result_out->data =  $resultArray;
    $result_out->status = (false);
    $result_out->sql = $_sql;
  }
  
    $SearchArray = [
  
    ];
  
  $resultArray2 = array();
  array_push($resultArray2,$SearchArray);  
  $response->getBody()->write(json_encode($result_out)); // สงคำตอบกลับ
    return $response; // ส่งคำตอบกลับร้า
  });

  $app->post('/find_data_confirm', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url

  
    $qn_no = isset($_REQUEST['QN_NO']) ? $_REQUEST['QN_NO'] : '';
    
    

  $_sql = "SELECT ITEM_CODE ITEM_CODE
  , TOPDYED_COLOR Color
  , ITEM_LT(ITEM_CODE) ITEM_LT
  , TOTAL_QTY Qty_Qn
  , CONTRACT_ORDERED Qty_Confirm
  , ORDER_NO QN_NO
  , LINE_ID LINE_ID
  FROM DFIT_QN_RED D
  WHERE ORDER_NO = '".$qn_no."'
  AND ACTIVE_STATUS < 5 
  AND CONFIRM_PLAN = 'CONFIRM'
  AND NVL(CONTRACT_ORDERED,0) > 0
  ORDER BY LINE_ID
  ";
  
 $result_out = new stdClass();
    $DataRows = [];
    $resultArray = array(); //data
    $DataRows = ConnectDbAll($_sql);
  
    if($DataRows != false){
    foreach ($DataRows as $row){
      array_push($resultArray,$row);
    }
    $result_out->data =  $resultArray;
    $result_out->status = (true);
    $result_out->sql = $_sql;
  }else{
    $result_out->data =  $resultArray;
    $result_out->status = (false);
    $result_out->sql = $_sql;
  }
  
    $SearchArray = [
  
    ];
  
  $resultArray2 = array();
  array_push($resultArray2,$SearchArray);  
  $response->getBody()->write(json_encode($result_out)); // สงคำตอบกลับ
    return $response; // ส่งคำตอบกลับร้า
  });

  $app->post('/find_customer_po', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url

  
    
    $line_id = isset($_REQUEST['LINE_ID']) ? $_REQUEST['LINE_ID'] : '';
    

  $_sql = "SELECT ORDER_NO,LINE_ID,CUST_PONO,ORDERED_QTY,UOM,ITEM_WEIGHT,ENTRY_DATE,ENTRY_BY,UPDATE_DATE,UPDATE_BY
  FROM DFIT_QN_RED_PO
  WHERE LINE_ID = '".$line_id."'
  ORDER BY CUST_PONO";
  
 $result_out = new stdClass();
    $DataRows = [];
    $resultArray = array(); //data
    $DataRows = ConnectDbAll($_sql);
  
    if($DataRows != false){
    foreach ($DataRows as $row){
      array_push($resultArray,$row);
    }
    $result_out->data =  $resultArray;
    $result_out->status = (true);
    $result_out->sql = $_sql;
  }else{
    $result_out->data =  $resultArray;
    $result_out->status = (false);
    $result_out->sql = $_sql;
  }
  
    $SearchArray = [
  
    ];
  
  $resultArray2 = array();
  array_push($resultArray2,$SearchArray);  
  $response->getBody()->write(json_encode($result_out)); // สงคำตอบกลับ
    return $response; // ส่งคำตอบกลับร้า
  });

  $app->post('/find_ship_plan_confirm', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url

  
    
    $order_no = isset($_REQUEST['ORDER_NO']) ? $_REQUEST['ORDER_NO'] : '';
    $item_code = isset($_REQUEST['ITEM_CODE']) ? $_REQUEST['ITEM_CODE'] : '';
    

  $_sql = "SELECT FG_WEEK, SUM(ORDERED_KGS)ORDERED_KGS
  FROM DFIV_QN_SCM_EDD
  WHERE ORDER_NO =  '".$order_no."' AND ITEM_CODE = '".$item_code."'
  AND NVL(TOPDYED_COLOR, 'NO-COLOR') = 'NO-COLOR'
  GROUP BY FG_WEEK
  ";
  
 $result_out = new stdClass();
    $DataRows = [];
    $resultArray = array(); //data
    $DataRows = ConnectDbAll($_sql);
  
    if($DataRows != false){
    foreach ($DataRows as $row){
      array_push($resultArray,$row);
    }
    $result_out->data =  $resultArray;
    $result_out->status = (true);
    $result_out->sql = $_sql;
  }else{
    $result_out->data =  $resultArray;
    $result_out->status = (false);
    $result_out->sql = $_sql;
  }
  
    $SearchArray = [
  
    ];
  
  $resultArray2 = array();
  array_push($resultArray2,$SearchArray);  
  $response->getBody()->write(json_encode($result_out)); // สงคำตอบกลับ
    return $response; // ส่งคำตอบกลับร้า
  });


  $app->post('/all_approve', function (Request $request, Response $response) { // สร้าง route ขึ้นมารองรับการเข้าถึง url

  
    $remark = isset($_REQUEST['REMARK']) ? $_REQUEST['REMARK'] : '';
    $username = isset($_REQUEST['USERNAME']) ? $_REQUEST['USERNAME'] : '';
    $qn_no = isset($_REQUEST['QN_NO']) ? $_REQUEST['QN_NO'] : '';
    
 
    
   
 $_sql = "UPDATE DFIT_QN_REH SET APPROVED_VP_BY = '".$username."',APPROVED_VP_DATE = SYSDATE,APPROVED_VP_REM = '".$remark."' WHERE ORDER_NO = '".$qn_no."'";
    $result_out = new stdClass();
  
    $DataRows = ConnectDbnoAll($_sql);
  
    if($DataRows != false){
    
   
    $result_out->status = (true);
    $result_out->sql = ($_sql);
    $result_out->message = "Success";
    
  }else{
    
    $result_out->status = (false);
    $result_out->sql = ($_sql);
    $result_out->message = "Failed";
  }
  
    $SearchArray = [
  
    ];
  
  $resultArray2 = array();
  array_push($resultArray2,$SearchArray);
  $response->getBody()->write(json_encode($result_out)); // สงคำตอบกลับ
  
    return $response; // ส่งคำตอบกลับ
  });



$app->run(); //สั่งระบบให้ทำงาน



?>

