

    <!-- Body main wrapper start -->
<?php
include 'header.php';

// Check if user is not logged in or not a student
if (!isset($_SESSION['login']) || $_SESSION['login'] == '' || !isset($_SESSION['student']) || $_SESSION['student'] != 1) {
    echo "<script>alert('You do not have student access. Please contact the admin.');</script>";
    redir('student-section.php');
    exit(); // Ensure no further execution
}
?>
<?php 
    $sql12 = "SELECT class_d1_audio,class_d2_audio,class_d_pdf FROM classes";
    $res = mysqli_query($conn, $sql12);
    $row = mysqli_fetch_array($res);
?>
<div class="container py-5">
    <h1 class="text-center mb-5">Class D</h1>
    
    <!-- First Audio Section -->
    <div class="audio-container">
        <h3 class="audio-title">Audio Sample 1</h3>
        <div class="row">
            <div class="col-md-8">
                <audio id="audio1" controls class="w-100 no-context-menu">
                    <source src="<?php echo 'uploads/classes/class_audio/' . $row['class_d1_audio']; ?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <p class="mb-0 text-muted">Listen to our first audio sample</p>
            </div>
        </div>
    </div>
    
    <!-- Second Audio Section -->
    <div class="audio-container">
        <h3 class="audio-title">Audio Sample 2</h3>
        <div class="row">
            <div class="col-md-8">
                <audio id="audio2" controls class="w-100 no-context-menu">
                    <source src="<?php echo 'uploads/classes/class_audio/' . $row['class_d2_audio']; ?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
            <div class="col-md-4 d-flex align-items-center">
                <p class="mb-0 text-muted">Listen to our second audio sample</p>
            </div>
        </div>
    </div>
    
    <!-- PDF Section -->
    <div class="pdf-container">
        <h3 class="pdf-title">Document Viewer</h3>
        <div class="row">
            <div class="col-12">
                <div id="pdf-viewer"></div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <button id="prev-page" class="btn btn-secondary">Previous</button>
                <button id="next-page" class="btn btn-secondary">Next</button>
                <span class="ms-3">Page: <span id="page-num">1</span> of <span id="page-count">0</span></span>
            </div>
        </div>
    </div>
</div>

<!-- PDF.js for PDF rendering -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>

<style>
    body {
        background-color: #f5f5f5;
        font-family: 'Hind Siliguri', 'Noto Sans Bengali', sans-serif;
    }
    .container {
        max-width: 900px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin-top: 30px;
        margin-bottom: 30px;
    }
    h1 {
        color: #e74c3c;
        font-weight: 700;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }
    .audio-container, .pdf-container {
        margin-bottom: 30px;
        padding: 20px;
        border-radius: 8px;
        background-color: #f8f9fa;
        border-left: 5px solid #e74c3c;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .audio-title, .pdf-title {
        margin-bottom: 15px;
        color: #2980b9;
        font-weight: 600;
    }
    /* Disable right-click context menu */
    .no-context-menu {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    /* Style for PDF viewer container */
    #pdf-viewer {
        width: 100%;
        height: 500px;
        border: 1px solid #dee2e6;
        overflow: auto;
        background-color: #fff8e1;
    }
    .btn-secondary {
        background-color: #27ae60;
        border-color: #27ae60;
    }
    .btn-secondary:hover {
        background-color: #219653;
        border-color: #219653;
    }
    .text-muted {
        color: #7f8c8d !important;
    }
</style>

<!-- Add Bengali-friendly fonts -->
<link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;500;600;700&display=swap" rel="stylesheet">

<script>
    // Prevent audio download by disabling right-click and removing download option
    document.addEventListener('DOMContentLoaded', function() {
        const audioElements = document.querySelectorAll('audio');
        
        audioElements.forEach(audio => {
            // Remove context menu
            audio.addEventListener('contextmenu', function(e) {
                e.preventDefault();
                alert('Downloading is not permitted');
            });
            
            // Remove download option from controls (works in some browsers)
            audio.controlsList = 'nodownload';
            
            // Prevent keyboard shortcuts for saving
            audio.addEventListener('keydown', function(e) {
                if (e.ctrlKey && (e.keyCode === 83 || e.keyCode === 85)) {
                    e.preventDefault();
                    alert('Downloading is not permitted');
                }
            });
        });
        
        // Set the path to the PDF worker
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';
    
    // Initialize PDF.js with your PHP file path
    pdfjsLib.getDocument('<?php echo 'uploads/classes/class_pdf/' . $row['class_d_pdf']; ?>').promise.then(function(pdf) {
        pdfDoc = pdf;
        document.getElementById('page-count').textContent = pdf.numPages;
        
        // Show the first page
        showPage(1);
    }).catch(function(error) {
        console.error('PDF loading error:', error);
        document.getElementById('pdf-viewer').innerHTML = '<div class="alert alert-danger">Error loading PDF file.</div>';
    });
        
        let pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null;
        
        function showPage(num) {
            pageRendering = true;
            
            pdfDoc.getPage(num).then(function(page) {
                const viewport = page.getViewport({ scale: 1.5 });
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                const renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };
                
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                
                const renderTask = page.render(renderContext);
                
                renderTask.promise.then(function() {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        showPage(pageNumPending);
                        pageNumPending = null;
                    }
                    
                    // Clear previous content and append new canvas
                    const viewer = document.getElementById('pdf-viewer');
                    viewer.innerHTML = '';
                    viewer.appendChild(canvas);
                });
            });
            
            document.getElementById('page-num').textContent = num;
        }
        
        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                showPage(num);
            }
        }
        
        document.getElementById('prev-page').addEventListener('click', function() {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        });
        
        document.getElementById('next-page').addEventListener('click', function() {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        });
    });
</script>

<?php include 'footer.php'; ?>

