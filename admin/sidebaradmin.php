<script>
$(document).ready(function(){
    $("button").click(function(){
		
        $("#a").toggle(1000);
		 $("#b").toggle(1000);
    });
});
</script>

<div id="div4" class="sidebar list-group">
<label id="mainlabel">Main</label>
<a href="admindashboard.php" class="list-group-item">
<i class="glyphicon glyphicon-blackboard"></i>  Dashboard</a>

<a href="adminprofile.php" class="list-group-item">
<i class="glyphicon glyphicon-user"></i>  Profile</a>
<div class="dropdown">
<button class="list-group-item dropdown-toggle" data-toggle="dropdown">
<i class="glyphicon glyphicon-edit"></i>  Rooms  <span class="caret"></span></button>

</div>
<a href="addroom.php" class="list-group-item" id="a" style="padding-left:50px;display:none;">
  Add Rooms</a>
<a href="admin.php" class="list-group-item" id="b" style="padding-left:50px;display:none;">
  Manage Rooms</a>
<a href="regcon.php" class="list-group-item"><i class="glyphicon glyphicon-file">
</i>  Student Registration</a>

<a href="managestu.php" class="list-group-item">
<i class="glyphicon glyphicon-edit"></i>  Manage Student</a>
<a href="pending.php" class="list-group-item">
<i class="glyphicon glyphicon-edit"></i>  Pending Requests</a>
<a href="adminchangepass.php" class="list-group-item"><i class="glyphicon glyphicon-duplicate"></i>  Change Password</a>


</div>