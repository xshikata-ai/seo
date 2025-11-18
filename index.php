<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blueshark Jersey Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: sans-serif; background: #f0f8ff; padding: 20px; }
        .container { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
        input, select, button { width: 100%; padding: 10px; margin-top: 10px; }
        table { width: 100%; margin-top: 20px; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        a.btn { display: inline-block; padding: 8px 12px; background: #0d47a1; color: white; text-decoration: none; margin: 5px 0; border-radius: 6px; }
        a.edit { background: #2e7d32; }
    </style>
</head>
<body>

<div class="container">
    <h2>Blueshark Jersey Form</h2>
    <?php if (!empty($error)): ?>
    <div style="background: #ffe6e6; padding: 10px; color: #b71c1c; border-left: 5px solid #c62828; margin-bottom: 15px;">
        <?= $error ?>
    </div>
<?php endif; ?>
    <form method="post">
        <input type="text" name="name" placeholder="Player Name" required>
        <input type="number" name="number" placeholder="Jersey Number" required>
        <select name="size" required>
            <option value="">Select Size</option>
            <option>S</option><option>M</option><option>L</option><option>XL</option><option>XXL</option><option>XXXL</option>
        </select>
        <select name="sleeve" required>
            <option value="">Select Sleeve</option>
            <option>Half</option><option>Full</option>
        </select>
        <button type="submit" name="submit">Submit</button>
    </form>

    <div style="margin-top:20px;">
        <a class="btn" href="export_csv.php">⬇ Export CSV</a>
        <a class="btn" href="export_pdf.php" target="_blank">⬇ Export PDF</a>
    </div>

    <?php if ($entries): ?>
    <table>
        <tr>
            <th>#</th><th>Name</th><th>Number</th><th>Size</th><th>Sleeve</th><th>Action</th>
        </tr>
        <?php foreach ($entries as $index => $row): ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= strtoupper(htmlspecialchars($row[0])) ?></td>
            <td><?= $row[1] ?></td>
            <td><?= $row[2] ?></td>
            <td><?= $row[3] ?></td>
            <td><a class="btn edit" href="edit.php?id=<?= $index ?>">Edit</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>

</body>
</html>
    </div>
</div>
