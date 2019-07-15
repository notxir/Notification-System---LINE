<?php
  include ("config.php");
  $strSQL = "SELECT * FROM notification WHERE 1";
	$objQuery = mysql_query($strSQL);

  if ($objQuery) {
    echo "<table id='log_table'> <thead> <tr><th>No.</th> <th>วันที่</th> <th>เวลา</th> <th>ผู้แจ้ง</th> <th>โรงเรียน</th> <th>หมวดหมู่</th>
     <th>ข้อความ</th> <th>สถานะ</th> </tr> </thead>";
    echo "<tbody><tr><td>";
    while($row = mysql_fetch_assoc($objQuery)){
      echo "<tr><td>".$row["logID"]."</td><td>";
      echo $row["logDate"]. "</td><td>";
      echo $row["logTime"]. "</td><td>";
      echo $row["Username"]. "</td><td>";

      $strSQL2 = "SELECT sc_name FROM school WHERE sc_id ='".$row["SchoolID"]."'";
      $objQuery2 = mysql_query($strSQL2);
      $schoolName = mysql_fetch_assoc($objQuery2);

      echo $schoolName[sc_name]. "</td><td>";
      echo $row["Category"]. "</td><td>";
      echo $row["Message"]. "</td><td>";
      if ($row["status"] == 1){
        echo "<font color=".'"'."61F941".'"'.">ตรวจสอบแล้ว</font>" . "</td>";
      }else{
        echo "<font color=".'"'."FAA857".'"'.">รอการยืนยัน</font>" . "</td>";
      }
      echo "</td></tr>";
    }
  }else
      echo "0 results";

  echo "</tbody></table>";
?>
