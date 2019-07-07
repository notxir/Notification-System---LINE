<html>
<head>
  <title>ระบบแสดงผลการแจ้งความเสียหาย</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="MyStyle.css">
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="Notify.php">NTST</a>
      </div>
      <ul class="nav navbar-nav">
      <li class="active"><a href="displayInfo.php">ตารางแสดงผลการแจ้งเตือน</a></li>
    </ul>
    </div>
  </nav>
  <div class="container" style="margin-top:75px">
      <h1 align="center"> ตารางแสดงผลการแจ้งเตือน </h1><br>
      <?php
        include ("config.php");
        echo "<b>คีย์ที่ใช้ค้นหา: </b>".$_POST["search"]."<br><br>";
        $types = array("logID", "Username", "SchoolName", "Category");
        for ($i=0;$i<sizeof($types);$i++){
          if($_POST["dataType"] == $types[$i]){
            $strSQL = "SELECT * FROM notification WHERE ". $_POST["dataType"] .'="'.$_POST["search"].'"';
            break;
          }
        }
        if ($_POST["dataType"] == "logDay")
          $strSQL = "SELECT * FROM notification WHERE DAY(logDate) ='" .$_POST["search"]. "'";
        else if ($_POST["dataType"] == "logMonth")
          $strSQL = "SELECT * FROM notification WHERE MONTH(logDate) ='".$_POST["search"]."'";
        else if ($_POST["dataType"] == "logYear")
          $strSQL = "SELECT * FROM notification WHERE YEAR(logDate) ='".$_POST["search"]."'";

        $objQuery = mysql_query($strSQL) or die(mysql_error());
          if (mysql_num_rows($objQuery) > 0) {
            echo "<table id='log_table'> <thead> <tr><th>No.</th> <th>วันที่</th> <th>เวลา</th> <th>ผู้แจ้ง</th> <th>โรงเรียน</th> <th>หมวดหมู่</th> <th>ข้อความ</th></tr> </thead>";
            echo "<tbody><tr><td>";
            while($row = mysql_fetch_assoc($objQuery)){
              echo "<tr><td>". $row["logID"]. "</td><td>";
              echo $row["logDate"]. "</td><td>";
              echo $row["logTime"]. "</td><td>";
              echo $row["Username"]. "</td><td>";
              echo $row["SchoolName"]. "</td><td>";
              echo $row["Category"]. "</td><td>";
              echo $row['Message']. "</td>";
              echo "</td></tr>";
            }
          }else
              echo "<b>ไม่พบผลลัพธ์ที่ต้องการ</b>";
          echo "</tbody></table>";
      ?>
      </div>
    </body>
  </html>
