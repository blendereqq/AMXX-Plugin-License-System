<?php
$title ='Change Password';
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
if ($_GET['id'] === NULL)
{
    header("location: usercp.php");
}
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT *from users WHERE id=$id");
$row = mysqli_fetch_array($result);
$username = $row['username'];
if (count($_POST) > 0)
{
    $pass = $_POST["newPassword"];
    $good = 1;
    $hash_password = password_hash($pass, PASSWORD_DEFAULT);
    if ($_SESSION["loggedin"] && $_SESSION["id"] == 1)
    {

        if (empty(trim($_POST["confirmPassword"])))
        {
            $message = "Please confirm password.";
            $good = 0;
        }
        else
        {
            $confirm_password = trim($_POST["confirmPassword"]);
            if (empty($password_err) && ($pass != $confirm_password))
            {
                $message = "Password did not match.";
                $good = 0;
            }
        }
        if ($pass == NULL)
        {
            $message = "Pozostawiłeś puste pola !";
            $good = 0;
        }
        elseif ($pass === $confirm_password)
        {
            mysqli_query($conn, "UPDATE users set password='$hash_password' WHERE id=$id");
            $message = "Hasło Zmienione !";
        }

    }
    else
    {
        header("location: index.php");
    }
}
?>
 <legend><a href="usercp.php"><i class="icon-arrow-left"></i></a>User Control Panel</legend>
<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
<div style="width:500px;">
<div class="message"><?php if (isset($message))
{
    echo $message;
} ?></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Change Password for: <?php echo $username; ?> </td>
</tr>
<tr>
<td><label>New Password</label></td>
<td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr>
<td><label>Repeat New Password</label></td>
<td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btn btn-primary"></td>
</tr>
</table>
</div>
</form>
</body></html>
<?php include 'master/footer.php'; ?>
