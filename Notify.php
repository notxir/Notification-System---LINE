<html>
<head>
  <title>ระบบการแจ้งเตือนความเสียหาย</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="MyStyle.css">
  <script src="myScript.js"></script>
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
        <li><a href="../Explore/displayExplored.php">displayExplore.php</a></li>
      </ul>
    </div>
  </nav>

  <div class="container" style="margin-top:100px">
    <h1 align="center">
      แบบฟอร์มการแจ้งความต้องการ
    </h1>
    <h3 align="center">
      ครุภัณฑ์ สิ่งก่อสร้าง และสภาพสิ่งแวดล้อมของโรงเรียนภายใต้สังกัด<br>
      สำนักงานเขตพื้นที่การศึกษาประถมศึกษา ฉะเชิงเทราเขต 2
    </h3><br>
    <form action="behindNotify.php" method="POST">
      <div class="row"><!--Username-->
          <label for="username">ชื่อ-นามสกุล</label>
          <input type="text" id="username" name="username" placeholder="ชื่อ-นามสกุล" required>
      </div>

      <div class="row"><!--Select..area/school...-->
        <div class="col-25">
          <label for="areaname">ชื่อเขต</label>
          <select name="list1" id="list1">
            <option value="">เลือกเขต</option>
            <?php
              include "config.php";
              $strSQL = "SELECT * FROM iteczone WHERE 1";
              $objQuery = mysql_query($strSQL);
              while($row = mysql_fetch_assoc($objQuery))
                echo '<option value="'.$row["zone_id"].'">'."เขต".$row["zone_n"].'</option>';
            ?>
          </select>
        </div>
        <div class="col-75">
          <label for="schoolname">ชื่อโรงเรียน</label>
          <select name="list2" id="list2">
            <option value="">เลือกโรงเรียน</option>
          </select>
        </div>
      </div>

      <div class="row">
          <label for="building">หมวดอาคารและสิ่งก่อสร้าง</label>
          <textarea id="subject" name="building" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
      </div>
      <div class="row">
          <label for="land">หมวดไฟฟ้า</label>
          <textarea id="subject" name="electric" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
      </div>
      <div class="row">
          <label for="equipment">หมวดครุภัณฑ์ภายนอกห้องเรียน</label>
          <textarea id="subject" name="inside" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
      </div>
      <div class="row">
          <label for="media">หมวดครุภัณฑ์ภายในห้องเรียน</label>
          <textarea id="subject" name="outside" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
      </div>
      <div class="row">
          <label for="computer">หมวดคอมพิวเตอร์</label>
          <textarea id="subject" name="computer" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
      </div>
      <div class="row">
          <label for="computer">หมวดสื่อการสอน</label>
          <textarea id="subject" name="media" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
      </div>
      <div class="row">
          <label for="other">หมวดอื่นๆ</label>
          <textarea id="subject" name="other" placeholder="กรอกรายละเอียดที่นี่..." style="height:100px"></textarea>
      </div>
      <div class="row" id="submitButton">
        <input type="submit" value="ส่งข้อมูล">
      </div>
    </form>
  </div>
</body>
</html>
