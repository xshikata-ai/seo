<?php
include dirname(__FILE__) . '/.private/config.php';
/>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>ZATCA QR Scanner & Saudi VAT Calculator | Free KSA Tax Tool</title>
<meta name="description" content="Free ZATCA e-invoice QR code scanner and Saudi Arabia VAT calculator. Scan QR codes with camera, decode Base64, calculate 15% VAT. Arabic/English support for KSA businesses." />
<meta name="keywords" content="ZATCA QR scanner, Saudi VAT calculator, KSA tax calculator, e-invoice QR decoder, Saudi Arabia VAT, ZATCA compliance, QR code scanner, حاسبة ضريبة القيمة المضافة, قارئ رمز QR" />
<meta name="robots" content="index, follow" />
<meta name="author" content="KSA VAT Tools" />
<link rel="canonical" href="https://readinvoiceqr.com/" />

<!-- Open Graph tags for social media -->
<meta property="og:title" content="ZATCA QR Scanner & Saudi VAT Calculator" />
<meta property="og:description" content="Free tool to scan ZATCA QR codes and calculate Saudi Arabia VAT. Camera scanning, multilingual support." />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://readinvoiceqr.com/" />
<meta property="og:locale" content="en_US" />
<meta property="og:locale:alternate" content="ar_SA" />

<!-- Additional SEO tags -->
<meta name="language" content="English" />
<meta name="geo.region" content="SA" />
<meta name="geo.country" content="Saudi Arabia" />

<!-- JSON-LD Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "ZATCA QR Scanner & Saudi VAT Calculator",
  "description": "Free online tool to scan ZATCA e-invoice QR codes and calculate Saudi Arabia VAT (Value Added Tax). Supports camera scanning, file uploads, and bilingual Arabic/English interface.",
  "url": "https://readinvoiceqr.com",
  "applicationCategory": "BusinessApplication",
  "operatingSystem": "Web Browser",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "SAR"
  },
  "featureList": [
    "ZATCA QR Code Scanner",
    "Saudi VAT Calculator", 
    "Camera QR Scanning",
    "Base64 QR Decoder",
    "XML/PDF QR Extraction",
    "Arabic/English Support"
  ],
  "geo": {
    "@type": "Place",
    "addressCountry": "SA"
  },
  "inLanguage": ["en", "ar"]
}
</script>
  <style>
    :root{--bg:#0b1020;--fg:#eaf1ff;--muted:#9fb2ef;--card:rgba(255,255,255,.04);--cardb:rgba(255,255,255,.08);--accent:#0096c7}html{scroll-behavior:smooth}body{font-family:system-ui,-apple-system,Segoe\ UI,Roboto,Arial,'Noto\ Naskh\ Arabic',sans-serif;background:var(--bg);color:var(--fg);margin:0}.container{max-width:1000px;margin:0 auto;padding:22px}.card{background:var(--card);border:1px solid var(--cardb);border-radius:16px;padding:18px;margin:16px 0}.btn{cursor:pointer;padding:10px 14px;border-radius:10px;border:1px solid #2a385f;background:#172042;color:#fff;font-weight:600}.btn.primary{background:var(--accent);border:none}.btn.danger{background:#dc3545;border:none}.btn.secondary{background:#6c757d;border:none}.btn:disabled{opacity:0.6;cursor:not-allowed}.row{display:flex;gap:10px;align-items:center;flex-wrap:wrap}.result{display:flex;justify-content:space-between;padding:8px 10px;border:1px dashed #2a385f;border-radius:10px;margin:6px 0}.value{font-weight:700}input,select,textarea{padding:10px 12px;border-radius:10px;border:1px solid #233055;background:#0f1630;color:var(--fg);width:100%}.muted{color:var(--muted)}.ad{display:flex;align-items:center;justify-content:center;background:#0d142d;border:1px dashed #29406b;border-radius:14px;height:90px;color:#7a8dbd;font-size:13px;margin:16px 0}.ad.small{height:60px}.preview{margin-top:10px;display:flex;gap:12px;align-items:flex-start}.preview img{max-width:240px;border-radius:10px;border:1px solid #233055}.kbd{font-family:ui-monospace,Menlo,Consolas,monospace;background:#0f1630;border:1px solid #233055;border-radius:6px;padding:2px 6px;font-size:12px}canvas{display:none}nav a{color:var(--muted);text-decoration:none;margin-left:12px}nav a:hover{color:#fff}.split{display:grid;grid-template-columns:1fr 1fr;gap:10px}@media (max-width:800px){.split{grid-template-columns:1fr}}.dropzone{margin-top:12px;border:2px dashed #2a385f;border-radius:12px;padding:14px;background:#0d142d;color:#9fb2ef;text-align:center}.dropzone.dragover{outline:2px solid var(--accent);background:#0f1a36}.file-btn{display:inline-flex;align-items:center;gap:8px;background:#172042;border:1px solid #2a385f;color:#fff;border-radius:10px;padding:10px 14px;cursor:pointer;user-select:none}.file-btn:hover{background:#1c274a}
    
    /* Camera Scanner Styles */
    .camera-modal{position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.9);z-index:1000;display:none;flex-direction:column;align-items:center;justify-content:center}.camera-container{position:relative;max-width:90vw;max-height:80vh;border-radius:16px;overflow:hidden;border:2px solid var(--accent)}.camera-video{width:100%;height:100%;object-fit:cover;background:#000}.camera-controls{display:flex;gap:12px;margin-top:16px;justify-content:center;flex-wrap:wrap}.camera-overlay{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:200px;height:200px;border:2px solid var(--accent);border-radius:16px;pointer-events:none}.camera-overlay::before,.camera-overlay::after{content:'';position:absolute;width:20px;height:20px;border:3px solid var(--accent)}.camera-overlay::before{top:-3px;left:-3px;border-right:none;border-bottom:none}.camera-overlay::after{bottom:-3px;right:-3px;border-left:none;border-top:none}.scanning-line{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:180px;height:2px;background:linear-gradient(90deg,transparent,var(--accent),transparent);animation:scan 2s linear infinite;opacity:0.8}.scanning-line.active{animation:scan 1s linear infinite}@keyframes scan{0%{transform:translate(-50%,-50%) translateY(-90px)}100%{transform:translate(-50%,-50%) translateY(90px)}}
  </style>
  <script>
    // Anti-copy protection
    document.addEventListener('contextmenu', e => e.preventDefault());
    document.addEventListener('selectstart', e => e.preventDefault());
    document.addEventListener('dragstart', e => e.preventDefault());
    document.addEventListener('keydown', e => {
      if(e.ctrlKey && (e.key === 'u' || e.key === 'U' || e.key === 's' || e.key === 'S' || e.key === 'a' || e.key === 'A')) e.preventDefault();
      if(e.key === 'F12') e.preventDefault();
      if(e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'i' || e.key === 'J' || e.key === 'j' || e.key === 'C' || e.key === 'c')) e.preventDefault();
    });
    
    // More accurate dev tools detection
    let devToolsOpen = false;
    let threshold = 160;
    
    function detectDevTools() {
      if (window.outerHeight && window.innerHeight) {
        let heightDifference = window.outerHeight - window.innerHeight;
        let widthDifference = window.outerWidth - window.innerWidth;
        
        // More lenient detection - only trigger if difference is very large
        if (heightDifference > threshold && widthDifference > threshold) {
          if (!devToolsOpen) {
            devToolsOpen = true;
            setTimeout(() => {
              if (devToolsOpen) {
                document.body.innerHTML = '<div style="padding:50px;text-align:center;color:#ff4444;font-size:24px;background:#0b1020;min-height:100vh;">⚠️ Developer tools detected. Please close to continue.</div>';
              }
            }, 2000); // 2 second delay to avoid false positives
          }
        } else if (heightDifference < 100 && widthDifference < 100) {
          if (devToolsOpen) {
            devToolsOpen = false;
            location.reload(); // Reload page when dev tools are closed
          }
        }
      }
    }
    
    // Check every 500ms instead of 100ms to reduce false positives
    setInterval(detectDevTools, 500);
    
    // Additional detection method
    let devtools = {open: false, orientation: null};
    const threshold_width = 160;
    
    setInterval(() => {
      if (window.Firebug && window.Firebug.chrome && window.Firebug.chrome.isInitialized) {
        if (!devtools.open) {
          devtools.open = true;
          document.body.innerHTML = '<div style="padding:50px;text-align:center;color:#ff4444;font-size:24px;background:#0b1020;min-height:100vh;">⚠️ Please close developer tools to continue.</div>';
        }
      }
      
      if (window.outerWidth - window.innerWidth > threshold_width || window.outerHeight - window.innerHeight > threshold_width) {
        if (!devtools.open) {
          devtools.open = true;
          setTimeout(() => {
            if (devtools.open) {
              document.body.innerHTML = '<div style="padding:50px;text-align:center;color:#ff4444;font-size:24px;background:#0b1020;min-height:100vh;">⚠️ Please close developer tools to continue.</div>';
            }
          }, 1000);
        }
      } else {
        devtools.open = false;
      }
    }, 1000);
  </script>
</head>
<body onload="initApp()">
  <div class="container">
    <div class="row" style="justify-content:space-between">
      <strong id="appTitle">KSA VAT Calculator + ZATCA QR</strong>
      <div class="row">
        <nav>
          <a href="#qrSection" id="navQrLink">QR Decoder</a>
          <a href="#vatSection" id="navVatLink">VAT Calculator</a>
          <a href="https://vatcalc.readinvoiceqr.com" id="navAdvVatLink" target="_blank">Advance VAT Calculation</a>
        </nav>
        <label for="langSelect" class="muted" id="langLabel" style="margin-left:12px">Language</label>
        <select id="langSelect" aria-label="Language">
          <option value="en" selected>English</option>
          <option value="ar">العربية</option>
        </select>
      </div>
    </div>

    <div id="topAd" class="ad" aria-label="Advertisement">Top Ad (728×90)</div>
    
    <!-- SEO Introduction Section -->
<section class="card">
  <h1>Free ZATCA QR Scanner & Saudi VAT Calculator</h1>
  <p>Professional tools for Saudi Arabia businesses to scan ZATCA e-invoice QR codes and calculate KSA VAT (Value Added Tax). Ensure full compliance with Saudi tax authority regulations using our free online ZATCA QR code decoder and VAT calculation tools.</p>
  <p dir="rtl">أدوات مهنية للشركات السعودية لمسح رموز QR للفواتير الإلكترونية وحساب ضريبة القيمة المضافة. ضمان الامتثال الكامل لأنظمة هيئة الزكاة والضريبة والجمارك باستخدام أدواتنا المجانية.</p>
</section>

<!-- Features Section -->
<section class="card">
  <h2>ZATCA Compliance Features / ميزات الامتثال للزكاة والضريبة</h2>
  <div class="split">
    <div>
      <h3>English Features:</h3>
      <ul>
        <li>Instant ZATCA QR code scanning for Saudi e-invoices</li>
        <li>Accurate KSA VAT calculation (0%, 5%, 10%, 15%)</li>
        <li>Camera-based QR scanning for mobile devices</li>
        <li>XML and PDF e-invoice QR extraction</li>
        <li>Free Saudi tax compliance verification</li>
      </ul>
    </div>
    <div dir="rtl">
      <h3>الميزات العربية:</h3>
      <ul>
        <li>مسح فوري لرموز QR للفواتير الإلكترونية السعودية</li>
        <li>حساب دقيق لضريبة القيمة المضافة (0%، 5%، 10%، 15%)</li>
        <li>مسح رموز QR بالكاميرا للأجهزة المحمولة</li>
        <li>استخراج رموز QR من ملفات XML و PDF</li>
        <li>التحقق المجاني من الامتثال الضريبي السعودي</li>
      </ul>
    </div>
  </div>
</section>

    <section class="card" id="qrSection">
      <h2 id="qrTitle">ZATCA e‑Invoice QR Decoder</h2>
      <p class="muted" id="qrDescription">Paste Base64, upload a QR image, upload an XML (extract <span class="kbd">cbc:EmbeddedDocumentBinaryObject</span> where <span class="kbd">cbc:ID</span> = <span class="kbd">QR</span>), upload a PDF invoice, or scan with camera.</p>
      <textarea id="qrTextInput" rows="4" placeholder="Paste QR Base64 here"></textarea>

      <div class="split" style="margin-top:10px">
        <div class="row" style="gap:10px">
          <label class="file-btn"><input id="imageFileInput" type="file" accept="image/*" hidden><span>Choose QR Image File</span></label>
          <label class="file-btn"><input id="xmlFileInput" type="file" accept=".xml, text/xml, application/xml" hidden><span>Choose XML File</span></label>
          <label class="file-btn"><input id="pdfFileInput" type="file" accept=".pdf,application/pdf" hidden><span>Choose PDF File</span></label>
          <button id="scanQrBtn" class="file-btn" type="button"><span id="scanQrText">📱 Scan QR Code</span></button>
        </div>
        <div class="row" style="justify-content:flex-end">
          <button id="sampleBtn" class="btn" type="button">Use Sample</button>
          <button id="decodeBtn" class="btn primary" type="button">Decode</button>
          <button id="copyQrBtn" class="btn" type="button" disabled>Copy JSON</button>
          <button id="clearBtn" class="btn" type="button">Clear</button>
        </div>
      </div>

      <div id="dropArea" class="dropzone">Drag & drop PDF / XML / QR image / Base64 text here</div>

      <div class="preview" id="imagePreview" hidden>
        <img id="previewImage" alt="QR preview" />
        <div class="muted" id="previewText"></div>
      </div>
      <div class="results" id="qrOutput" hidden></div>
      <p class="muted" id="statusText">Status: Idle</p>
      <p class="warn" id="errorText"></p>
    </section>

    <!-- Camera Scanner Modal -->
    <div id="cameraModal" class="camera-modal">
      <div class="camera-container">
        <video id="cameraVideo" class="camera-video" autoplay playsinline></video>
        <div class="camera-overlay">
          <div class="scanning-line" id="scanningLine"></div>
        </div>
      </div>
      <div class="camera-controls">
        <button id="switchCameraBtn" class="btn">Switch Camera</button>
        <button id="closeCameraBtn" class="btn danger">Close Scanner</button>
      </div>
      <p class="muted" id="cameraStatus">Position QR code within the frame</p>
    </div>

    <div id="midAd" class="ad" aria-label="Advertisement">In‑content Ad (300×250)</div>

    <section class="card" id="vatSection">
      <h2 id="vatTitle">KSA VAT Calculator</h2>
      <div class="row">
        <label for="vatRateSelect" id="vatRateLabel">VAT Rate:</label>
        <select id="vatRateSelect">
          <option value="0">0%</option>
          <option value="0.05">5%</option>
          <option value="0.10">10%</option>
          <option value="0.15" selected>15%</option>
        </select>
        <select id="calcModeSelect">
          <option value="add">Add VAT to net</option>
          <option value="remove">Remove VAT from gross</option>
        </select>
      </div>
      <div class="row" style="margin-top:10px">
        <input id="amountInput" placeholder="Enter amount (e.g. 100)" />
        <button id="calculateBtn" class="btn primary" type="button">Calculate</button>
        <button id="copyVatBtn" class="btn" type="button" disabled>Copy</button>
         <button id="advVatBtn" class="btn secondary" type="button" onclick="window.open('https://vatcalc.readinvoiceqr.com', '_blank')">Advance VAT Calculation</button>
      </div>
      <div class="results" id="vatOutput" hidden>
        <div class="result"><span id="netLabel">Net (excl. VAT)</span><span id="netAmount" class="value">—</span></div>
        <div class="result"><span id="vatAmountLabel">VAT (15%)</span><span id="vatAmount" class="value">—</span></div>
        <div class="result"><span id="grossLabel">Gross (incl. VAT)</span><span id="grossAmount" class="value">—</span></div>
      </div>
    </section>

    <section class="card" id="suggestionSection">
      <h2 id="suggestionTitle">Suggest a new feature</h2>
      <p class="muted" id="suggestionDescription">Have an idea? Tell us what to add next. Suggestions will be saved to Google Sheets (or emailed if not configured).</p>
      <div class="row">
        <input id="suggestionEmail" type="email" placeholder="Your email (optional)" />
      </div>
      <div class="row" style="margin-top:10px">
        <textarea id="suggestionText" rows="4" placeholder="Describe the feature you want..."></textarea>
      </div>
      <div class="row" style="margin-top:10px;justify-content:flex-end">
        <button id="sendSuggestionBtn" class="btn primary" type="button">Send suggestion</button>
        <span class="muted" id="suggestionStatus" style="margin-left:8px"></span>
      </div>
    </section>

    <div id="bottomAd" class="ad small" aria-label="Advertisement">Bottom Ad (468×60)</div>

    <canvas id="workingCanvas"></canvas>
    <canvas id="pdfRenderCanvas"></canvas>
    <canvas id="scannerCanvas"></canvas>
    
    <!-- SEO Footer -->
<footer class="card">
  <p>ZATCA QR Scanner & Saudi VAT Calculator - Free online tools for KSA businesses to maintain tax compliance. Scan e-invoice QR codes, calculate Value Added Tax, and ensure ZATCA regulatory adherence for Saudi Arabia companies.</p>
  <p dir="rtl">ماسح رمز QR للزكاة والضريبة وحاسبة ضريبة القيمة المضافة - أدوات مجانية عبر الإنترنت للشركات السعودية للحفاظ على الامتثال الضريبي ومسح رموز الفواتير الإلكترونية.</p>
</footer>

  </div>

<script>
// Protected main application code
(function(){
  'use strict';
  
  const appConfig = {
    currentLang: 'en',
    strings: {
      en: {
        title: 'KSA VAT Calculator + ZATCA QR',
        lang: 'Language',
        navQr: 'QR Decoder',
        navAdvVat: 'Advance VAT Calculation',
        navVat: 'VAT Calculator',
        vatHeader: 'Saudi VAT Calculator - KSA Tax Compliance Tool',
        vatRate: 'VAT Rate:',
        modeAdd: 'Add VAT to net',
        modeRemove: 'Remove VAT from gross',
        amountPh: 'Enter amount (e.g. 100)',
        calc: 'Calculate',
        copy: 'Copy',
        advVat: 'Advance VAT Calculation',
        net: 'Net (excl. VAT)',
        gross: 'Gross (incl. VAT)',
        vat: 'VAT',
        qrHeader: 'ZATCA QR Code Scanner - Saudi E-Invoice Decoder',
        qrHelp: 'Paste Base64, upload a QR image, upload an XML (extract <span class="kbd">cbc:EmbeddedDocumentBinaryObject</span> where <span class="kbd">cbc:ID</span> = <span class="kbd">QR</span>), upload a PDF invoice, or scan with camera.',
        decode: 'Decode',
        copyJSON: 'Copy JSON',
        clear: 'Clear',
        sample: 'Use Sample',
        scanQr: '📱 Scan QR Code',
        switchCamera: 'Switch Camera',
        closeCamera: 'Close Scanner',
        cameraPosition: 'Position QR code within the frame',
        cameraScanning: 'Scanning for QR code...',
        cameraFound: 'QR code detected! Processing...',
        cameraError: 'Camera access denied or unavailable',
        cameraNoSupport: 'Camera not supported on this device',
        statusIdle: 'Status: Idle',
        statusFallback: 'Status: Using fallback decoder (ZXing).',
        statusTryFallback: 'Status: Trying fallback decoder…',
        statusRead: 'Status: QR read.',
        statusNoQR: 'Status: No QR detected.',
        statusErr: 'Status: Error reading image.',
        previewUp: 'Uploaded preview. Attempting to read QR…',
        previewOK: 'QR detected and pasted.',
        previewFail: 'Could not detect a QR. Try a clearer image or paste Base64 manually.',
        xmlFound: 'Status: Base64 extracted from XML (ID=QR).',
        xmlNotFound: 'Status: Could not find Base64 in XML.',
        xmlParseFail: 'Status: Failed to parse XML.',
        pdfProcessing: 'Status: Processing PDF pages…',
        pdfRead: 'Status: QR read from PDF.',
        pdfNoQR: 'Status: No QR found in PDF.',
        pastePrompt: 'Paste QR Base64 first',
        decodeFail: 'Could not decode payload',
        suggHeader: 'Have a question about VAT with ZATCA Compliance',
        suggHelp: '',
        suggEmailPh: 'Your email',
        suggTextPh: 'Describe the issue in detail...',
        suggSend: 'Submit',
        suggSent: 'Your Query Submitted. We shall get back to you.',
        suggFail: 'Could not save. Please try again or enable email fallback.'
      },
      ar: {
        title: 'حاسبة ضريبة القيمة المضافة + قارئ رمز الفاتورة الإلكترونية',
        lang: 'اللغة',
        navQr: 'قارئ QR',
        navVat: 'حاسبة الضريبة',
         navAdvVat: 'حساب ضريبة القيمة المضافة المتقدم',
        vatHeader: 'حاسبة ضريبة القيمة المضافة (السعودية)',
        vatRate: 'نسبة الضريبة:',
        modeAdd: 'إضافة الضريبة إلى السعر الصافي',
        modeRemove: 'إزالة الضريبة من السعر الإجمالي',
        amountPh: 'أدخل المبلغ (مثال 100)',
        calc: 'احسب',
        copy: 'نسخ',
       advVat: 'حساب ضريبة القيمة المضافة المتقدم',
        net: 'الصافي (بدون ضريبة)',
        gross: 'الإجمالي (شامل الضريبة)',
        vat: 'ضريبة القيمة المضافة',
        qrHeader: 'مُفسِّر رمز QR لفاتورة الزكاة والضريبة والجمارك',
        qrHelp: 'الصق Base64، أو ارفع صورة للرمز، أو ارفع ملف XML (سنستخرج <span class="kbd">cbc:EmbeddedDocumentBinaryObject</span> حيث <span class="kbd">cbc:ID</span> = <span class="kbd">QR</span>)، أو ارفع ملف PDF للفاتورة، أو امسح بالكاميرا.',
        decode: 'فك الترميز',
        copyJSON: 'نسخ JSON',
        clear: 'مسح',
        sample: 'جرِّب مثالاً',
        scanQr: '📱 مسح رمز QR',
        switchCamera: 'تبديل الكاميرا',
        closeCamera: 'إغلاق الماسح',
        cameraPosition: 'ضع رمز QR داخل الإطار',
        cameraScanning: 'جاري البحث عن رمز QR...',
        cameraFound: 'تم اكتشاف رمز QR! جاري المعالجة...',
        cameraError: 'تم رفض الوصول للكاميرا أو غير متاحة',
        cameraNoSupport: 'الكاميرا غير مدعومة على هذا الجهاز',
        statusIdle: 'الحالة: جاهز',
        statusFallback: 'الحالة: استخدام مُفسِّر احتياطي (ZXing).',
        statusTryFallback: 'الحالة: المحاولة بالمُفسِّر الاحتياطي…',
        statusRead: 'الحالة: تم قراءة الرمز.',
        statusNoQR: 'الحالة: لم يتم العثور على رمز.',
        statusErr: 'الحالة: خطأ أثناء القراءة.',
        previewUp: 'تم رفع الصورة. يتم الآن قراءة الرمز…',
        previewOK: 'تم اكتشاف الرمز ووضعه.',
        previewFail: 'تعذر اكتشاف الرمز. جرِّب صورة أوضح أو الصق Base64 يدوياً.',
        xmlFound: 'الحالة: تم استخراج Base64 من XML (المعرف = QR).',
        xmlNotFound: 'الحالة: لم يتم العثور على Base64 في XML.',
        xmlParseFail: 'الحالة: فشل تحليل ملف XML.',
        pdfProcessing: 'الحالة: جار معالجة صفحات PDF…',
        pdfRead: 'الحالة: تم قراءة الرمز من PDF.',
        pdfNoQR: 'الحالة: لم يتم العثور على رمز في PDF.',
        pastePrompt: 'الرجاء لصق Base64 أولاً',
        decodeFail: 'تعذر فك الترميز',
        suggHeader: 'هل لديك سؤال بخصوص ضريبة القيمة المضافة مع قسم الزكاة؟',
        suggHelp: '',
        suggEmailPh: 'بريدك الإلكتروني (اختياري)',
        suggTextPh: 'وصف المشكلة بالتفصيل...',
        suggSend: 'إرسال',
        suggSent: 'تم إرسال استفسارك. سنتواصل معك.',
        suggFail: 'تعذر الحفظ. يرجى المحاولة أو تفعيل البريد الاحتياطي.'
      }
    },
    tlvTags: {
      1: 'Seller',
      2: 'VAT Number', 
      3: 'Timestamp',
      4: 'Total (SAR)',
      5: 'VAT Amount (SAR)',
      6: 'Invoice Hash',
      7: 'ECDSA Signature',
      8: 'Public Key'
    },
    sampleBase64: 'AQxTYW1wbGUgU3RvcmUCDzEyMzQ1Njc4OTAxMjM0NQMUMjAyNS0wOS0wMlQxMjowMDowMFoEBjEwMC4wMAUFMTAuMDA='
  };

  // Element selectors
  const elements = {
    get: (id) => document.getElementById(id),
    langSelect: () => elements.get('langSelect'),
    qrTextInput: () => elements.get('qrTextInput'),
    decodeBtn: () => elements.get('decodeBtn'),
    clearBtn: () => elements.get('clearBtn'),
    sampleBtn: () => elements.get('sampleBtn'),
    copyQrBtn: () => elements.get('copyQrBtn'),
    scanQrBtn: () => elements.get('scanQrBtn'),
    statusText: () => elements.get('statusText'),
    errorText: () => elements.get('errorText'),
    qrOutput: () => elements.get('qrOutput'),
    imageFileInput: () => elements.get('imageFileInput'),
    xmlFileInput: () => elements.get('xmlFileInput'),
    pdfFileInput: () => elements.get('pdfFileInput'),
    imagePreview: () => elements.get('imagePreview'),
    previewImage: () => elements.get('previewImage'),
    previewText: () => elements.get('previewText'),
    dropArea: () => elements.get('dropArea'),
    workingCanvas: () => elements.get('workingCanvas'),
    pdfRenderCanvas: () => elements.get('pdfRenderCanvas'),
    scannerCanvas: () => elements.get('scannerCanvas'),
    cameraModal: () => elements.get('cameraModal'),
    cameraVideo: () => elements.get('cameraVideo'),
    switchCameraBtn: () => elements.get('switchCameraBtn'),
    closeCameraBtn: () => elements.get('closeCameraBtn'),
    cameraStatus: () => elements.get('cameraStatus'),
    scanningLine: () => elements.get('scanningLine'),
    vatRateSelect: () => elements.get('vatRateSelect'),
    calcModeSelect: () => elements.get('calcModeSelect'),
    amountInput: () => elements.get('amountInput'),
    calculateBtn: () => elements.get('calculateBtn'),
    copyVatBtn: () => elements.get('copyVatBtn'),
    advVatBtn: () => elements.get('advVatBtn'),
    vatOutput: () => elements.get('vatOutput'),
    netAmount: () => elements.get('netAmount'),
    vatAmount: () => elements.get('vatAmount'),
    grossAmount: () => elements.get('grossAmount'),
    vatAmountLabel: () => elements.get('vatAmountLabel'),
    suggestionEmail: () => elements.get('suggestionEmail'),
    suggestionText: () => elements.get('suggestionText'),
    sendSuggestionBtn: () => elements.get('sendSuggestionBtn'),
    suggestionStatus: () => elements.get('suggestionStatus')
  };

  // Utility functions
  const utils = {
    setDirection: () => {
      document.documentElement.lang = appConfig.currentLang;
      document.dir = appConfig.currentLang === 'ar' ? 'rtl' : 'ltr';
    },
    
    setStatus: (key) => {
      const strings = appConfig.strings[appConfig.currentLang];
      elements.statusText().textContent = strings[key] || strings.statusIdle;
    },
    
    setCameraStatus: (key) => {
      const strings = appConfig.strings[appConfig.currentLang];
      elements.cameraStatus().textContent = strings[key] || strings.cameraPosition;
    },
    
    formatCurrency: (amount) => {
      return new Intl.NumberFormat(
        appConfig.currentLang === 'ar' ? 'ar-SA' : 'en-SA',
        { style: 'currency', currency: 'SAR', minimumFractionDigits: 2 }
      ).format(amount);
    },
    
    updateLabels: () => {
      const strings = appConfig.strings[appConfig.currentLang];
      
      // Update all text elements
      elements.get('appTitle').textContent = strings.title;
      elements.get('langLabel').textContent = strings.lang;
      elements.get('navQrLink').textContent = strings.navQr;
      elements.get('navVatLink').textContent = strings.navVat;
      elements.get('navAdvVatLink').textContent = strings.navAdvVat;
      elements.get('vatTitle').textContent = strings.vatHeader;
      elements.get('vatRateLabel').textContent = strings.vatRate;
      elements.get('calcModeSelect').options[0].textContent = strings.modeAdd;
      elements.get('calcModeSelect').options[1].textContent = strings.modeRemove;
      elements.get('amountInput').placeholder = strings.amountPh;
      elements.get('calculateBtn').textContent = strings.calc;
      elements.get('copyVatBtn').textContent = strings.copy;
      elements.get('advVatBtn').textContent = strings.advVat;
      elements.get('netLabel').textContent = strings.net;
      elements.get('grossLabel').textContent = strings.gross;
      elements.get('qrTitle').textContent = strings.qrHeader;
      elements.get('qrDescription').innerHTML = strings.qrHelp;
      elements.get('decodeBtn').textContent = strings.decode;
      elements.get('copyQrBtn').textContent = strings.copyJSON;
      elements.get('clearBtn').textContent = strings.clear;
      elements.get('sampleBtn').textContent = strings.sample;
      elements.get('scanQrText').textContent = strings.scanQr;
      elements.get('switchCameraBtn').textContent = strings.switchCamera;
      elements.get('closeCameraBtn').textContent = strings.closeCamera;
      elements.get('suggestionTitle').textContent = strings.suggHeader;
      elements.get('suggestionDescription').innerHTML = strings.suggHelp;
      elements.get('suggestionEmail').placeholder = strings.suggEmailPh;
      elements.get('suggestionText').placeholder = strings.suggTextPh;
      elements.get('sendSuggestionBtn').textContent = strings.suggSend;
      
      utils.setStatus('statusIdle');
      utils.setCameraStatus('cameraPosition');
      vat.updateVatLabel();
    },
    
    bytesFromBase64: (b64) => {
      const binary = atob(b64);
      const bytes = new Uint8Array(binary.length);
      for (let i = 0; i < binary.length; i++) {
        bytes[i] = binary.charCodeAt(i);
      }
      return bytes;
    },
    
    parseTLV: (bytes) => {
      const records = [];
      let index = 0;
      const decoder = new TextDecoder('utf-8');
      
      while (index < bytes.length) {
        const tag = bytes[index++];
        if (index >= bytes.length) break;
        
        const length = bytes[index++];
        if (index + length > bytes.length) break;
        
        const valueBytes = bytes.slice(index, index + length);
        index += length;
        
        const value = tag === 6 ? 
          Array.from(valueBytes).map(b => b.toString(16).padStart(2, '0')).join('') :
          decoder.decode(valueBytes);
        
        records.push({
          tag,
          label: appConfig.tlvTags[tag] || `Tag ${tag}`,
          value
        });
      }
      
      return records;
    },
    
    renderTLV: (records) => {
      const container = elements.qrOutput();
      container.innerHTML = '';
      
      records.forEach(record => {
        const row = document.createElement('div');
        row.className = 'result';
        row.innerHTML = `<span>${record.label}</span><span class="value">${record.value}</span>`;
        container.appendChild(row);
      });
      
      container.hidden = false;
      elements.copyQrBtn().disabled = false;
    }
  };

  // VAT Calculator module
  const vat = {
    updateVatLabel: () => {
      const percentage = Math.round(parseFloat(elements.vatRateSelect().value) * 100);
      const strings = appConfig.strings[appConfig.currentLang];
      elements.vatAmountLabel().textContent = `${strings.vat} (${percentage}%)`;
    },
    
    calculate: () => {
      const rawAmount = parseFloat((elements.amountInput().value || '').replace(/,/g, ''));
      
      if (isNaN(rawAmount) || rawAmount < 0) {
        alert(appConfig.currentLang === 'ar' ? 'أدخل مبلغاً صالحاً' : 'Enter a valid amount');
        return;
      }
      
      const rate = parseFloat(elements.vatRateSelect().value);
      let net, vatAmt, gross;
      
      if (elements.calcModeSelect().value === 'add') {
        net = rawAmount;
        vatAmt = +(rawAmount * rate).toFixed(2);
        gross = +(net + vatAmt).toFixed(2);
      } else {
        gross = rawAmount;
        net = +(gross / (1 + rate)).toFixed(2);
        vatAmt = +(gross - net).toFixed(2);
      }
      
      elements.netAmount().textContent = utils.formatCurrency(net);
      elements.vatAmount().textContent = utils.formatCurrency(vatAmt);
      elements.grossAmount().textContent = utils.formatCurrency(gross);
      
      elements.vatOutput().hidden = false;
      elements.copyVatBtn().disabled = false;
      vat.updateVatLabel();
    },
    
    copyResults: () => {
      const strings = appConfig.strings[appConfig.currentLang];
      const text = `${strings.net}: ${elements.netAmount().textContent}\n${elements.vatAmountLabel().textContent}: ${elements.vatAmount().textContent}\n${strings.gross}: ${elements.grossAmount().textContent}`;
      
      navigator.clipboard.writeText(text).then(() => {
        const btn = elements.copyVatBtn();
        btn.textContent = appConfig.currentLang === 'ar' ? 'تم النسخ!' : 'Copied!';
        setTimeout(() => btn.textContent = strings.copy, 1200);
      });
    }
  };

  // QR Code processing module
  const qr = {
    decode: () => {
      const base64Data = elements.qrTextInput().value.trim();
      
      if (!base64Data) {
        alert(appConfig.currentLang === 'ar' ? 
          appConfig.strings.ar.pastePrompt : 
          appConfig.strings.en.pastePrompt
        );
        return;
      }
      
      try {
        const bytes = utils.bytesFromBase64(base64Data);
        const records = utils.parseTLV(bytes);
        utils.renderTLV(records);
        elements.errorText().textContent = '';
      } catch (error) {
        elements.errorText().textContent = appConfig.currentLang === 'ar' ? 
          appConfig.strings.ar.decodeFail : 
          appConfig.strings.en.decodeFail;
      }
    },
    
    copyJSON: () => {
      const rows = [...elements.qrOutput().querySelectorAll('.result')].map(row => [
        row.firstChild.textContent.trim(),
        row.lastChild.textContent.trim()
      ]);
      
      const obj = Object.fromEntries(rows);
      
      navigator.clipboard.writeText(JSON.stringify(obj, null, 2)).then(() => {
        const btn = elements.copyQrBtn();
        btn.textContent = appConfig.currentLang === 'ar' ? 'تم النسخ!' : 'Copied!';
        setTimeout(() => {
          btn.textContent = appConfig.currentLang === 'ar' ? 
            appConfig.strings.ar.copyJSON : 
            appConfig.strings.en.copyJSON;
        }, 1200);
      });
    },
    
    useSample: () => {
      elements.qrTextInput().value = appConfig.sampleBase64;
      qr.decode();
    },
    
    clear: () => {
      elements.qrTextInput().value = '';
      elements.qrOutput().hidden = true;
      elements.qrOutput().innerHTML = '';
      elements.copyQrBtn().disabled = true;
      elements.errorText().textContent = '';
      utils.setStatus('statusIdle');
      elements.imagePreview().hidden = true;
      elements.previewImage().src = '';
      
      ['imageFileInput', 'xmlFileInput', 'pdfFileInput'].forEach(id => {
        const input = elements.get(id);
        if (input) input.value = '';
      });
      
      const workCanvas = elements.workingCanvas();
      if (workCanvas) {
        workCanvas.width = 0;
        workCanvas.height = 0;
      }
      
      const pdfCanvas = elements.pdfRenderCanvas();
      if (pdfCanvas) {
        pdfCanvas.width = 0;
        pdfCanvas.height = 0;
        const ctx = pdfCanvas.getContext('2d');
        if (ctx) ctx.clearRect(0, 0, pdfCanvas.width, pdfCanvas.height);
      }
      
      const scannerCanvas = elements.scannerCanvas();
      if (scannerCanvas) {
        scannerCanvas.width = 0;
        scannerCanvas.height = 0;
      }
      
      // Clear VAT section
      elements.amountInput().value = '';
      elements.vatOutput().hidden = true;
      elements.copyVatBtn().disabled = false;
      elements.vatRateSelect().value = '0.15';
      elements.calcModeSelect().value = 'add';
      vat.updateVatLabel();
      
      // Clear suggestions
      elements.suggestionEmail().value = '';
      elements.suggestionText().value = '';
      elements.suggestionStatus().textContent = '';
    }
  };

  // Camera Scanner module
  const cameraScanner = {
    stream: null,
    scanning: false,
    currentDeviceId: null,
    devices: [],
    scanInterval: null,
    
    isSupported: () => {
      return !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia);
    },
    
    init: async () => {
      if (!cameraScanner.isSupported()) {
        alert(appConfig.currentLang === 'ar' ? 
          appConfig.strings.ar.cameraNoSupport : 
          appConfig.strings.en.cameraNoSupport
        );
        return false;
      }
      
      try {
        // Get available cameras
        const devices = await navigator.mediaDevices.enumerateDevices();
        cameraScanner.devices = devices.filter(device => device.kind === 'videoinput');
        
        if (cameraScanner.devices.length === 0) {
          throw new Error('No cameras found');
        }
        
        // Show switch button only if multiple cameras
        elements.switchCameraBtn().style.display = 
          cameraScanner.devices.length > 1 ? 'block' : 'none';
        
        return true;
      } catch (error) {
        utils.setCameraStatus('cameraError');
        return false;
      }
    },
    
    startCamera: async (deviceId = null) => {
      try {
        // Stop existing stream
        if (cameraScanner.stream) {
          cameraScanner.stopCamera();
        }
        
        const constraints = {
          video: {
            facingMode: deviceId ? undefined : { ideal: 'environment' },
            deviceId: deviceId ? { exact: deviceId } : undefined,
            width: { ideal: 1280 },
            height: { ideal: 720 }
          }
        };
        
        cameraScanner.stream = await navigator.mediaDevices.getUserMedia(constraints);
        elements.cameraVideo().srcObject = cameraScanner.stream;
        
        // Store current device
        const track = cameraScanner.stream.getVideoTracks()[0];
        cameraScanner.currentDeviceId = track.getSettings().deviceId;
        
        // Start scanning
        cameraScanner.startScanning();
        
        return true;
      } catch (error) {
        utils.setCameraStatus('cameraError');
        return false;
      }
    },
    
    stopCamera: () => {
      if (cameraScanner.stream) {
        cameraScanner.stream.getTracks().forEach(track => track.stop());
        cameraScanner.stream = null;
      }
      cameraScanner.stopScanning();
    },
    
    startScanning: () => {
      if (cameraScanner.scanning) return;
      
      cameraScanner.scanning = true;
      elements.scanningLine().classList.add('active');
      utils.setCameraStatus('cameraScanning');
      
      cameraScanner.scanInterval = setInterval(() => {
        cameraScanner.scanFrame();
      }, 500); // Scan every 500ms
    },
    
    stopScanning: () => {
      cameraScanner.scanning = false;
      elements.scanningLine().classList.remove('active');
      
      if (cameraScanner.scanInterval) {
        clearInterval(cameraScanner.scanInterval);
        cameraScanner.scanInterval = null;
      }
    },
    
    scanFrame: async () => {
      if (!cameraScanner.scanning || !cameraScanner.stream) return;
      
      const video = elements.cameraVideo();
      const canvas = elements.scannerCanvas();
      const ctx = canvas.getContext('2d');
      
      // Set canvas size to video size
      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;
      
      if (canvas.width === 0 || canvas.height === 0) return;
      
      // Draw current frame to canvas
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
      
      try {
        let qrValue = null;
        
        // Try BarcodeDetector first (if available)
        if ('BarcodeDetector' in window) {
          try {
            const detector = new BarcodeDetector({ formats: ['qr_code'] });
            const codes = await detector.detect(canvas);
            qrValue = codes?.[0]?.rawValue || null;
          } catch (error) {}
        }
        
        // Fallback to jsQR
        if (!qrValue) {
          qrValue = await imageProcessor.decodeFromCanvas(canvas);
        }
        
        if (qrValue) {
          utils.setCameraStatus('cameraFound');
          elements.qrTextInput().value = qrValue;
          
          // Close camera and decode
          cameraScanner.close();
          qr.decode();
          
          utils.setStatus('statusRead');
        }
      } catch (error) {
        // Continue scanning on error
      }
    },
    
    switchCamera: async () => {
      if (cameraScanner.devices.length <= 1) return;
      
      // Find next camera
      let nextIndex = 0;
      if (cameraScanner.currentDeviceId) {
        const currentIndex = cameraScanner.devices.findIndex(
          device => device.deviceId === cameraScanner.currentDeviceId
        );
        nextIndex = (currentIndex + 1) % cameraScanner.devices.length;
      }
      
      const nextDevice = cameraScanner.devices[nextIndex];
      await cameraScanner.startCamera(nextDevice.deviceId);
    },
    
    open: async () => {
      const initialized = await cameraScanner.init();
      if (!initialized) return;
      
      elements.cameraModal().style.display = 'flex';
      document.body.style.overflow = 'hidden'; // Prevent background scroll
      
      const started = await cameraScanner.startCamera();
      if (!started) {
        cameraScanner.close();
      }
    },
    
    close: () => {
      elements.cameraModal().style.display = 'none';
      document.body.style.overflow = ''; // Restore scroll
      cameraScanner.stopCamera();
      utils.setCameraStatus('cameraPosition');
    }
  };

  // Image processing for QR codes
  const imageProcessor = {
    isBarcodeDetectorSupported: 'BarcodeDetector' in window,
    
    init: () => {
      if (!imageProcessor.isBarcodeDetectorSupported) {
        utils.setStatus('statusFallback');
      }
    },
    
    detectFromBitmap: async (bitmap) => {
      try {
        if (!imageProcessor.isBarcodeDetectorSupported) return null;
        const detector = new BarcodeDetector({ formats: ['qr_code'] });
        const codes = await detector.detect(bitmap);
        return codes?.[0]?.rawValue || null;
      } catch (error) {
        return null;
      }
    },
    
    loadZXing: () => {
      return new Promise((resolve, reject) => {
        if (window.ZXing && window.ZXing.BrowserQRCodeReader) {
          return resolve(window.ZXing);
        }
        
        const script = document.createElement('script');
        script.src = 'https://unpkg.com/@zxing/library@0.20.0/umd/index.min.js';
        script.onload = () => resolve(window.ZXing);
        script.onerror = () => reject(new Error('ZXing load failed'));
        document.head.appendChild(script);
      });
    },
    
    decodeWithZXing: async (imageUrl) => {
      try {
        const ZXing = await imageProcessor.loadZXing();
        const reader = new ZXing.BrowserQRCodeReader();
        const result = await reader.decodeFromImageUrl(imageUrl);
        return result?.getText ? result.getText() : (result?.text || null);
      } catch (error) {
        return null;
      }
    },
    
    loadJsQR: () => {
      return new Promise((resolve, reject) => {
        if (window.jsQR) return resolve(window.jsQR);
        
        const script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.js';
        script.onload = () => resolve(window.jsQR);
        script.onerror = () => reject(new Error('jsQR load failed'));
        document.head.appendChild(script);
      });
    },
    
    decodeFromCanvas: async (canvas) => {
      try {
        const ctx = canvas.getContext('2d');
        const { data, width, height } = ctx.getImageData(0, 0, canvas.width, canvas.height);
        const jsQR = await imageProcessor.loadJsQR();
        const code = jsQR(data, width, height);
        return code && code.data ? code.data : null;
      } catch (error) {
        return null;
      }
    },
    
    processImageFile: async (file) => {
      const imageUrl = URL.createObjectURL(file);
      const img = new Image();
      
      img.onload = async () => {
        elements.previewImage().src = imageUrl;
        elements.imagePreview().hidden = false;
        elements.previewText().textContent = appConfig.currentLang === 'ar' ? 
          appConfig.strings.ar.previewUp : 
          appConfig.strings.en.previewUp;
        
        let qrValue = null;
        
        // Try native BarcodeDetector first
        try {
          const bitmap = await createImageBitmap(file);
          qrValue = await imageProcessor.detectFromBitmap(bitmap);
        } catch (error) {}
        
        // Fallback to ZXing
        if (!qrValue) {
          utils.setStatus('statusTryFallback');
          qrValue = await imageProcessor.decodeWithZXing(imageUrl);
        }
        
        // Fallback to jsQR
        if (!qrValue) {
          const canvas = elements.workingCanvas();
          const ctx = canvas.getContext('2d');
          canvas.width = img.naturalWidth;
          canvas.height = img.naturalHeight;
          ctx.drawImage(img, 0, 0);
          qrValue = await imageProcessor.decodeFromCanvas(canvas);
        }
        
        if (qrValue) {
          elements.qrTextInput().value = qrValue;
          qr.decode();
          utils.setStatus('statusRead');
          elements.previewText().textContent = appConfig.currentLang === 'ar' ? 
            appConfig.strings.ar.previewOK : 
            appConfig.strings.en.previewOK;
        } else {
          utils.setStatus('statusNoQR');
          elements.previewText().textContent = appConfig.currentLang === 'ar' ? 
            appConfig.strings.ar.previewFail : 
            appConfig.strings.en.previewFail;
        }
      };
      
      img.onerror = () => utils.setStatus('statusErr');
      img.src = imageUrl;
    }
  };

  // XML processing
  const xmlProcessor = {
    processXmlText: (xmlText) => {
      try {
        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(xmlText, 'application/xml');
        
        if (xmlDoc.getElementsByTagName('parsererror').length) {
          throw new Error('Invalid XML');
        }
        
        const additionalRefs = [...xmlDoc.getElementsByTagName('*')]
          .filter(node => node.localName === 'AdditionalDocumentReference');
        
        let foundBase64 = null;
        
        for (const ref of additionalRefs) {
          const idNode = [...ref.getElementsByTagName('*')]
            .find(node => node.localName === 'ID');
          
          const isQRRef = idNode && (idNode.textContent || '').trim().toUpperCase() === 'QR';
          
          if (isQRRef) {
            const binaryObj = [...ref.getElementsByTagName('*')]
              .find(node => node.localName === 'EmbeddedDocumentBinaryObject');
            
            if (binaryObj && (binaryObj.textContent || '').trim()) {
              foundBase64 = binaryObj.textContent.trim();
              break;
            }
          }
        }
        
        if (foundBase64) {
          elements.qrTextInput().value = foundBase64;
          qr.decode();
          utils.setStatus('xmlFound');
        } else {
          utils.setStatus('xmlNotFound');
        }
      } catch (error) {
        utils.setStatus('xmlParseFail');
      }
    }
  };

  // PDF processing
  const pdfProcessor = {
    loadPdfJS: () => {
      return new Promise((resolve, reject) => {
        if (window['pdfjsLib']) return resolve(window['pdfjsLib']);
        
        const script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js';
        script.onload = () => {
          pdfjsLib.GlobalWorkerOptions.workerSrc = 
            'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';
          resolve(window['pdfjsLib']);
        };
        script.onerror = () => reject(new Error('pdf.js load failed'));
        document.head.appendChild(script);
      });
    },
    
    looksLikeTLV: (base64String) => {
      try {
        const bytes = utils.bytesFromBase64(base64String);
        const tag = bytes[0];
        const length = bytes[1];
        return tag >= 1 && tag <= 10 && length > 0 && (2 + length) <= bytes.length;
      } catch (error) {
        return false;
      }
    },
    
    scanPdfText: async (pdf) => {
      for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
        const page = await pdf.getPage(pageNum);
        const textContent = await page.getTextContent();
        const text = textContent.items.map(item => item.str).join(' ');
        
        const base64Regex = /[A-Za-z0-9+/=]{80,}/g;
        let match;
        
        while ((match = base64Regex.exec(text))) {
          const candidate = match[0];
          if (pdfProcessor.looksLikeTLV(candidate)) {
            return candidate;
          }
        }
      }
      return null;
    },
    
    scanCanvasForQR: async (canvas) => {
      let qrValue = null;
      
      // Try BarcodeDetector first
      try {
        if ('BarcodeDetector' in window) {
          const bitmap = await createImageBitmap(canvas);
          qrValue = await imageProcessor.detectFromBitmap(bitmap);
          if (qrValue) return qrValue;
        }
      } catch (error) {}
      
      // Try jsQR
      qrValue = await imageProcessor.decodeFromCanvas(canvas);
      if (qrValue) return qrValue;
      
      // Try ZXing as last resort
      try {
        const dataUrl = canvas.toDataURL('image/png');
        qrValue = await imageProcessor.decodeWithZXing(dataUrl);
        return qrValue;
      } catch (error) {
        return null;
      }
    },
    
    processPdfFile: async (file) => {
      utils.setStatus('pdfProcessing');
      const arrayBuffer = await file.arrayBuffer();
      
      try {
        const pdfjsLib = await pdfProcessor.loadPdfJS();
        const pdf = await pdfjsLib.getDocument({ data: arrayBuffer }).promise;
        
        // First try to extract Base64 from text
        const base64FromText = await pdfProcessor.scanPdfText(pdf);
        if (base64FromText) {
          elements.qrTextInput().value = base64FromText;
          qr.decode();
          utils.setStatus('pdfRead');
          return;
        }
        
        // If no Base64 in text, render pages and scan for QR codes
        const canvas = elements.pdfRenderCanvas();
        const ctx = canvas.getContext('2d');
        let foundQR = null;
        
        for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
          const page = await pdf.getPage(pageNum);
          const viewport = page.getViewport({ scale: 3.0 });
          
          canvas.width = viewport.width;
          canvas.height = viewport.height;
          
          await page.render({ canvasContext: ctx, viewport }).promise;
          
          foundQR = await pdfProcessor.scanCanvasForQR(canvas);
          if (foundQR) break;
        }
        
        if (foundQR) {
          elements.qrTextInput().value = foundQR;
          qr.decode();
          utils.setStatus('pdfRead');
        } else {
          utils.setStatus('pdfNoQR');
        }
      } catch (error) {
        utils.setStatus('statusErr');
      }
    }
  };

  // Drag and drop functionality
  const dragDrop = {
    init: () => {
      const dropZone = elements.dropArea();
      
      const preventDefault = (e) => {
        e.preventDefault();
        e.stopPropagation();
      };
      
      ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, (e) => {
          preventDefault(e);
          dropZone.classList.add('dragover');
        });
      });
      
      ['dragleave', 'dragend', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, (e) => {
          if (eventName !== 'drop') {
            dropZone.classList.remove('dragover');
          }
        });
      });
      
      dropZone.addEventListener('drop', async (e) => {
        preventDefault(e);
        dropZone.classList.remove('dragover');
        
        const dataTransfer = e.dataTransfer;
        
        // Handle file drops
        if (dataTransfer.files && dataTransfer.files.length) {
          for (const file of dataTransfer.files) {
            if (file.type.startsWith('image/')) {
              await imageProcessor.processImageFile(file);
              return;
            }
            
            if (file.type === 'application/pdf' || file.name.toLowerCase().endsWith('.pdf')) {
              await pdfProcessor.processPdfFile(file);
              return;
            }
            
            if (file.type.includes('xml') || file.name.toLowerCase().endsWith('.xml')) {
              xmlProcessor.processXmlText(await file.text());
              return;
            }
            
            // Try as Base64 text
            try {
              const text = await file.text();
              if (/^[A-Za-z0-9+/=\s]+$/.test(text.trim())) {
                elements.qrTextInput().value = text.trim();
                qr.decode();
                return;
              }
            } catch (error) {}
          }
          return;
        }
        
        // Handle text drops
        const plainText = dataTransfer.getData('text/plain');
        if (plainText && plainText.trim()) {
          elements.qrTextInput().value = plainText.trim();
          qr.decode();
          return;
        }
        
        // Handle URL drops
        const urlData = dataTransfer.getData('text/uri-list') || dataTransfer.getData('text/html');
        if (urlData) {
          try {
            const response = await fetch(urlData);
            const blob = await response.blob();
            
            if (blob.type.startsWith('image/')) {
              const file = new File([blob], 'dropped-image', { type: blob.type });
              await imageProcessor.processImageFile(file);
              return;
            }
          } catch (error) {}
        }
      });
    }
  };

  // Suggestions functionality
  const suggestions = {
    webAppUrl: 'https://script.google.com/macros/s/AKfycbw50xtZU-PCZ1RzrQudXsxfm2OFlkUno_9v9KMNqKX1b2df7Fq2s392KuBrvofS0oRHKg/exec', // Configure if needed
    fallbackEmail: 'suggestion@dxneo.com',
    
    openMailto: (subject, body) => {
      const link = document.createElement('a');
      link.href = `mailto:${encodeURIComponent(suggestions.fallbackEmail)}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
      link.style.display = 'none';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    },
    
    send: async () => {
      const strings = appConfig.strings[appConfig.currentLang];
      const suggestionText = elements.suggestionText().value.trim();
      const email = elements.suggestionEmail().value.trim();
      const status = elements.suggestionStatus();
      
      if (!suggestionText) {
        alert(appConfig.currentLang === 'ar' ? 
          'اكتب اقتراحك أولاً' : 
          'Please type your suggestion first'
        );
        return;
      }
      
      status.textContent = '';
      
      const payload = {
        text: suggestionText,
        from: email,
        url: location.href,
        userAgent: navigator.userAgent,
        timestamp: new Date().toISOString()
      };
      
      // Try Google Sheets web app first
      if (suggestions.webAppUrl) {
        try {
          const response = await fetch(suggestions.webAppUrl, {
            method: 'POST',
            headers: { 'Content-Type':'text/plain;charset=utf-8' },
            body: JSON.stringify(payload)
          });
          
          if (response.ok) {
            status.textContent = strings.suggSent;
            status.style.color = '#8be28b';
            return;
          }
        } catch (error) {}
      }
      
      // Fallback to email
      const subject = '[ZATCA+VAT] Feature suggestion';
      const body = `${suggestionText}\n\nFrom: ${email || '-'}\nURL: ${location.href}\nUser-Agent: ${navigator.userAgent}\nTime: ${new Date().toISOString()}`;
      
      try {
        suggestions.openMailto(subject, body);
        status.textContent = appConfig.currentLang === 'ar' ? 
          'تم تجهيز الرسالة في البريد لديك' : 
          'Your email app was opened with the suggestion';
        status.style.color = '#8be28b';
      } catch (error) {
        status.textContent = strings.suggFail;
        status.style.color = '#ff7b7b';
      }
    }
  };

  // Event listeners setup
  const events = {
    init: () => {
      // Language change
      elements.langSelect().addEventListener('change', (e) => {
        appConfig.currentLang = e.target.value;
        localStorage.setItem('lang', appConfig.currentLang);
        utils.setDirection();
        utils.updateLabels();
      });
      
      // VAT calculator
      elements.vatRateSelect().addEventListener('change', vat.updateVatLabel);
      elements.calculateBtn().addEventListener('click', vat.calculate);
      elements.copyVatBtn().addEventListener('click', vat.copyResults);
      
      // QR decoder
      elements.decodeBtn().addEventListener('click', qr.decode);
      elements.copyQrBtn().addEventListener('click', qr.copyJSON);
      elements.clearBtn().addEventListener('click', qr.clear);
      elements.sampleBtn().addEventListener('click', qr.useSample);
      elements.scanQrBtn().addEventListener('click', cameraScanner.open);
      
      // Camera controls
      elements.switchCameraBtn().addEventListener('click', cameraScanner.switchCamera);
      elements.closeCameraBtn().addEventListener('click', cameraScanner.close);
      
      // Close camera modal on escape key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && elements.cameraModal().style.display === 'flex') {
          cameraScanner.close();
        }
      });
      
      // File inputs
      elements.imageFileInput().addEventListener('change', async (e) => {
        const file = e.target.files?.[0];
        if (file) await imageProcessor.processImageFile(file);
      });
      
      elements.xmlFileInput().addEventListener('change', async (e) => {
        const file = e.target.files?.[0];
        if (file) xmlProcessor.processXmlText(await file.text());
      });
      
      elements.pdfFileInput().addEventListener('change', async (e) => {
        const file = e.target.files?.[0];
        if (file) await pdfProcessor.processPdfFile(file);
      });
      
      // Suggestions
      elements.sendSuggestionBtn().addEventListener('click', suggestions.send);
    }
  };

  // Main initialization
  window.initApp = () => {
    // Load saved language
    appConfig.currentLang = localStorage.getItem('lang') || 'en';
    elements.langSelect().value = appConfig.currentLang;
    
    // Initialize modules
    utils.setDirection();
    utils.updateLabels();
    imageProcessor.init();
    dragDrop.init();
    events.init();
  };

})();
</script>
</body>
</html>
