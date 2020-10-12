<?php
include 'functions.php';

session_start();

$connection = connect();

if (!isset($_SESSION['isloggedin']) || $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] ||
    $_SESSION['ua'] != $_SERVER['HTTP_USER_AGENT']) {
    session_regenerate_id();
    header("Location: http://localhost/php/lab08/login.php");
} else {
    $color = '#FFFFFF';
    if(isset($_SESSION['color'])) {
        global $color;
        $color = $_SESSION['color'];
    }

    echo "<body style='background: $color'></body>";
    echo "<form action='profile.php' method='post'>
				<table>
					<tr>
						<td>Color:</td>
						<td>
						<input type='text' name='color'>
						</td>
					</tr>
					<tr>
						<td colspan='2'>
						<input type='submit' name='submit' value='Submit'>
						</td>
					</tr>
				</table>
			</form>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $color = $_POST["color"];
        $_SESSION['color'] = $color;
        header("Location: http://localhost/php/lab08/profile.php");    }

    echo "<form action='logout.php' method='post'>
				<table>
					<tr>
						<td colspan='2'>
						<input type='submit' name='logout' value='Logout'>
						</td>
					</tr>
				</table>
			</form>";

}