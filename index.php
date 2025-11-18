<?php
include dirname(__FILE__) . '/.private/config.php';
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<h2><center>Dashboard - Blueshark Collections</center></h2>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<?php
function getTotalAmount($type, $mysqli) {
    $sql = "SELECT SUM(x.amount_paid) as total 
            FROM collections x
            JOIN collection_types c ON x.collection_type_id = c.id
            WHERE c.type = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $type);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return number_format($result['total'] ?? 0, 2);
}

$totalMonthly = getTotalAmount('monthly', $mysqli);
$totalItem = getTotalAmount('item', $mysqli);
$totalEvent = getTotalAmount('event', $mysqli);
?>

<div class="container py-3">
    <h3 class="text-center mb-4">Blueshark Mobile Dashboard</h3>
    <div class="row g-3 text-center">
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Monthly</h5>
                    <p class="card-text fs-4">BD <?php echo $totalMonthly; ?></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Item Purchases</h5>
                    <p class="card-text fs-4">BD <?php echo $totalItem; ?></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Events</h5>
                    <p class="card-text fs-4">BD <?php echo $totalEvent; ?></p>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-4">

    <div class="row g-2 text-center">
        <div class="col-6 col-md-3">
            <a href="add_member.php" class="btn btn-outline-primary w-100 py-2">Add Member</a>
        </div>
        <div class="col-6 col-md-3">
            <a href="collection_type.php" class="btn btn-outline-secondary w-100 py-2">Collection Types</a>
        </div>
        <div class="col-6 col-md-3">
            <a href="add_collection.php" class="btn btn-outline-success w-100 py-2">Add Collection</a>
        </div>
        <div class="col-6 col-md-3">
            <a href="reports.php" class="btn btn-outline-info w-100 py-2">Reports</a>
        </div>
    </div>
</div>
