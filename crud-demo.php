<link rel="stylesheet" href="css/crud-demo.css"/>
<?php
// Connect to MySQL
$pdo = new PDO(
    "mysql:host=localhost;dbname=phplearn;charset=utf8",
    "root",
    "",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

// --- CREATE ----------------------------------------------------
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add"])) {
    $name = trim($_POST["name"]);
    $price = floatval($_POST["price"]);

    if ($name && $price > 0) {
        $stmt = $pdo->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
        $stmt->execute([":name" => $name, ":price" => $price]);
    }
}

// --- DELETE ----------------------------------------------------
if (isset($_GET["delete"])) {
    $id = intval($_GET["delete"]);
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
    $stmt->execute([":id" => $id]);
}

// --- READ ------------------------------------------------------
$stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Simple PHP CRUD Demo</h2>
<p>This example shows how I handle Create/Read/Delete operations using PHP & MySQL.</p>

<!-- Add Product Form -->
<form method="POST">
    <input type="text" name="name" placeholder="Product name" required>
    <input type="number" step="0.01" name="price" placeholder="Price" required>
    <button type="submit" name="add">Add Product</button>
</form>

<!-- Product List -->
<table border="1" cellpadding="10" style="margin-top:20px; width:100%; max-width:500px;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Action</th>
    </tr>

    <?php foreach ($products as $p): ?>
        <tr>
            <td><?= $p["id"] ?></td>
            <td><?= htmlspecialchars($p["name"]) ?></td>
            <td>$<?= number_format($p["price"], 2) ?></td>
            <td>
                <a href="?delete=<?= $p["id"] ?>"
                    onclick="return confirm('Delete this product?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>