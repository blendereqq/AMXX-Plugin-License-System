<?php
$title ='Servers';
include 'master/nav.php';
require 'SourceQuery/SourceQuery.class.php';
$title ='Serwery';
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: login.php");
    exit;
}

?>
	<legend>Serwery</legend>
		<div class="well sidebar-nav">
		<table class="table table-bordered">
					<form action="addserver.php" method="post">
					<p>IP: <input  type="text" name="ip"  value="192.168.1.1:27015"/></p><button class="btn btn-primary" type="submit" value="Submit" name="submit"><i class="icon-plus icon-white">
					
					</i> Add Server</button></td></br>
					</form> 
					</td></tr>					
				</table>
			<div id="message"></div>
			
			<?php
$result = mysqli_query($conn, "SELECT * FROM servers");

echo "<table class='table table-bordered'>
<tr>
<th>ID</th>
<th colspan='1'>IP</th>
<th colspan='1'>License Code</th>
<th colspan='1'>Status</th>
<th colspan='1'>Delete</th>
</tr>";

while ($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td colspan='1' >" . $row['ip'] . "</td>";
	echo "<td colspan='1' >" . $row['licen'] . "</td>";
    $szAddress = $row['ip'];
    $szExploded = explode(":", $szAddress);
    $szServerIP = $szExploded[0];
    $szServerPort = $szExploded[1];
    $Query = new SourceQuery();
    $Query->Connect($szServerIP, $szServerPort, 1, 0);
    $Info = $Query->GetInfo();
    if ($Info['MaxPlayers'] > 0)
    {
        echo "<td>Online</td>";
    }
    else
    {
        echo "<td>Offline</td>";
    }
?>
<td><a href='update_id.php?id=<?php echo $row['id']; ?>'><i class='icon-trash'></i></a>
<?php
    echo "</tr>";
}
echo "</table>";
?>
			
		</div>
<?php include 'master/footer.php'; ?>
