<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>💸 Monitor Callback Pembayaran QRIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8fafc; padding: 20px; font-family: 'Segoe UI', sans-serif; }
        .card { border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .callback-entry {
            background: #1e1e1e; color: #dcdcdc;
            border-radius: 10px; padding: 15px;
            margin-bottom: 10px;
        }
        pre { margin: 0; font-size: 13px; white-space: pre-wrap; }
        .pulse { animation: pulse 1s infinite; }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(40,167,69, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(40,167,69, 0); }
            100% { box-shadow: 0 0 0 0 rgba(40,167,69, 0); }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card p-4">
        <h3 class="text-center text-success mb-3">💸 Monitor Callback Pembayaran QRIS</h3>
        <div id="status" class="alert alert-info text-center">Menunggu callback...</div>
        <div id="callbackList" class="mt-3"></div>
    </div>
</div>

<!-- File audio lokal -->
<audio id="notifSound" preload="auto">
    <source src="notif.mp3" type="audio/mpeg">
</audio>

<script>
let lastData = "";
const sound = document.getElementById("notifSound");

function addCallbackToList(time, data) {
    const div = document.createElement("div");
    div.className = "callback-entry";
    div.innerHTML = `
        <b>🕒 ${time}</b><br>
        <b>Merchant:</b> ${data.merchant_name || "-"}<br>
        <b>Nominal:</b> Rp ${Number(data.amount || 0).toLocaleString("id-ID")}<br>
        <b>Status:</b> ${data.status || "-"}<br>
        <b>Deskripsi:</b> ${data.description || "-"}<br>
        <b>Tanggal:</b> ${new Date(data.paid_date || Date.now()).toLocaleString("id-ID")}<br>
        <b>Provider:</b> ${data.acquirer_name || "-"}<br><br>
        <pre>${JSON.stringify(data, null, 4)}</pre>
    `;
    document.getElementById("callbackList").prepend(div);
}

function loadLog() {
    const today = new Date().toISOString().split('T')[0];
    fetch("callback_log_" + today + ".json?ts=" + Date.now())
        .then(res => res.json())
        .then(logs => {
            const container = document.getElementById("callbackList");
            container.innerHTML = "";
            logs.reverse().forEach(entry => addCallbackToList(entry.time, entry.data));
        })
        .catch(() => {});
}

function showAutoDismissAlert(message, data) {
    const alertDiv = document.createElement("div");
    alertDiv.className = "alert alert-success position-fixed top-0 end-0 m-3 shadow fade show pulse";
    alertDiv.style.zIndex = "9999";
    alertDiv.innerHTML = `
        <h5 class="mb-1"><b>✅ ${message}</b></h5>
        <div><b>Merchant:</b> ${data.merchant_name || "-"}<br>
        <b>Nominal:</b> Rp ${Number(data.amount || 0).toLocaleString("id-ID")}<br>
        <b>Status:</b> ${data.status || "-"}<br>
        <b>Tanggal:</b> ${new Date(data.paid_date || Date.now()).toLocaleString("id-ID")}</div>
    `;
    document.body.appendChild(alertDiv);

    setTimeout(() => {
        alertDiv.classList.remove("show");
        alertDiv.classList.add("hide");
        setTimeout(() => alertDiv.remove(), 800);
    }, 3500);
}

function checkRealtime() {
    fetch("callback_data.json?ts=" + Date.now())
        .then(res => res.text())
        .then(data => {
            if (data && data !== lastData) {
                lastData = data;
                let jsonData;
                try { jsonData = JSON.parse(data); } catch { jsonData = {}; }

                const status = document.getElementById("status");
                status.className = "alert alert-success text-center pulse";
                status.innerText = "✅ Callback diterima: " + new Date().toLocaleString("id-ID");

                addCallbackToList(new Date().toLocaleTimeString(), jsonData);

                // Mainkan suara notif lokal
                const playPromise = sound.play();
                if (playPromise !== undefined) {
                    playPromise.catch(() => {
                        document.body.addEventListener("click", () => {
                            sound.play();
                        }, { once: true });
                    });
                }

                // Alert otomatis (Bootstrap)
                showAutoDismissAlert("Pembayaran diterima!", jsonData);
            }
        })
        .catch(() => {});
}

// Load awal
loadLog();

// Cek realtime setiap 2 detik
setInterval(checkRealtime, 2000);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
