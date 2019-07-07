<?php
  include ("config.php");
  date_default_timezone_set("Asia/Bangkok");

  $logID_M = str_replace("-","",date("Y-m-d"))."-".$_POST["list2"];

  $types = array("อาคารเรียน","ที่ดินและสิ่งก่อสร้าง","ครุภัณฑ์","สื่อการสอน","คอมพิวเตอร์","ไฟฟ้า","อื่นๆ");
  $text = array($_POST["building"],$_POST["land"],$_POST["equipment"],$_POST["media"],$_POST["computer"],$_POST["electric"],$_POST["other"]);
  $line = "------------------------------------------";

  $strSQL2 = "SELECT sc_name FROM school WHERE sc_id ='".$_POST["list2"]."'";
  $objQuery2 = mysql_query($strSQL2);
  $schoolName = mysql_fetch_assoc($objQuery2);

  $messageLine = PHP_EOL.'จาก'.$_POST['username'].PHP_EOL."โรงเรียน".$schoolName["sc_name"].PHP_EOL.$line;

  for($i=0;$i<sizeof($types);$i++){
    if ($text[$i] != ""){

      //new part. เก็บทีละรายการ
      $subText = explode("\n",$text[$i]);
      for ($j=0;$j<sizeof($subText);$j++){
        if ($subText[$j] != ""){
          $strSQL = "INSERT INTO notification (logID_M, logDate, logTime, Username, SchoolArea, SchoolID, SchoolName, Category, Message ) VALUES (
            '".$logID_M."','".date("Y-m-d")."','".date("H:i:s")."','".$_POST["username"]."','".$_POST["list1"]."','".$_POST["list2"]."',
            '".$schoolName["sc_name"]."','".$types[$i]."','".$subText[$j]."')";
        	$objQuery = mysql_query($strSQL);
        }
      }
      //end new part.

/*
      //old part. เก็บรายการ ยาวๆ
      $strSQL = "INSERT INTO notification (logID_M, logDate, logTime, Username, SchoolArea, SchoolID, SchoolName, Category, Message ) VALUES (
        '".$logID_M."','".date("Y-m-d")."','".date("H:i:s")."','".$_POST["username"]."','".$_POST["list1"]."','".$_POST["list2"]."',
        '".$schoolName["sc_name"]."','".$types[$i]."','".$text[$i]."')";
    	$objQuery = mysql_query($strSQL);
      //end old part.
*/
      $messageLine=$messageLine.PHP_EOL.'หมวดหมู่: '.$types[$i].PHP_EOL."เนื้อหา: ".PHP_EOL.$text[$i].PHP_EOL.$line;
    }
  }

  function send_line_notify($message, $token){
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, "message=$message");
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    $headers = array( "Content-type: application/x-www-form-urlencoded", "Authorization: Bearer $token", );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec( $ch );
    curl_close( $ch );
    return $result;
  }

  $token = "BPQeemkLVqwcvIn5rv8gs53XZAOLjk4KNKiSVAHYf2Q";
  echo send_line_notify($messageLine, $token);

  echo '<script language="javascript">'.'alert("แจ้งเตือนสำเร็จ!")'.'</script>';
  header("Refresh:0.1; url=Notify.php");
  mysql_close();
  exit();
?>
