<?php include 'check.php';?>

<div id="body">
<?php 
include 'sidebar.php';
?>
<div class="container-fluid">
<h1>User Login<h1>
<hr>

<form action="#" method="post">
<div style="margin-right:200px !important;padding:20px !important;margin-top:30px !important;border:thin solid #000 !important;">
<h1>Login Here</h1>
<table class="table borderless">
<td colspan="2">Enter User Name</td>
</tr>
<tr>
<td colspan="2"><input type="text" name="uname" placeholder="enter username"/></td>
</tr>
<tr>
<td colspan="2">Enter password</td>
</tr>
<tr>
<td colspan="2"><input type="password" name="password" placeholder="enter password"/></td>
</tr>
<tr>

</table>
<input type="submit" value="Login" class="btn btn-info"/>
</div>
</div>
</form>
</div>