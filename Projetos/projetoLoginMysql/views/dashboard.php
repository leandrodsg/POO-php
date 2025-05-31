<!-- views/dashboard.php -->
<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_email'])) {
  // Se não estiver logado, redireciona para login
  header('Location: login.html');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
</head>
<body>
  <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>

  <p>You are logged in as: <?php echo $_SESSION['user_email']; ?></p>

  <a href="../controllers/LogoutController.php">Logout</a>
</body>
</html>
