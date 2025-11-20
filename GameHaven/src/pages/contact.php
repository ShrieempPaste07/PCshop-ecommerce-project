<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../components/header.php'; ?>
    <div class="min-h-screen bg-[#F8F7FC] p-6">
        <h1 class="text-3xl font-bold mb-4 text-[#1A1A1A] Header">Contact Us</h1>
        <form method="post" action="contact.php" class="bg-white p-4 rounded shadow">
            <input type="text" name="name" placeholder="Your Name" required class="w-full mb-2 p-2 border rounded" />
            <input type="email" name="email" placeholder="Your Email" required class="w-full mb-2 p-2 border rounded" />
            <textarea name="message" placeholder="Your Message" required class="w-full mb-2 p-2 border rounded"></textarea>
            <button type="submit" class="bg-[#8A2BE2] text-white px-4 py-2 rounded hover:bg-[#B266FF]">Send</button>
        </form>
    </div>
    <?php include '../components/footer.php'; ?>
</body>
</html>