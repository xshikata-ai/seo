<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="icon.svg" type="image/svg+xml" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ByajBatta</title>
    <link rel="manifest" href="manifest.json" />
    <meta name="theme-color" content="#eab308" />
    <link rel="apple-touch-icon" href="icon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- PDF Export Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
      /* Primary Accent Theme variables */
      :root { /* Default Yellow Theme */
        --color-primary-50: 254 252 232;
        --color-primary-100: 254 249 195;
        --color-primary-200: 254 240 138;
        --color-primary-300: 253 224 71;
        --color-primary-400: 250 204 21;
        --color-primary-500: 234 179 8;
        --color-primary-600: 202 138 4;
        --color-primary-700: 161 98 7;
        --color-primary-800: 133 77 14;
        --color-primary-900: 113 63 18;
        --color-primary-950: 66 32 6;
      }
      .theme-blue {
        --color-primary-50: 239 246 255;
        --color-primary-100: 219 234 254;
        --color-primary-200: 191 219 254;
        --color-primary-300: 147 197 253;
        --color-primary-400: 96 165 250;
        --color-primary-500: 59 130 246;
        --color-primary-600: 37 99 235;
        --color-primary-700: 29 78 216;
        --color-primary-800: 30 64 175;
        --color-primary-900: 30 58 138;
        --color-primary-950: 23 37 84;
      }
      .theme-green {
        --color-primary-50: 240 253 244;
        --color-primary-100: 220 252 231;
        --color-primary-200: 187 247 208;
        --color-primary-300: 134 239 172;
        --color-primary-400: 74 222 128;
        --color-primary-500: 34 197 94;
        --color-primary-600: 22 163 74;
        --color-primary-700: 21 128 61;
        --color-primary-800: 22 101 52;
        --color-primary-900: 20 83 45;
        --color-primary-950: 5 46 22;
      }
      
      /* Background Theme variables */
      :root { /* Default: Deep Ocean Theme */
        --color-bg-body: 11 19 30; /* #0b131e */
        --color-text-main: 248 250 252; /* gray-50 */
        --color-text-muted: 156 163 175; /* gray-400 */
        --color-text-sidebar-muted: 156 163 175; /* gray-400 */
        --color-bg-card: 17 28 42; /* #111c2a */
        --color-bg-sidebar: 17 28 42; /* #111c2a */
        --color-bg-header-from: 11 19 30; /* #0b131e */
        --color-bg-header-to: 17 28 42; /* #111c2a */
        --color-bg-input: 55 65 81; /* gray-700 */
        --color-bg-hover: 31 41 55; /* gray-800 */
        --color-border: 30 46 62; /* #1e2e3e */
        --color-border-input: 75 85 99; /* gray-600 */
      }
      .theme-light {
        --color-bg-body: 243 244 246; /* gray-100 */
        --color-text-main: 31 41 55; /* gray-800 */
        --color-text-muted: 75 85 99; /* gray-600 */
        --color-text-sidebar-muted: 55 65 81; /* gray-700 */
        --color-bg-card: 255 255 255; /* white */
        --color-bg-sidebar: 255 255 255; /* white */
        --color-bg-header-from: 255 255 255; /* white */
        --color-bg-header-to: 249 250 251; /* gray-50 */
        --color-bg-input: 229 231 235; /* gray-200 */
        --color-bg-hover: 243 244 246; /* gray-100 */
        --color-border: 229 231 235; /* gray-200 */
        --color-border-input: 209 213 219; /* gray-300 */
      }
      .theme-slate {
        --color-bg-body: 15 23 42; /* slate-900 */
        --color-text-main: 241 245 249; /* slate-100 */
        --color-text-muted: 148 163 184; /* slate-400 */
        --color-text-sidebar-muted: 148 163 184; /* slate-400 */
        --color-bg-card: 30 41 59; /* slate-800 */
        --color-bg-sidebar: 30 41 59; /* slate-800 */
        --color-bg-header-from: 15 23 42; /* slate-900 */
        --color-bg-header-to: 30 41 59; /* slate-800 */
        --color-bg-input: 51 65 85; /* slate-700 */
        --color-bg-hover: 51 65 85; /* slate-700 */
        --color-border: 51 65 85; /* slate-700 */
        --color-border-input: 71 85 105; /* slate-600 */
      }
    </style>
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            fontFamily: {
              sans: ['Poppins', 'sans-serif'],
            },
            colors: {
              'primary': {
                '50': 'rgb(var(--color-primary-50) / <alpha-value>)',
                '100': 'rgb(var(--color-primary-100) / <alpha-value>)',
                '200': 'rgb(var(--color-primary-200) / <alpha-value>)',
                '300': 'rgb(var(--color-primary-300) / <alpha-value>)',
                '400': 'rgb(var(--color-primary-400) / <alpha-value>)',
                '500': 'rgb(var(--color-primary-500) / <alpha-value>)',
                '600': 'rgb(var(--color-primary-600) / <alpha-value>)',
                '700': 'rgb(var(--color-primary-700) / <alpha-value>)',
                '800': 'rgb(var(--color-primary-800) / <alpha-value>)',
                '900': 'rgb(var(--color-primary-900) / <alpha-value>)',
                '950': 'rgb(var(--color-primary-950) / <alpha-value>)',
              },
              'body-bg': 'rgb(var(--color-bg-body) / <alpha-value>)',
              'text-main': 'rgb(var(--color-text-main) / <alpha-value>)',
              'text-muted': 'rgb(var(--color-text-muted) / <alpha-value>)',
              'text-sidebar-muted': 'rgb(var(--color-text-sidebar-muted) / <alpha-value>)',
              'card-bg': 'rgb(var(--color-bg-card) / <alpha-value>)',
              'sidebar-bg': 'rgb(var(--color-bg-sidebar) / <alpha-value>)',
              'header-from': 'rgb(var(--color-bg-header-from) / <alpha-value>)',
              'header-to': 'rgb(var(--color-bg-header-to) / <alpha-value>)',
              'input-bg': 'rgb(var(--color-bg-input) / <alpha-value>)',
              'hover-bg': 'rgb(var(--color-bg-hover) / <alpha-value>)',
              'border-color': 'rgb(var(--color-border) / <alpha-value>)',
              'border-input': 'rgb(var(--color-border-input) / <alpha-value>)',
            }
          }
        }
      }
    </script>
  <script type="importmap">
{
  "imports": {
    "react-dom/": "https://aistudiocdn.com/react-dom@^19.2.0/",
    "react-dom": "https://aistudiocdn.com/react-dom@^19.2.0",
    "react/": "https://aistudiocdn.com/react@^19.2.0/",
    "react": "https://aistudiocdn.com/react@^19.2.0",
    "react-router-dom": "https://aistudiocdn.com/react-router-dom@^7.9.5"
  }
}
</script>
<style>
  @media print {
    body {
      -webkit-print-color-adjust: exact;
      print-color-adjust: exact;
    }
    #root {
      display: none;
    }
    #print-root {
      display: block;
    }
    #printable-area {
      font-size: 9pt;
      color: #000;
      background-color: #fff !important;
    }
    @page {
        size: A4;
        margin: 1.5cm;
    }
    #printable-area .no-print {
        display: none;
    }
    #printable-area h1 { font-size: 18pt; font-weight: bold; }
    #printable-area h2 { font-size: 14pt; font-weight: bold; }
    #printable-area h3 { font-size: 11pt; font-weight: bold; }
    #printable-area table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
    #printable-area th, #printable-area td { border: 1px solid #ccc; padding: 4px 6px; }
    #printable-area thead th { background-color: #e2e8f0 !important; text-align: left; font-weight: bold;}
    #printable-area .text-right { text-align: right; }
    #printable-area .font-bold { font-weight: bold; }
    #printable-area .text-xs { font-size: 7pt; }
    #printable-area .text-sm { font-size: 8pt; }
    #printable-area .p-8 { padding: 2rem; }
    #printable-area .mb-8 { margin-bottom: 2rem; }
    #printable-area .pb-4 { padding-bottom: 1rem; }
    #printable-area .border-b-2 { border-bottom-width: 2px; }
    #printable-area .border-black { border-color: #000; }
    #printable-area .flex { display: flex; }
    #printable-area .justify-between { justify-content: space-between; }
    #printable-area .items-center { align-items: center; }
  }
</style>
</head>
  <body class="bg-body-bg text-text-main font-sans">
    <div id="root"></div>
    <div id="print-root"></div>
  </body>
</html>
