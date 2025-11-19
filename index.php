<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Shamim Rizvi</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <link href="https://fonts.googleapis.com/css2?family=Radio+Canada+Big&family=Radio+Canada&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      background-color: #fff;
      font-size: 18px;
      padding: 0;
    }
    .fontstyle1 { font-family: "Radio Canada", sans-serif; }
    .fontstyle2 { font-family: "Oswald", sans-serif; }
    h1 { font-size: 42px; margin: 0; font-weight: normal; }
    h3 { font-size: 32px; margin: 0; font-weight: normal; }

    @media screen and (max-width:639px) {
      .devicewidth { width: 100% }
      h1 { font-size: 34px; }
      h3 { font-size: 23px; }
    }

    @media screen and (max-width:479px) {
      .devicewidth { width: 100% }
      h1 { font-size: 25px; }
      h3 { font-size: 17px; }
    }

    #contactModal {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: 9999;
      justify-content: center;
      align-items: center;
    }
    #contactModal .modal-content {
      background: white;
      padding: 24px;
      border-radius: 12px;
      max-width: 460px;
      width: 90%;
      position: relative;
      font-family: 'Segoe UI', sans-serif;
    }
    #contactModal h2 {
      text-align: center;
      color: #1e40af;
      margin-top: 0;
    }
    #contactModal label {
      display: block;
      margin-top: 10px;
      font-weight: 500;
      color: #1e293b;
    }
    #contactModal input {
      width: 100%;
      padding: 10px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      margin-top: 4px;
    }
    .toggle-btn {
      margin: 16px auto;
      display: block;
      background-color: #f1f5f9;
      border: none;
      color: #1e293b;
      font-weight: 500;
      padding: 10px 16px;
      border-radius: 8px;
      cursor: pointer;
    }
    .advanced {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.5s ease;
    }
    .advanced.show {
      max-height: 800px;
    }
    .download-btn {
      margin-top: 20px;
      width: 100%;
      background-color: #2563eb;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 10px;
      font-size: 1rem;
      cursor: pointer;
    }
    .close-btn {
      position: absolute;
      top: 12px;
      right: 16px;
      font-size: 22px;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div style="max-width:750px; margin:auto; width:100%; border:1px solid #ddd;">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td rowspan="6" valign="top" style="background: #cb2f1e;" width="12"></td>
        <td rowspan="6" valign="top" width="4"></td>
        <td rowspan="6" valign="top" style="background: #01417a;" width="8"></td>
        <td rowspan="6" valign="top" width="4"></td>
        <td valign="top"><a href="https://arihantgold.com/" target="_blank"><img src="images/logo.jpg" style="width: 100%; display: block;" alt=""></a></td>
      </tr>
      <tr>
        <td style="text-align: center; padding: 12px; color: #01417a"><h1 class="fontstyle1"><strong>Shamim Rizvi</strong></h1></td>
      </tr>
      <tr>
        <td><img src="images/product.jpg" style="width: 100%; display: block;" alt=""></td>
      </tr>
      <tr>
        <td><img src="images/industries.jpg" style="width: 100%; display: block;" alt=""></td>
      </tr>
      <tr>
        <td style="padding: 8px 0px;">
          <table width="98%" border="0" align="center" cellpadding="3" cellspacing="0">
            <tr>
              <td align="center"><a href="tel:+919374931199"><img src="images/call-icon.png" style="max-width: 98px; width: 100%;" alt="Mobile Number"></a></td>
              <td align="center"><a href="https://wa.me/919374931199" target="_blank"><img src="images/whatsapp.png" style="max-width: 98px; width: 100%;" alt="WhatsApp"></a></td>
              <td align="center"><a href="mailto:shamim.r@arihantgold.com" target="_blank"><img src="images/email.png" style="max-width: 98px; width: 100%;" alt="Email ID"></a></td>
              <td align="center"><a href="https://arihantgold.com/" target="_blank"><img src="images/web.png" style="max-width: 98px; width: 100%;" alt="Website"></a></td>
              <td align="center"><a href="https://maps.app.goo.gl/gvmM1jJwyQ3x3GMw6" target="_blank"><img src="images/map.png" style="max-width: 98px; width: 100%;" alt="Address"></a></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td style="text-align: center; padding: 10px;">
          <button onclick="openModal()" style="background-color: #01417a; color: white; border: none; padding: 12px 24px; font-size: 18px; border-radius: 25px; cursor: pointer;">
            Save Contact
          </button>
        </td>
      </tr>
    </table>
  </div>

  <div id="contactModal">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal()">&times;</span>
      <h2>📇 Save Contact</h2>
      <form id="contactForm">
        <label>First Name:</label>
        <input type="text" name="firstName" value="Shamim" required />
        <label>Last Name:</label>
        <input type="text" name="lastName" value="Rizvi" required />
        <label>Phone:</label>
        <input type="tel" name="phone" value="+91 9374931199" required />
        <button type="button" class="toggle-btn" onclick="toggleAdvanced()">+ More Fields</button>
        <div class="advanced" id="advancedFields">
          <label>Title / Position:</label>
          <input type="text" name="title" value="CAO" />
          <label>Company:</label>
          <input type="text" name="company" value="Arihant Gold Plast Pvt Ltd" />
          <label>Personal Email:</label>
          <input type="email" name="email" value="rizvishamim@hotmail.com" />
          <label>Work Email:</label>
          <input type="email" name="workEmail" value="shamim.r@arihantgold.com" />
          <label>Website URL:</label>
          <input type="url" name="website" value="https://arihantgold.com" />
          <label>LinkedIn URL:</label>
          <input type="url" name="linkedin" value="https://www.linkedin.com/in/shamimrizvi" />
        </div>
        <button type="button" class="download-btn" onclick="downloadVCF()">Save Contact</button>
      </form>
    </div>
  </div>

  <script>
    function openModal() {
      document.getElementById('contactModal').style.display = 'flex';
    }
    function closeModal() {
      document.getElementById('contactModal').style.display = 'none';
    }
    function toggleAdvanced() {
      const section = document.getElementById('advancedFields');
      section.classList.toggle('show');
    }
    function downloadVCF() {
      const form = document.getElementById('contactForm');
      const firstName = form.firstName.value.trim();
      const lastName = form.lastName.value.trim();
      const fullName = firstName + ' ' + lastName;
      const title = form.title.value.trim();
      const company = form.company.value.trim();
      const phone = form.phone.value.trim();
      const email = form.email.value.trim();
      const workEmail = form.workEmail.value.trim();
      const website = form.website.value.trim();
      const linkedin = form.linkedin.value.trim();

      const vcf = `BEGIN:VCARD
VERSION:3.0
N:${lastName};${firstName};;;
FN:${fullName}
TITLE:${title}
ORG:${company}
TEL;TYPE=WORK,VOICE:${phone}
EMAIL;TYPE=HOME,INTERNET:${email}
EMAIL;TYPE=WORK,INTERNET:${workEmail}
URL:${website}
URL;TYPE=LinkedIn:${linkedin}
END:VCARD`;

      const blob = new Blob([vcf], { type: 'text/vcard' });
      const link = document.createElement('a');
      link.href = URL.createObjectURL(blob);
      link.download = `${fullName.replace(/\s+/g, '_').toLowerCase()}.vcf`;
      link.click();
    }
  </script>
</body>
</html>

