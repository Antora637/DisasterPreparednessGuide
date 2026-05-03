<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login - Disaster Guide</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <div class="header-inner">
    <div class="header-left">
      <h1>🛡️ Disaster Preparedness Guide</h1>
      <p>Login to access the guide</p>
    </div>
  </div>
</header>

<?php
session_start();
include 'db.php';
if(isset($_SESSION['user'])) { header("Location:index.php"); exit; }
$msg = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $res   = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user  = mysqli_fetch_assoc($res);
    if($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user['name'];
        header("Location:index.php"); exit;
    } else {
        $msg = '<div class="msg err">❌ Wrong email or password!</div>';
    }
}
echo $msg;
?>

<div class="box">
  <h2>🔒 Login</h2>
  <div class="card">
    <form method="POST">
      <label>Email</label>
      <input type="email" name="email" placeholder="you@email.com" required>
      <label>Password</label>
      <input type="password" name="password" placeholder="Your password" required>
      <button type="submit" class="btn full-btn">🔒 Login</button>
    </form>
    <div class="lnk">No account? <a href="register.php">Register here</a></div>
  </div>
</div>

<footer>🛡️ Disaster Guide | Emergency: <strong>999</strong></footer>
</body>
</html>
