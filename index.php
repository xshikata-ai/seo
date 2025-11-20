<?php
include dirname(__FILE__) . '/.private/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Image Generator for Designers</title>
    <!-- Tailwind CSS for modern styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts for a clean look -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Custom styles for the application */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        #drop-zone {
            border: 2px dashed #cbd5e1;
            transition: all 0.3s ease;
        }
        #drop-zone.dragover {
            border-color: #4f46e5;
            background-color: #e0e7ff;
        }
        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #4f46e5;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="min-h-screen w-full flex items-center justify-center p-4 bg-gray-100">

    <div class="container mx-auto max-w-6xl w-full">
        <header class="text-center mb-8">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800">AI-Powered Image Studio</h1>
            <p class="text-gray-600 mt-2">Transform your product photos with the power of generative AI.</p>
        </header>

        <main class="glass-card rounded-2xl shadow-lg p-6 md:p-8">
            <form id="ai-form" enctype="multipart/form-data">

                <!-- Step 1: Image Upload -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-3">1. Upload a Reference Image (Optional)</h2>
                    <div id="drop-zone" class="relative flex flex-col items-center justify-center w-full h-64 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                        <div id="upload-prompt" class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500">PNG or JPG (MAX. 5MB)</p>
                        </div>
                        <input id="image-upload" name="productImage" type="file" class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer" accept="image/png, image/jpeg">
                        <div id="image-preview-container" class="absolute top-0 left-0 w-full h-full p-2 hidden">
                            <img id="image-preview" src="#" alt="Image Preview" class="w-full h-full object-contain rounded-md">
                        </div>
                    </div>
                </div>

                <!-- Step 2: AI Prompt -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-3">2. Describe Your Vision</h2>
                    <textarea id="prompt" name="prompt" rows="4" class="w-full p-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="e.g., 'A professional photo of this product on a clean, white background with soft shadows.'"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" id="generate-btn" class="w-full md:w-auto bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-lg shadow-md hover:shadow-lg transition-transform transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                        <span id="btn-text">Generate Images</span>
                    </button>
                </div>
            </form>

            <!-- Result Section -->
            <div id="result-section" class="mt-8 hidden">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Your AI-Generated Images</h2>
                <div id="loading-spinner" class="flex justify-center items-center py-10">
                    <div class="loader"></div>
                    <p class="ml-4 text-gray-600">Our AI is creating magic... Please wait.</p>
                </div>
                <!-- UPDATED: Image Gallery Container -->
                <div id="image-gallery" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Generated images will be inserted here -->
                </div>
                <div id="error-message" class="text-center text-red-500 p-4 bg-red-100 rounded-lg hidden mt-4"></div>
            </div>
        </main>
    </div>

    <script>
        const form = document.getElementById('ai-form');
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('image-upload');
        const imagePreviewContainer = document.getElementById('image-preview-container');
        const imagePreview = document.getElementById('image-preview');
        const uploadPrompt = document.getElementById('upload-prompt');
        const resultSection = document.getElementById('result-section');
        const loadingSpinner = document.getElementById('loading-spinner');
        const imageGallery = document.getElementById('image-gallery');
        const errorMessage = document.getElementById('error-message');
        const generateBtn = document.getElementById('generate-btn');
        const btnText = document.getElementById('btn-text');

        dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('dragover'); });
        dropZone.addEventListener('dragleave', () => { dropZone.classList.remove('dragover'); });
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('dragover');
            const files = e.dataTransfer.files;
            if (files.length) { fileInput.files = files; displayImagePreview(files[0]); }
        });

        fileInput.addEventListener('change', () => { if (fileInput.files.length) { displayImagePreview(fileInput.files[0]); } });

        function displayImagePreview(file) {
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreview.src = e.target.result;
                    imagePreviewContainer.classList.remove('hidden');
                    uploadPrompt.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const promptText = document.getElementById('prompt').value;
            if (!promptText.trim()) { alert('Please enter a descriptive prompt.'); return; }

            const formData = new FormData(form);
            
            resultSection.classList.remove('hidden');
            loadingSpinner.classList.remove('hidden');
            imageGallery.classList.add('hidden');
            imageGallery.innerHTML = ''; // Clear previous results
            errorMessage.classList.add('hidden');
            generateBtn.disabled = true;
            btnText.textContent = 'Generating...';

            try {
                const response = await fetch('generate.php', { method: 'POST', body: formData });

                if (!response.ok) {
                    const errorText = await response.text();
                    try {
                        const errorJson = JSON.parse(errorText);
                        throw new Error(errorJson.error || `Server error: ${response.statusText}`);
                    } catch {
                        throw new Error(`Server error: ${response.statusText}. Response: ${errorText}`);
                    }
                }

                const result = await response.json();

                if (result.success && result.imageDatas) {
                    // UPDATED: Handle multiple images
                    result.imageDatas.forEach((imageData, index) => {
                        // Create a container for the image and its download button
                        const itemContainer = document.createElement('div');
                        itemContainer.className = 'relative group bg-gray-900 p-2 rounded-lg shadow-inner';

                        // Create the image element
                        const img = document.createElement('img');
                        img.src = imageData;
                        img.alt = `Generated Image ${index + 1}`;
                        img.className = 'w-full h-auto object-contain rounded-md';
                        
                        // Create the download button
                        const downloadBtn = document.createElement('a');
                        downloadBtn.href = imageData;
                        downloadBtn.download = `ai-generated-image-${index + 1}.png`;
                        downloadBtn.className = 'absolute bottom-2 right-2 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-3 rounded-lg shadow-md opacity-0 group-hover:opacity-100 transition-opacity';
                        downloadBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/></svg>`;
                        
                        itemContainer.appendChild(img);
                        itemContainer.appendChild(downloadBtn);
                        imageGallery.appendChild(itemContainer);
                    });
                    imageGallery.classList.remove('hidden');
                } else {
                    throw new Error(result.error || 'An unknown error occurred.');
                }

            } catch (error) {
                errorMessage.textContent = `Error: ${error.message}`;
                errorMessage.classList.remove('hidden');
            } finally {
                loadingSpinner.classList.add('hidden');
                generateBtn.disabled = false;
                btnText.textContent = 'Generate Images';
            }
        });
    </script>
</body>
</html>



