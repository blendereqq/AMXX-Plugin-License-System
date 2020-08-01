<?php
$title ='User CP';
include 'master/nav.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: login.php");
    exit;
}
if ($_SESSION["id"] !== 1)
{
    header("location: index.php");
}
?>
	<legend>User Control Panel</legend>
		<div class="well sidebar-nav">
		<form action="adduser.php">
			<input class="btn btn-primary" type="submit" value="Add User" />
		</form>
		
		<table class="table table-bordered">
			
			<?php
$result = mysqli_query($conn, "SELECT * FROM users");

echo "<table class='table table-bordered'>
<tr>
<th>ID</th>
<th colspan='1'>Username</th>
<th colspan='1'>Created</th>
<th colspan='1'>Change Password</th>
<th colspan='1'>Delete</th>
</tr>";
while ($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td colspan='1' >" . $row['username'] . "</td>";
    echo "<td colspan='1' >" . $row['created_at'] . "</td>"; ?>
<td><a href="changepasswd.php?id=<?php echo $row['id'] ?>" ><i class='icon-pencil'></i></a>
<?php if ($row['id'] != 1)
    {
        echo "<td><a href='deluserid.php?id=";
        echo $row['id'];
        echo "' data-dismiss='alert' ><i class='icon-trash'></i></a>";
    } ?>

<?php
    echo "</tr>";
}
echo "</table>";
?>
			
		</div>
<?php include 'master/footer.php'; ?>
