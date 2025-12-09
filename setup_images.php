<?php

require_once 'unsplash_manager.php';

// UNSPLASH API KEY HERE
$UNSPLASH_ACCESS_KEY = 'w93ehKzuUVCGnVKwCRHFyucbJkUXRLi1DEk1WTlDbEU';

// Initialize the image manager
$imageManager = null;
$errorMessage = null;

if ($UNSPLASH_ACCESS_KEY !== 'w93ehKzuUVCGnVKwCRHFyucbJkUXRLi1DEk1WTlDbEU') {
    try {
        $imageManager = new UnsplashImageManager($UNSPLASH_ACCESS_KEY);
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}

// Get current status
$totalImages = 23;
$downloadedCount = 0;
$missingImages = [];

if ($imageManager) {
    $downloadedCount = $imageManager->getDownloadedCount();
    $missingImages = $imageManager->checkMissingImages();
}

$percentage = ($downloadedCount / $totalImages) * 100;

// Handle download request
$downloadResults = null;
if (isset($_POST['download']) && $imageManager) {
    set_time_limit(300); // 5 minutes timeout
    $downloadResults = $imageManager->downloadAllImages();
    
    // Refresh counts
    $downloadedCount = $imageManager->getDownloadedCount();
    $missingImages = $imageManager->checkMissingImages();
    $percentage = ($downloadedCount / $totalImages) * 100;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelSpotPH - Image Setup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        h1 {
            color: #1e3c72;
            margin-bottom: 15px;
            font-size: 2.5em;
            text-align: center;
        }
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 40px;
            font-size: 1.1em;
        }
        .progress-section {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
        }
        .progress-bar-container {
            background: #e9ecef;
            border-radius: 50px;
            height: 40px;
            overflow: hidden;
            margin: 20px 0;
        }
        .progress-bar {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            height: 100%;
            transition: width 0.5s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.1em;
        }
        .status-box {
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            font-weight: 500;
        }
        .status-box.warning {
            background: #fff3cd;
            border-left: 5px solid #ffc107;
            color: #856404;
        }
        .status-box.success {
            background: #d4edda;
            border-left: 5px solid #28a745;
            color: #155724;
        }
        .status-box.error {
            background: #f8d7da;
            border-left: 5px solid #dc3545;
            color: #721c24;
        }
        .status-box i {
            margin-right: 10px;
            font-size: 1.3em;
        }
        .info-box {
            background: #e7f3ff;
            border-left: 5px solid #2196F3;
            padding: 25px;
            border-radius: 10px;
            margin: 25px 0;
        }
        .info-box h3 {
            color: #1976D2;
            margin-bottom: 15px;
            font-size: 1.3em;
        }
        .info-box ol {
            margin-left: 25px;
            line-height: 2;
            color: #333;
        }
        .info-box code {
            background: white;
            padding: 3px 8px;
            border-radius: 4px;
            color: #d63384;
            font-family: 'Courier New', monospace;
        }
        .info-box a {
            color: #2196F3;
            font-weight: 600;
        }
        .btn {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: none;
            padding: 18px 50px;
            font-size: 1.2em;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-block;
            text-decoration: none;
            margin: 10px 5px;
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }
        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }
        .btn-secondary {
            background: white;
            color: #1e3c72;
            border: 3px solid #1e3c72;
        }
        .btn-group {
            text-align: center;
            margin: 30px 0;
        }
        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 15px;
            margin: 25px 0;
        }
        .image-item {
            padding: 15px;
            border-radius: 8px;
            font-size: 0.85em;
            text-align: center;
            font-weight: 500;
        }
        .image-item i {
            margin-right: 8px;
            font-size: 1.2em;
        }
        .image-item.downloaded {
            background: #d4edda;
            color: #155724;
            border: 2px solid #28a745;
        }
        .image-item.missing {
            background: #fff3cd;
            color: #856404;
            border: 2px solid #ffc107;
        }
        .loading {
            text-align: center;
            padding: 40px;
        }
        .loading i {
            font-size: 3em;
            color: #1e3c72;
            animation: spin 2s linear infinite;
        }
        @keyframes spin {
            100% { transform: rotate(360deg); }
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
        }
        .stat-card .number {
            font-size: 3em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .stat-card .label {
            font-size: 1em;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-images"></i> TravelSpotPH Image Setup</h1>
        <p class="subtitle">Automatically download beautiful HD images from Unsplash</p>

        <div class="progress-section">
            <h3 style="margin-bottom: 15px; color: #333;">Download Progress</h3>
            <div class="progress-bar-container">
                <div class="progress-bar" style="width: <?php echo $percentage; ?>%">
                    <?php echo $downloadedCount; ?> / <?php echo $totalImages; ?> Images
                </div>
            </div>
        </div>

        <?php if ($UNSPLASH_ACCESS_KEY === 'YOUR_ACCESS_KEY_HERE'): ?>
            
            <div class="status-box warning">
                <i class="fas fa-exclamation-triangle"></i>
                <strong>API Key Required!</strong> Please add your Unsplash Access Key to get started.
            </div>
            
            <div class="info-box">
                <h3><i class="fas fa-key"></i> How to Get Your FREE Unsplash API Key (2 minutes):</h3>
                <ol>
                    <li>Visit <a href="https://unsplash.com/developers" target="_blank">unsplash.com/developers</a></li>
                    <li>Click <strong>"Register as a developer"</strong> (or log in if you have an account)</li>
                    <li>Go to <strong>"Your apps"</strong> → Click <strong>"New Application"</strong></li>
                    <li>Accept the API terms and create your app (name it "TravelSpotPH")</li>
                    <li>Copy your <strong>Access Key</strong> (NOT the Secret Key)</li>
                    <li>Open <code>setup_images.php</code> in a text editor</li>
                    <li>Replace <code>YOUR_ACCESS_KEY_HERE</code> on line 12 with your Access Key</li>
                    <li>Save the file and refresh this page</li>
                </ol>
            </div>

            <div class="btn-group">
                <a href="https://unsplash.com/developers" target="_blank" class="btn">
                    <i class="fas fa-external-link-alt"></i> Get API Key Now
                </a>
            </div>
        
        <?php elseif ($downloadResults): ?>
            
            <div class="status-box success">
                <i class="fas fa-check-circle"></i>
                <strong>Download Complete!</strong> All images have been processed.
            </div>

            <div class="stats">
                <div class="stat-card">
                    <div class="number"><?php echo $downloadedCount; ?></div>
                    <div class="label">Images Downloaded</div>
                </div>
                <div class="stat-card">
                    <div class="number"><?php echo count($missingImages); ?></div>
                    <div class="label">Still Missing</div>
                </div>
            </div>

            <h3 style="margin: 30px 0 15px; color: #333;">Download Results:</h3>
            <div class="image-grid">
                <?php foreach ($downloadResults as $filename => $result): ?>
                    <?php 
                        $class = ($result['status'] === 'success' || $result['status'] === 'exists') ? 'downloaded' : 'missing';
                        $icon = ($result['status'] === 'success' || $result['status'] === 'exists') ? 'fa-check-circle' : 'fa-times-circle';
                    ?>
                    <div class="image-item <?php echo $class; ?>">
                        <i class="fas <?php echo $icon; ?>"></i>
                        <?php echo $filename; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (count($missingImages) === 0): ?>
                <div class="btn-group">
                    <a href="home.php" class="btn">
                        <i class="fas fa-rocket"></i> Launch Website
                    </a>
                </div>
            <?php else: ?>
                <form method="post" style="text-align: center;">
                    <button type="submit" name="download" class="btn">
                        <i class="fas fa-redo"></i> Retry Failed Downloads
                    </button>
                </form>
            <?php endif; ?>
        
        <?php elseif (count($missingImages) > 0): ?>
            
            <div class="status-box warning">
                <i class="fas fa-info-circle"></i>
                <strong><?php echo count($missingImages); ?> images</strong> are missing. Click below to download them automatically!
            </div>

            <form method="post">
                <div class="btn-group">
                    <button type="submit" name="download" class="btn">
                        <i class="fas fa-download"></i> Download All Images (<?php echo count($missingImages); ?>)
                    </button>
                </div>
            </form>

            <h3 style="margin: 30px 0 15px; color: #333;">Missing Images:</h3>
            <div class="image-grid">
                <?php foreach ($missingImages as $img): ?>
                    <div class="image-item missing">
                        <i class="fas fa-clock"></i>
                        <?php echo $img; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        
        <?php else: ?>
            
            <div class="status-box success">
                <i class="fas fa-check-circle"></i>
                <strong>Perfect!</strong> All <?php echo $totalImages; ?> images are ready. Your website is complete!
            </div>

            <div class="stats">
                <div class="stat-card">
                    <div class="number"><?php echo $downloadedCount; ?></div>
                    <div class="label">Total Images</div>
                </div>
                <div class="stat-card">
                    <div class="number">100%</div>
                    <div class="label">Complete</div>
                </div>
            </div>

            <div class="btn-group">
                <a href="home.php" class="btn">
                    <i class="fas fa-rocket"></i> Launch Website
                </a>
                <a href="travel.php" class="btn btn-secondary">
                    <i class="fas fa-map-marked-alt"></i> View Destinations
                </a>
            </div>
        
        <?php endif; ?>

        <div class="info-box" style="margin-top: 40px;">
            <h3><i class="fas fa-info-circle"></i> About This Tool:</h3>
            <ul style="margin-left: 25px; line-height: 2; color: #333;">
                <li><strong>23 Images Total:</strong> 5 destinations + 15 attractions + 3 team photos</li>
                <li><strong>Source:</strong> All images from <a href="https://unsplash.com" target="_blank">Unsplash.com</a></li>
                <li><strong>Free to Use:</strong> 100% royalty-free for commercial use</li>
                <li><strong>HD Quality:</strong> Professional 1080px wide images</li>
                <li><strong>API Limits:</strong> Free tier allows 50 requests/hour</li>
            </ul>
        </div>
    </div>

    <?php if (isset($_POST['download']) && $imageManager): ?>
    <script>
        // Scroll to results after download
        window.scrollTo({ top: 0, behavior: 'smooth' });
    </script>
    <?php endif; ?>
</body>
</html>