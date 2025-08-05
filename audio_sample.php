<?php include 'header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* Custom Styles */
    .audio-sample {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .sample-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .sample-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .sample-title {
        font-size: 2rem;
        font-weight: 700;
        margin: 0 0 1rem;
        color: var(--bd-primary);
    }

    /* Custom audio player styling */
    .audio-container {
        position: relative;
    }

    .audio-player {
        width: 100%;
        margin: 1rem 0;
        border-radius: 10px;
    }

    /* Hide download button in audio controls */
    audio::-webkit-media-controls-enclosure {
        overflow: hidden;
    }
    
    audio::-webkit-media-controls-panel {
        width: calc(100% + 30px);
    }
    
    /* Disable right-click on audio elements */
    audio {
        pointer-events: none;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .category-section {
        margin: 3rem 0 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--bd-primary);
    }

    .category-section h2 {
        font-size: 1.8rem;
        font-weight: 600;
        color: var(--bd-primary);
    }

    .audio-controls {
        display: flex;
        gap: 0.75rem;
        margin-top: 0.75rem;
    }

    .audio-control-btn {
        padding: 0.5rem 1rem;
        background: var(--bd-primary);
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .audio-control-btn:hover {
        background: #5649c0;
        transform: translateY(-2px);
    }

    .page-header h1 {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--bd-primary);
        margin-bottom: 1rem;
    }

    .page-header .subtitle {
        font-size: 1.1rem;
        color: #555;
        max-width: 800px;
        margin: 0 auto 2rem;
    }

    @media (max-width: 768px) {
        .sample-title {
            font-size: 1.6rem;
        }
        
        .page-header h1 {
            font-size: 2rem;
        }
        
        .category-section h2 {
            font-size: 1.5rem;
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Prevent right-click on audio elements
    document.querySelectorAll('audio').forEach(audio => {
        audio.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            return false;
        });
    });

    // Skip buttons functionality
    function setupSkipButtons(audioElement) {
        const skipBackBtn = audioElement.parentElement.querySelector('.skip-back');
        const skipForwardBtn = audioElement.parentElement.querySelector('.skip-forward');
        
        skipBackBtn.addEventListener('click', function() {
            audioElement.currentTime = Math.max(0, audioElement.currentTime - 5);
        });
        
        skipForwardBtn.addEventListener('click', function() {
            audioElement.currentTime = Math.min(audioElement.duration, audioElement.currentTime + 5);
        });
    }

    // Initialize all audio players
    document.querySelectorAll('audio').forEach(function(audio) {
        setupSkipButtons(audio);
        
        // Additional protection - clear src if someone tries to access it
        audio.addEventListener('play', function() {
            this.setAttribute('data-src', this.src);
            this.src = '';
            this.src = this.getAttribute('data-src');
        });
    });
});
</script>

<div class="container-fluid audio-sample">
    <header class="page-header text-center">
        <h1>🎵 Audio Samples</h1>
        <p class="subtitle">Take a listen to some of the sample audio records by Subhabrata Ray Chaudhuri and experience it all yourself. Lose yourself in the world of poesy and memoirs.</p>
    </header>
    
    <?php
    $sql12 = "SELECT * FROM sample_audios where sl_id=1";
    $res = mysqli_query($conn, $sql12);
    $row = mysqli_fetch_array($res);
    ?>

    <section class="category-section">
        <h2 class="text-center">🔊 Poems</h2>
        <div class="row sample-grid">
            <!-- Poem Sample 1 -->
            <?php if (!empty($row['sample_audio_a1']) && !empty($row['sample_audio_a1_title'])): ?>
            <div class="col-md-6 col-lg-4">
                <div class="sample-card h-100">
                    <h3 class="sample-title"><?php echo $row['sample_audio_a1_title']; ?></h3>
                    <div class="audio-container">
                        <audio controls class="audio-player w-100" controlsList="nodownload">
                            <source src="<?php echo 'uploads/sample_audios/' . $row['sample_audio_a1']; ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="audio-controls">
                            <button class="audio-control-btn skip-back">⏪ 5s</button>
                            <button class="audio-control-btn skip-forward">5s ⏩</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Poem Sample 2 -->
            <?php if (!empty($row['sample_audio_a2']) && !empty($row['sample_audio_a2_title'])): ?>
            <div class="col-md-6 col-lg-4">
                <div class="sample-card h-100">
                    <h3 class="sample-title"><?php echo $row['sample_audio_a2_title']; ?></h3>
                    <div class="audio-container">
                        <audio controls class="audio-player w-100" controlsList="nodownload">
                            <source src="<?php echo 'uploads/sample_audios/' . $row['sample_audio_a2']; ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="audio-controls">
                            <button class="audio-control-btn skip-back">⏪ 5s</button>
                            <button class="audio-control-btn skip-forward">5s ⏩</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="category-section">
        <h2 class="text-center">🔊 Storytelling</h2>
        <div class="row sample-grid">
            <!-- Story Sample 1 -->
            <?php if (!empty($row['sample_audio_b1']) && !empty($row['sample_audio_b1_title'])): ?>
            <div class="col-md-6 col-lg-4">
                <div class="sample-card h-100">
                    <h3 class="sample-title"><?php echo $row['sample_audio_b1_title']; ?></h3>
                    <div class="audio-container">
                        <audio controls class="audio-player w-100" controlsList="nodownload">
                            <source src="<?php echo 'uploads/sample_audios/' . $row['sample_audio_b1']; ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="audio-controls">
                            <button class="audio-control-btn skip-back">⏪ 5s</button>
                            <button class="audio-control-btn skip-forward">5s ⏩</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Story Sample 2 -->
            <?php if (!empty($row['sample_audio_b2']) && !empty($row['sample_audio_b2_title'])): ?>
            <div class="col-md-6 col-lg-4">
                <div class="sample-card h-100">
                    <h3 class="sample-title"><?php echo $row['sample_audio_b2_title']; ?></h3>
                    <div class="audio-container">
                        <audio controls class="audio-player w-100" controlsList="nodownload">
                            <source src="<?php echo 'uploads/sample_audios/' . $row['sample_audio_b2']; ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="audio-controls">
                            <button class="audio-control-btn skip-back">⏪ 5s</button>
                            <button class="audio-control-btn skip-forward">5s ⏩</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="category-section">
        <h2 class="text-center">🔊 Narration</h2>
        <div class="row sample-grid">
            <!-- Narration Sample 1 -->
            <?php if (!empty($row['sample_audio_c1']) && !empty($row['sample_audio_c1_title'])): ?>
            <div class="col-md-6 col-lg-4">
                <div class="sample-card h-100">
                    <h3 class="sample-title"><?php echo $row['sample_audio_c1_title']; ?></h3>
                    <div class="audio-container">
                        <audio controls class="audio-player w-100" controlsList="nodownload">
                            <source src="<?php echo 'uploads/sample_audios/' . $row['sample_audio_c1']; ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="audio-controls">
                            <button class="audio-control-btn skip-back">⏪ 5s</button>
                            <button class="audio-control-btn skip-forward">5s ⏩</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Narration Sample 2 -->
            <?php if (!empty($row['sample_audio_c2']) && !empty($row['sample_audio_c2_title'])): ?>
            <div class="col-md-6 col-lg-4">
                <div class="sample-card h-100">
                    <h3 class="sample-title"><?php echo $row['sample_audio_c2_title']; ?></h3>
                    <div class="audio-container">
                        <audio controls class="audio-player w-100" controlsList="nodownload">
                            <source src="<?php echo 'uploads/sample_audios/' . $row['sample_audio_c2']; ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="audio-controls">
                            <button class="audio-control-btn skip-back">⏪ 5s</button>
                            <button class="audio-control-btn skip-forward">5s ⏩</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="category-section">
        <h2 class="text-center">🔊 Commercials</h2>
        <div class="row sample-grid">
            <!-- Commercial Sample 1 -->
            <?php if (!empty($row['sample_audio_d1']) && !empty($row['sample_audio_d1_title'])): ?>
            <div class="col-md-6 col-lg-4">
                <div class="sample-card h-100">
                    <h3 class="sample-title"><?php echo $row['sample_audio_d1_title']; ?></h3>
                    <div class="audio-container">
                        <audio controls class="audio-player w-100" controlsList="nodownload">
                            <source src="<?php echo 'uploads/sample_audios/' . $row['sample_audio_d1']; ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="audio-controls">
                            <button class="audio-control-btn skip-back">⏪ 5s</button>
                            <button class="audio-control-btn skip-forward">5s ⏩</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Commercial Sample 2 -->
            <?php if (!empty($row['sample_audio_d2']) && !empty($row['sample_audio_d2_title'])): ?>
            <div class="col-md-6 col-lg-4">
                <div class="sample-card h-100">
                    <h3 class="sample-title"><?php echo $row['sample_audio_d2_title']; ?></h3>
                    <div class="audio-container">
                        <audio controls class="audio-player w-100" controlsList="nodownload">
                            <source src="<?php echo 'uploads/sample_audios/' . $row['sample_audio_d2']; ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="audio-controls">
                            <button class="audio-control-btn skip-back">⏪ 5s</button>
                            <button class="audio-control-btn skip-forward">5s ⏩</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Commercial Sample 3 -->
            <?php if (!empty($row['sample_audio_d3']) && !empty($row['sample_audio_d3_title'])): ?>
            <div class="col-md-6 col-lg-4">
                <div class="sample-card h-100">
                    <h3 class="sample-title"><?php echo $row['sample_audio_d3_title']; ?></h3>
                    <div class="audio-container">
                        <audio controls class="audio-player w-100" controlsList="nodownload">
                            <source src="<?php echo 'uploads/sample_audios/' . $row['sample_audio_d3']; ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="audio-controls">
                            <button class="audio-control-btn skip-back">⏪ 5s</button>
                            <button class="audio-control-btn skip-forward">5s ⏩</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Commercial Sample 4 -->
            <?php if (!empty($row['sample_audio_d4']) && !empty($row['sample_audio_d4_title'])): ?>
            <div class="col-md-6 col-lg-4">
                <div class="sample-card h-100">
                    <h3 class="sample-title"><?php echo $row['sample_audio_d4_title']; ?></h3>
                    <div class="audio-container">
                        <audio controls class="audio-player w-100" controlsList="nodownload">
                            <source src="<?php echo 'uploads/sample_audios/' . $row['sample_audio_d4']; ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="audio-controls">
                            <button class="audio-control-btn skip-back">⏪ 5s</button>
                            <button class="audio-control-btn skip-forward">5s ⏩</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>