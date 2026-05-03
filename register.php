<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register - Disaster Guide</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
  <div class="header-inner">
    <div class="header-left">
      <h1>🛡️ Disaster Preparedness Guide</h1>
      <p>Create your account</p>
    </div>
  </div>
</header>

<?php
include 'db.php';
$msg = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $chk   = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
    if(mysqli_num_rows($chk) > 0) {
        $msg = '<div class="msg err">❌ Email already registered!</div>';
    } else {
        mysqli_query($conn, "INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')");
        $msg = '<div class="msg suc">✅ Done! <a href="login.php">Login now</a></div>';
    }
}
echo $msg;
?>

<div class="box">
  <h2>📝 Create Account</h2>
  <div class="card">
    <form method="POST">
      <label>Full Name</label>
      <input type="text" name="name" placeholder="Your name" required>
      <label>Email</label>
      <input type="email" name="email" placeholder="you@email.com" required>
      <label>Password</label>
      <input type="password" name="password" placeholder="Min 6 characters" required>
      <button type="submit" class="btn full-btn">📝 Register</button>
    </form>
    <div class="lnk">Have account? <a href="login.php">Login here</a></div>
  </div>
</div>

<footer>🛡️ Disaster Guide | Emergency: <strong>999</strong></footer>
</body>
</html>
