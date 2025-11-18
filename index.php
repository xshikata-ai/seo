<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmacy Label Generator</title>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f5f5f5; }
        .search-container { margin: 20px auto; max-width: 600px; padding: 15px; background: white; border-radius: 6px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h1 { text-align: center; font-size: 24px; color: #333; margin-bottom: 20px; }
        #search { width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ddd; border-radius: 4px; }
        #search-results { margin-top: 10px; border: 1px solid #ddd; max-height: 200px; overflow-y: auto; display: none; background: white; }
        .search-result-item { padding: 10px; border-bottom: 1px solid #eee; cursor: pointer; }
        .search-result-item:hover { background-color: #f0f8ff; }

        /* Label container with exact dimensions */
        .label-container { width: 31.75mm; height: 25.44mm; margin: 10px auto; padding: 1mm; border: 1px dashed #ccc; background: white; box-sizing: border-box; page-break-after: always; }
        .label-content { width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: space-between; }
        .pharmacy-name { font-size: 7pt; text-align: center; font-weight: bold; margin-bottom: 0mm; }
        .barcode-container { text-align: center; margin: 0 auto; height: 10mm; width: 100%; overflow: hidden; }
        #barcode { width: 100% !important; height: 10mm !important; margin: 0 auto; }
        .product-sku { font-size: 7pt; text-align: center; font-weight: bold; margin-top: 2mm; }
        .product-price { font-size: 7pt; text-align: center; font-weight: bold; margin: 0mm 0; }
        .product-name { font-size: 6pt; text-align: center; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; margin-top: 0mm; line-height: 1.2; font-weight: bold; }
        .vat-text { font-size: 6pt; text-align: center; font-weight: bold; display: none; }

        .print-controls { text-align: center; margin: 20px 0; }
        .print-button { padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; margin: 0 10px; }
        .print-button:hover { background-color: #45a049; }

        @media print {
            .search-container, .print-controls { display: none; }
            .label-container { border: none; margin: 0.4; padding: 1mm; }
            body { background: none; margin: 0; padding: 0; }
        }
    </style>
</head>
<body>
    <div class="search-container">
        <h1>Pharmacy Label Generator</h1>
        <input type="text" id="search" placeholder="Search by product name..." autocomplete="off">
        <div id="search-results"></div>
    </div>

    <div class="label-container" id="label-container" style="<?php echo $row ? '' : 'display:none;' ?>">
        <div class="label-content">
            <div class="pharmacy-name">AL QAMAR PHARMACY</div>
            <div class="barcode-container">
                <svg id="barcode" <?php if ($row && !empty($row['sku'])) echo 'data-value="'.htmlspecialchars($row['sku'], ENT_QUOTES).'"'; ?> ></svg>
            </div>
            <div class="product-sku" id="sku-display"><?php echo $row ? htmlspecialchars($row['sku']) : ''; ?></div>
           <div class="product-price">BHD:<span id="price-display"><?php echo $row ? number_format((float)$row['price'], 3, '.', '') : ''; ?></span><span>(INCL VAT)</span>
            <!--<span class="vat-text" id="vat-text" style="font-size:6pt; font-weight:bold; display:none; margin-left:2px;">(INCL VAT)</span>--></div>
            <div class="product-name" id="name-display"><?php echo $row ? htmlspecialchars($row['name']) : ''; ?></div>
        </div>
    </div>
    
    <div class="print-controls">
        <button class="print-button" onclick="window.print()">Print Label</button>
        <button class="print-button" onclick="printMultiple()">Print Multiple Copies</button>
        <input type="number" id="copy-count" value="1" min="1" max="50" style="padding: 10px; width: 50px;">
    </div>

    <script>
        // ---- SEARCH (GET to avoid WAF); shows results; click loads product
        $('#search').on('input', function() {
            var query = $(this).val().trim();
            if (query.length > 2) {
                $.ajax({
                    url: 'search_products.php',
                    method: 'GET',
                    dataType: 'json',
                    data: { query: query },
                    success: function(results) {
                        var resultsContainer = $('#search-results');
                        if (results && results.length) {
                            resultsContainer.empty();
                            $.each(results, function(index, product) {
                                resultsContainer.append(
                                    '<div class="search-result-item" data-id="' + product.id + '">' +
                                    product.name + ' (' + product.sku + ') - BHD ' + Number(product.price).toFixed(3) +
                                    '</div>'
                                );
                            });
                            resultsContainer.show();
                        } else {
                            resultsContainer.hide();
                        }
                    },
                    error: function(xhr) {
                        console.error('Search error', xhr.status, xhr.responseText);
                        $('#search-results').hide();
                    }
                });
            } else {
                $('#search-results').hide();
            }
        });

        $(document).on('click', '.search-result-item', function() {
            var productId = $(this).data('id');
            loadProductDetails(productId);
            $('#search-results').hide();
            $('#search').val($(this).text().split(' (')[0]);
        });

        function loadProductDetails(productId) {
            $.ajax({
                url: 'get_product.php',
                method: 'GET',
                dataType: 'json',
                data: { id: productId },
                success: function(product) {
                    $('#sku-display').text(product.sku || '');
                    $('#price-display').text(product.price ? parseFloat(product.price).toFixed(3) : '');
                    $('#name-display').text(product.name || '');

                    // VAT text visibility
                    //if (product.has_vat && parseInt(product.has_vat) === 1) {
                      //  $('#vat-text').show();
                  //  } else {
                       // $('#vat-text').hide();
                   // }

                    // Barcode render + persist value for printing
                    var svg = document.getElementById('barcode');
                    svg.innerHTML = '';
                    if (product.sku) {
                        var val = String(product.sku).trim();
                        svg.setAttribute('data-value', val);
                        JsBarcode(svg, val, {
                            format: "CODE128",
                            lineColor: "#000000",
                            width: 2,
                            height: 70,
                            margin: 2,
                            displayValue: false,
                            background: "transparent",
                            flat: true
                        });
                    }
                    $('#label-container').show();
                },
                error: function(xhr) {
                    console.error('get_product error', xhr.status, xhr.responseText);
                }
            });
        }

        // Init barcode from PHP if loaded via ?id=
        (function initBarcodeFromPHP(){
            var svg = document.getElementById('barcode');
            var val = (svg.getAttribute('data-value') || '').trim();
            if (!val) return;
            svg.innerHTML = '';
            try {
                JsBarcode(svg, val, {
                    format: "CODE128",
                    lineColor: "#000000",
                    width: 2,
                    height: 70,
                    margin: 2,
                    displayValue: false,
                    background: "transparent",
                    flat: true
                });
            } catch(e) {
                console.error('Barcode init error:', e);
            }
        })();

        // Print multiple copies — re-renders barcodes; VAT text already cloned
        function printMultiple() {
            var copies = parseInt(document.getElementById('copy-count').value || '1', 10);
            copies = Math.max(1, Math.min(50, copies));
            var originalLabel = document.getElementById('label-container').innerHTML;
            var printContent = '';
            for (var i = 0; i < copies; i++) {
                printContent += '<div class="label-container">' + originalLabel + '</div>';
            }

            var w = window.open('', '_blank');
            w.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Print Labels</title>
                    <style>
                        body { margin:0; padding:0; background:none; }
                        .label-container { width:31.75mm; height:25.44mm; padding:1mm; page-break-after:always; box-sizing:border-box; }
                        @page { size:31.75mm 25.44mm; margin:0; }
                    </style>
                </head>
                <body>
                    ${printContent}
                    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"><\/script>
                    <script>
                        window.onload = function() {
                            // Normalize price text to 3 dp in case any slip through
                            document.querySelectorAll('.product-price span').forEach(function(el){
                                var v = parseFloat(el.textContent);
                                if (!isNaN(v)) el.textContent = v.toFixed(3);
                            });
                            // Re-render all barcodes
                            document.querySelectorAll('svg#barcode').forEach(function(svg){
                                var val = (svg.getAttribute('data-value') || '').trim();
                                if (!val) return;
                                svg.innerHTML = '';
                                JsBarcode(svg, val, { format:'CODE128', lineColor:'#000000', width:1.5, height:12, margin:0, displayValue:false, background:'transparent', flat:true });
                            });
                            window.print();
                            setTimeout(function(){ window.close(); }, 100);
                        };
                    <\/script>
                </body>
                </html>
            `);
            w.document.close();
        }
    </script>
</body>
</html>
