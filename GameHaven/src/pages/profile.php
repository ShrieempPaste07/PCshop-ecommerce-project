<?php
session_start();
// Example: $user = ... (fetch from DB or session)
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../components/header.php'; ?>
    <div class="min-h-screen bg-[#F8F7FC] p-6">
        <h1 class="text-3xl font-bold mb-4 text-[#1A1A1A] Header">Profile</h1>
        <div class="bg-white p-4 rounded shadow">
            <p>Name: <?php echo htmlspecialchars($user['name']); ?></p>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <!-- Add more profile fields as needed -->
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
</body>
</html>