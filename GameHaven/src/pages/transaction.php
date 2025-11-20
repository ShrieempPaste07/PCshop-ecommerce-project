<?php
session_start();
// Example: $transactions = ... (fetch from DB or session)
?>
<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../components/header.php'; ?>
    <div class="min-h-screen bg-[#F8F7FC] p-6">
        <h1 class="text-3xl font-bold mb-4 text-[#1A1A1A] Header">Transactions</h1>
        <div class="bg-white p-4 rounded shadow">
            <?php foreach ($transactions as $txn): ?>
                <div>
                    <p>Order #: <?php echo $txn['id']; ?></p>
                    <p>Total: $<?php echo number_format($txn['total'], 2); ?></p>
                    <!-- Add more transaction details as needed -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
</body>
</html>