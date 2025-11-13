<?php
session_start();
// Example: $products = ... (fetch from DB or static array)
$selectedCategory = $_GET['category'] ?? 'All';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../components/header.php'; ?>
    <div id="container" class="min-h-screen w-full bg-[#ECE7FA]">
        <div class="grid lg:grid-cols-4">
            <!-- Sidebar -->
            <div class="hidden lg:block bg-[#ECE7FA] p-6">
                <h2 class="font-bold text-xl mb-4 text-center text-[#1A1A1A] Header">Pick by Categories</h2>
                <div class="flex flex-col gap-2">
                    <a href="?category=All" class="group relative px-2 py-1 text-2xl text-[#1A1A1A] font-bold uppercase tracking-wide transition duration-300 hover:bg-[#D6C4FF] Accent">All</a>
                    <!-- Repeat for each category -->
                </div>
            </div>
            <!-- Products Grid -->
            <div class="col-span-3 p-6">
                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    <?php foreach ($products as $item): ?>
                        <?php if ($selectedCategory === 'All' || $item['category'] === $selectedCategory): ?>
                            <div class="group bg-white rounded-lg shadow p-3 flex flex-col h-[320px] cursor-pointer hover:shadow-lg transition">
                                <div class="w-full h-[55%] rounded mb-2 bg-[#D6C4FF] flex items-center justify-center overflow-hidden">
                                    <img src="<?php echo $item['image']; ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" />
                                </div>
                                <div class="flex-1 flex flex-col justify-between">
                                    <h3 class="font-bold text-lg text-[#1A1A1A] Header"> <?php echo htmlspecialchars($item['name']); ?> </h3>
                                    <div class="flex justify-between items-center mt-2">
                                        <span class="text-[#8A2BE2] font-bold">$<?php echo number_format($item['price'], 2); ?></span>
                                        <form method="post" action="cart.php">
                                            <input type="hidden" name="add_id" value="<?php echo $item['id']; ?>">
                                            <button type="submit" class="text-lg px-2 py-1 bg-[#8A2BE2] text-white rounded hover:bg-[#B266FF] Accent">Add to Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
</body>
</html>