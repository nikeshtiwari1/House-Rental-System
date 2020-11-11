<?php 
session_start();
if(!isset($_SESSION["email"])){
  header("location:../index.php");
}

include("navbar.php");

 ?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

 <div class="container-fluid">
  <ul class="nav nav-pills nav-justified">
    <li class="active" style="background-color: #FFF8DC"><a data-toggle="pill" href="#home">Property Lists</a></li>
    <li style="background-color: #FAF0E6"><a data-toggle="pill" href="#menu1">Owners Details</a></li>
    <li style="background-color: #FFFACD"><a data-toggle="pill" href="#menu2">Tenant Details</a></li>
    <li style="background-color: #FAFACD"><a data-toggle="pill" href="#menu3">Booked Property</a></li>
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <center><h3>Property Lists</h3></center>
      <div class="container-fluid">
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..." title="Type in a name">
            <div style="overflow-x:auto;">
              <table id="myTable">
                <tr class="header">
                  <th>Id.</th>
                  <th>Country</th>
                  <th>Province/State</th>
                  <th>Zone</th>
                  <th>District</th>
                  <th>City</th>
                  <th>VDC/Municipality</th>
                  <th>Ward No.</th>
                  <th>Tole</th>
                  <th>Contact No.</th>
                  <th>Property Type</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Estmated Price</th>
                  <th>Total Rooms</th>
                  <th>Bedroom</th>
                  <th>Living Room</th>
                  <th>Kitchen</th>
                  <th>Bathroom</th>
                  <th>Description</th>
                  <th>Photos</th>
                </tr>
                <?php 
        include("../config/config.php");

        $sql="SELECT * from add_property";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          $property_id=$rows['property_id'];
       ?>
                <tr>
                  <td><?php echo $rows['property_id'] ?></td>
                  <td><?php echo $rows['country'] ?></td>
                  <td><?php echo $rows['province'] ?></td>
                  <td><?php echo $rows['zone'] ?></td>
                  <td><?php echo $rows['district'] ?></td>
                  <td><?php echo $rows['city'] ?></td>
                  <td><?php echo $rows['vdc_municipality'] ?></td>
                  <td><?php echo $rows['ward_no'] ?></td>
                  <td><?php echo $rows['tole'] ?></td>
                  <td><?php echo $rows['contact_no'] ?></td>
                  <td><?php echo $rows['property_type'] ?></td>
                  <td><?php echo $rows['latitude'] ?></td>
                  <td><?php echo $rows['longitude'] ?></td>
                  <td>Rs.<?php echo $rows['estimated_price'] ?></td>
                  <td><?php echo $rows['total_rooms'] ?></td>
                  <td><?php echo $rows['bedroom'] ?></td>
                  <td><?php echo $rows['living_room'] ?></td>
                  <td><?php echo $rows['kitchen'] ?></td>
                  <td><?php echo $rows['bathroom'] ?></td>
                  <td><?php echo $rows['description'] ?></td><td>
<?php $sql2="SELECT * from property_photo where property_id='$property_id'";
        $query=mysqli_query($db,$sql2);

        if(mysqli_num_rows($query)>0)
      {
          while($row=mysqli_fetch_assoc($query)){ ?>
                  <img src="../owner/<?php echo $row['p_photo'] ?>" width="50px">
                <?php }}}} ?>
                </td>
                </tr>
              </table> 
            </div>
    </div>
  </div>


    <div id="menu1" class="tab-pane fade">
      <center><h3>Owner Details</h3></center>
      <div class="container-fluid">
      <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search..." title="Type in a name">

              <table id="myTable2">
                <tr class="header">
                  <th>Id.</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Encrypted Password</th>
                  <th>Phone No.</th>
                  <th>Address</th>
                  <th>Type of Id</th>
                  <th>Id Photo</th>
                </tr>
                <?php 
        include("../config/config.php");

        $sql="SELECT * from owner";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
                <tr>
                  <td><?php echo $rows['owner_id'] ?></td>
                  <td><?php echo $rows['full_name'] ?></td>
                  <td><?php echo $rows['email'] ?></td>
                  <td><?php echo $rows['password'] ?></td>
                  <td><?php echo $rows['phone_no'] ?></td>
                  <td><?php echo $rows['address'] ?></td>
                  <td><?php echo $rows['id_type'] ?></td>
                  <td><img id="myImg" src="../<?php echo $rows['id_photo'] ?>" width="50px"></td>
                  <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                    <div id="caption"></div>
                  </div>
                </tr>
              <?php }} ?>
              </table>   
    </div>
    </div>


    <div id="menu2" class="tab-pane fade">
      <center><h3>Tenant Details</h3></center>
      <div class="container">
      <input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Search..." title="Type in a name">

              <table id="myTable3">
                <tr class="header">
                  <th>Id</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Encrypted Password</th>
                  <th>Phone No.</th>
                  <th>Address</th>
                  <th>Type of Id</th>
                  <th>Id Photo</th>
                </tr>

      <?php 
        include("../config/config.php");
        

        $sql="SELECT * from tenant";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
                <tr>
                  <td><?php echo $rows['tenant_id'] ?></td>
                  <td><?php echo $rows['full_name'] ?></td>
                  <td><?php echo $rows['email'] ?></td>
                  <td><?php echo $rows['password'] ?></td>
                  <td><?php echo $rows['phone_no'] ?></td>
                  <td><?php echo $rows['address'] ?></td>
                  <td><?php echo $rows['id_type'] ?></td>
                  <td><img id="myImg2" src="../<?php echo $rows['id_photo'] ?>" width="50px"></td>

                  <div id="myModal2" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img02">
                    <div id="caption2"></div>
                  </div>

                </tr>
              <?php }} ?>
              </table> 
    </div>
    </div>




    <div id="menu3" class="tab-pane fade">
      <center><h3>Booked Property</h3></center>
      <div class="container">
        <input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="Search..." title="Type in a name">

              <table id="myTable4">
                <tr class="header">
                  <th>Booked Id</th>
                  <th>Booked By</th>
                  <th>Booker Address</th>
                  <th>Property Province</th>
                  <th>Property District</th>
                  <th>Property Zone</th>
                  <th>Property Ward No</th>
                  <th>Property Tole</th>
                  <th>Property Owner</th>
                  <th>Owner Address</th>
                </tr>

      <?php 
        include("../config/config.php");
        

        $sql="SELECT * from booking";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
                <tr>
                  <td><?php echo $rows['booking_id'] ?></td>
                  
        <?php 
        $tenant_id=$rows['tenant_id'];
        $property_id=$rows['property_id'];
        $sql1="SELECT * from tenant where tenant_id='$tenant_id'";
        $result1=mysqli_query($db,$sql1);

        if(mysqli_num_rows($result1)>0)
      {
          while($row=mysqli_fetch_assoc($result1)){
          
       ?>


        <td><?php echo $row['full_name']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <?php 
        $sql2="SELECT * from add_property where property_id='$property_id'";
        $result2=mysqli_query($db,$sql2);

        if(mysqli_num_rows($result2)>0)
      {
          while($ro=mysqli_fetch_assoc($result2)){
          
       ?>


                  <td><?php echo $ro['province']; ?></td>
                  <td><?php echo $ro['district']; ?></td>
                  <td><?php echo $ro['zone']; ?></td>
                  <td><?php echo $ro['ward_no']; ?></td>
                  <td><?php echo $ro['tole']; ?></td>
            <?php 
            $owner_id=$ro['owner_id'];
            $sql3="SELECT * from owner where owner_id='$owner_id'";
            $result3=mysqli_query($db,$sql3);

            if(mysqli_num_rows($result3)>0)
          {
              while($rowss=mysqli_fetch_assoc($result3)){
              
           ?>
                  <td><?php echo $rowss['full_name']; ?></td>
                  <td><?php echo $rowss['address']; ?></td>
                </tr>
              <?php }}}}}}}} ?>
              </table> 
    </div>
    </div>



  </div>
</body>




<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  th = table.getElementsByTagName("th");
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
      for(var j=0; j<th.length; j++){
        td = tr[i].getElementsByTagName("td")[j];      
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)
          {
            tr[i].style.display = "";
            break;
           }
        }
      }
  }
}
</script>

<script>
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
  tr = table.getElementsByTagName("tr");
  th = table.getElementsByTagName("th");
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
      for(var j=0; j<th.length; j++){
        td = tr[i].getElementsByTagName("td")[j];      
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)
          {
            tr[i].style.display = "";
            break;
           }
        }
      }
  }
}
</script>

<script>
function myFunction3() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable3");
  tr = table.getElementsByTagName("tr");
  th = table.getElementsByTagName("th");
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
      for(var j=0; j<th.length; j++){
        td = tr[i].getElementsByTagName("td")[j];      
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)
          {
            tr[i].style.display = "";
            break;
           }
        }
      }
  }
}
</script>
<script>
function myFunction4() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput4");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable4");
  tr = table.getElementsByTagName("tr");
  th = table.getElementsByTagName("th");
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none";
      for(var j=0; j<th.length; j++){
        td = tr[i].getElementsByTagName("td")[j];      
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)
          {
            tr[i].style.display = "";
            break;
           }
        }
      }
  }
}
</script>


              <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>

<script>
// Get the modal
var modal2 = document.getElementById("myModal2");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img2 = document.getElementById("myImg2");
var modalImg2 = document.getElementById("img02");
var captionText2 = document.getElementById("caption2");
img2.onclick = function(){
  modal2.style.display = "block";
  modalImg2.src = this.src;
  captionText2.innerHTML = this.alt;
}
var span2 = document.getElementsByClassName("close")[1];
span2.onclick = function() { 
  modal2.style.display = "none";
}
</script>

