<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Barcode Scanner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .scan-result {
            transition: all 0.3s;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .scan-success {
            background-color: #d4edda;
            border-left: 5px solid #28a745;
        }
        .scan-error {
            background-color: #f8d7da;
            border-left: 5px solid #dc3545;
        }
        #scanner-input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }
        .order-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .scanned {
            text-decoration: line-through;
            color: #28a745;
        }
        .badge {
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Order Processing Scanner</h1>
                
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Order #12345</h5>
                    </div>
                    <div class="card-body">
                        <div class="order-items-container">
                            <div id="item-1" class="order-item" data-sku="SKU12345">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5>Product Name 1 <small class="text-muted">SKU12345</small></h5>
                                        <p class="mb-0">Quantity: 2</p>
                                    </div>
                                    <div>
                                        <span class="badge bg-warning" id="status-SKU12345">Pending</span>
                                    </div>
                                </div>
                            </div>
                            <div id="item-2" class="order-item" data-sku="SKU67890">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5>Product Name 2 <small class="text-muted">SKU67890</small></h5>
                                        <p class="mb-0">Quantity: 1</p>
                                    </div>
                                    <div>
                                        <span class="badge bg-warning" id="status-SKU67890">Pending</span>
                                    </div>
                                </div>
                            </div>
                            <div id="item-3" class="order-item" data-sku="SKU24680">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5>Product Name 3 <small class="text-muted">SKU24680</small></h5>
                                        <p class="mb-0">Quantity: 3</p>
                                    </div>
                                    <div>
                                        <span class="badge bg-warning" id="status-SKU24680">Pending</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Scanner</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-3">
                            <button id="scan-button" class="btn btn-lg btn-primary">
                                <i class="bi bi-upc-scan"></i> Click to Scan (or use barcode scanner)
                            </button>
                            <input type="text" id="scanner-input" autofocus>
                        </div>
                        
                        <div class="alert alert-info">
                            <p><strong>Instructions:</strong> Click the button above or use your wireless barcode scanner to scan items. 
                            The system will automatically match the scanned barcode with order items.</p>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Scan Results</h5>
                    </div>
                    <div class="card-body">
                        <div id="scan-results">
                            <!-- Scan results will appear here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Audio elements for feedback -->
    <audio id="success-sound" src="https://assets.mixkit.co/active_storage/sfx/2005/2005-preview.mp3"></audio>
    <audio id="error-sound" src="https://assets.mixkit.co/active_storage/sfx/209/209-preview.mp3"></audio>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scannerInput = document.getElementById('scanner-input');
            const scanButton = document.getElementById('scan-button');
            const scanResults = document.getElementById('scan-results');
            const successSound = document.getElementById('success-sound');
            const errorSound = document.getElementById('error-sound');
            
            // Sample order SKUs (In real app, this would come from your database)
            const orderItems = {
                'SKU12345': { qty: 2, scanned: 0, name: 'Product Name 1' },
                'SKU67890': { qty: 1, scanned: 0, name: 'Product Name 2' },
                'SKU24680': { qty: 3, scanned: 0, name: 'Product Name 3' }
            };
            
            // Focus on input when scan button is clicked
            scanButton.addEventListener('click', function() {
                scannerInput.focus();
            });
            
            // Keep focus on the input field
            document.addEventListener('click', function() {
                scannerInput.focus();
            });
            
            // Handle scanner input
            scannerInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    const scannedValue = this.value.trim();
                    processScan(scannedValue);
                    this.value = '';
                }
            });
            
            function processScan(barcode) {
                // In real application, you would make an AJAX call to your PHP backend
                // For demo purposes, we'll simulate the check against our order items
                
                if (orderItems[barcode]) {
                    if (orderItems[barcode].scanned < orderItems[barcode].qty) {
                        // Item found and quantity not fully scanned
                        orderItems[barcode].scanned++;
                        updateUI(barcode, true);
                        
                        // Send to server (in real app)
                        sendToServer(barcode, true);
                    } else {
                        // Already scanned all quantities
                        showResult(false, `All quantities of ${barcode} already scanned!`);
                        errorSound.play();
                    }
                } else {
                    // Item not found in order
                    showResult(false, `Item with barcode ${barcode} not found in this order!`);
                    errorSound.play();
                    
                    // Send to server (in real app)
                    sendToServer(barcode, false);
                }
            }
            
            function updateUI(sku, success) {
                // Update item status
                const statusBadge = document.getElementById(`status-${sku}`);
                if (orderItems[sku].scanned === orderItems[sku].qty) {
                    statusBadge.className = 'badge bg-success';
                    statusBadge.textContent = 'Completed';
                    document.querySelector(`[data-sku="${sku}"]`).classList.add('scanned');
                } else {
                    statusBadge.className = 'badge bg-info';
                    statusBadge.textContent = `Scanned: ${orderItems[sku].scanned}/${orderItems[sku].qty}`;
                }
                
                // Show result message
                showResult(success, `Successfully scanned ${orderItems[sku].name} (${sku}). ${orderItems[sku].scanned}/${orderItems[sku].qty} units processed.`);
                
                // Play success sound
                successSound.play();
            }
            
            function showResult(success, message) {
                const resultDiv = document.createElement('div');
                resultDiv.className = `scan-result ${success ? 'scan-success' : 'scan-error'}`;
                resultDiv.innerHTML = `
                    <div class="d-flex justify-content-between align-items-center">
                        <span>${message}</span>
                        <span class="badge ${success ? 'bg-success' : 'bg-danger'}">${success ? 'Success' : 'Error'}</span>
                    </div>
                `;
                
                // Add to results container
                scanResults.prepend(resultDiv);
                
                // Remove after 10 seconds (optional)
                setTimeout(() => {
                    resultDiv.style.opacity = '0';
                    setTimeout(() => {
                        scanResults.removeChild(resultDiv);
                    }, 300);
                }, 10000);
            }
            
            function sendToServer(barcode, success) {
                // In a real application, you would use AJAX to send this data to your server
                // This is just a placeholder function
                console.log(`Sending to server: ${barcode}, success: ${success}`);
                
                // Example AJAX call (commented out)
                /*
                fetch('process_scan.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        barcode: barcode,
                        success: success,
                        order_id: 12345
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
                */
            }
        });
    </script>
</body>
</html>
