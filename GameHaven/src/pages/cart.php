<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$cartItems = $_SESSION['cart'];
function totalPrice($cartItems) {
    $total = 0;
    foreach ($cartItems as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../components/header.php'; ?>
    <div class="min-h-screen bg-[#F8F7FC] p-6">
        <h1 class="text-3xl font-bold mb-4 text-[#1A1A1A] Header">🛒 Shopping Cart</h1>
        <?php if (count($cartItems) > 0): ?>
            <div class="space-y-4">
                <?php foreach ($cartItems as $item): ?>
                    <div class="bg-white p-4 rounded shadow flex justify-between items-center">
                        <div class="flex gap-4 items-start">
                            <img src="<?php echo $item['image']; ?>" class="w-24 h-24 object-cover rounded border border-[#E3E3E3] bg-[#D6C4FF]" />
                            <div>
                                <h2 class="text-xl font-semibold Header text-[#1A1A1A]"> <?php echo htmlspecialchars($item['name']); ?> </h2>
                                <p class="text-gray-500"> <?php echo htmlspecialchars($item['desc']); ?> </p>
                                <div class="flex items-center gap-2 mt-2">
                                    <form method="post" action="cart.php">
                                        <input type="hidden" name="action" value="decrement">
                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" class="px-2 py-1 bg-[#ECE7FA] rounded">-</button>
                                    </form>
                                    <span class="px-2"> <?php echo $item['quantity']; ?> </span>
                                    <form method="post" action="cart.php">
                                        <input type="hidden" name="action" value="increment">
                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" class="px-2 py-1 bg-[#ECE7FA] rounded">+</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="text-lg font-bold text-[#1a1a1a] Description"> $<?php echo number_format($item['price'] * $item['quantity'], 2); ?> </span>
                            <form method="post" action="cart.php">
                                <input type="hidden" name="action" value="remove">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <button type="submit" class="text-[#FF4C4C] hover:text-[#FF6666] Accent">Remove</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="text-right mt-6 text-xl font-semibold Description text-[#1a1a1a]">
                Total: $<?php echo number_format(totalPrice($cartItems), 2); ?>
            </div>
        <?php else: ?>
            <p class="text-gray-500">Your cart is empty.</p>
        <?php endif; ?>
    </div>
    <?php include '../components/footer.php'; ?>
</body>
</html>