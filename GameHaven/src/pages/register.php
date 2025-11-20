<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../components/header.php'; ?>
    <div class="min-h-screen bg-[#F8F7FC] p-6">
        <h1 class="text-3xl font-bold mb-4 text-[#1A1A1A] Header">Register</h1>
        <form method="post" action="register.php" class="bg-white p-4 rounded shadow">
            <input type="text" name="username" placeholder="Username" required class="w-full mb-2 p-2 border rounded" />
            <input type="email" name="email" placeholder="Email" required class="w-full mb-2 p-2 border rounded" />
            <input type="password" name="password" placeholder="Password" required class="w-full mb-2 p-2 border rounded" />
            <button type="submit" class="bg-[#8A2BE2] text-white px-4 py-2 rounded hover:bg-[#B266FF]">Register</button>
        </form>
    </div>
    <?php include '../components/footer.php'; ?>
</body>
</html>