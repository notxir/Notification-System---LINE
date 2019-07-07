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
        <li><a href="displayInfo.php">ตารางแสดงผลการแจ้งเตือน</a></li>
        <li><a href="../Explore/exploration.php">Explore.php</a></li>
        <li><a href="../Explore/displayExplored.php">Explore.php</a></li>
    </ul>
    </div>
  </nav>
  <div class="container" style="margin-top:75px">
      <h1 align="center"> ตารางแสดงผลการแจ้งเตือน </h1><br>
      <form action="behindSearch.php" method="POST">
        <input type="text" name="search" placeholder="ค้นหาเดือน, ปี หรือ หมวดหมู่ที่ต้องการ...">
        <select name="dataType">
          <option value="logID">No.</option>
          <option value="logDay">วันที่</option>
          <option value="logMonth">เดือน</option>
          <option value="logYear">ปี</option>
          <option value="Username">ผู้แจ้ง</option>
          <option value="SchoolName">โรงเรียน</option>
          <option value="Category">หมวดหมู่</option>
        </select>
      </form>

      <?php include ("behindDisplay.php");?>
  </div>

</body>

</html>
