<?php
/**
 * Unsplash Image Manager for TravelSpotPH
 * Automatically downloads images from Unsplash API
 */

class UnsplashImageManager {
    private $accessKey;
    private $imgDir = 'img/';
    
    // All images your website needs with search terms
    private $imageMap = [
        // Main destinations (5 images)
        'palawan.jpg' => 'palawan philippines beach ocean',
        'boracay.jpg' => 'boracay philippines white beach',
        'bohol.jpg' => 'chocolate hills bohol philippines',
        'siargao.jpg' => 'siargao philippines island palm trees',
        'baguio.jpg' => 'baguio philippines mountains pine trees',
        
        // Palawan attractions (3 images)
        'undergroundriverpal.jpg' => 'underground river palawan cave',
        'islandhopingpal.jpg' => 'el nido island hopping palawan boats',
        'safaripal.jpg' => 'calauit safari park animals palawan',
        
        // Boracay attractions (3 images)
        'whitebeachbor.jpg' => 'white beach boracay sunset philippines',
        'arielspointbor.jpg' => 'cliff diving ariel point boracay',
        'bulabogbeachbor.jpg' => 'bulabog beach boracay kitesurfing',
        
        // Bohol attractions (3 images)
        'chocolatehillsboh.jpg' => 'chocolate hills bohol viewpoint',
        'tarsiersboh.jpg' => 'philippine tarsier bohol cute',
        'lobocriverboh.jpg' => 'loboc river cruise bohol',
        
        // Siargao attractions (3 images)
        'cloudninesiar.jpg' => 'cloud 9 siargao surfing waves',
        'sugbalagoonsia.jpg' => 'sugba lagoon siargao turquoise water',
        'nakedislandsia.jpg' => 'naked island siargao sandbar',
        
        // Baguio attractions (3 images)
        'burnampark.jpg' => 'burnham park baguio lake boats',
        'mineviewpark.jpg' => 'mines view park baguio mountains',
        'strawberryfarm.jpg' => 'strawberry farm baguio philippines',
        
        // Team members (3 images)
        'Cornelio.jpg' => 'professional business man portrait suit',
        'Cedillo.jpg' => 'developer programmer man portrait casual',
        'Clet.jpg' => 'young professional portrait smiling',
    ];
    
    public function __construct($accessKey) {
        $this->accessKey = $accessKey;
        
        // Create img directory if it doesn't exist
        if (!file_exists($this->imgDir)) {
            mkdir($this->imgDir, 0755, true);
        }
    }
    
    /**
     * Download all missing images
     */
    public function downloadAllImages() {
        $results = [];
        $count = 0;
        
        foreach ($this->imageMap as $filename => $searchQuery) {
            $filePath = $this->imgDir . $filename;
            
            // Skip if file already exists
            if (file_exists($filePath)) {
                $results[$filename] = [
                    'status' => 'exists',
                    'message' => 'Already downloaded'
                ];
                continue;
            }
            
            // Download the image
            $count++;
            $result = $this->downloadImage($searchQuery, $filePath);
            
            if ($result) {
                $results[$filename] = [
                    'status' => 'success',
                    'message' => 'Downloaded successfully'
                ];
            } else {
                $results[$filename] = [
                    'status' => 'error',
                    'message' => 'Download failed'
                ];
            }
            
            // Sleep 1 second to avoid rate limiting
            if ($count < count($this->imageMap)) {
                sleep(1);
            }
        }
        
        return $results;
    }
    
    /**
     * Download a single image from Unsplash
     */
    private function downloadImage($searchQuery, $savePath) {
        try {
            // Search for image on Unsplash
            $searchUrl = "https://api.unsplash.com/search/photos?" . http_build_query([
                'query' => $searchQuery,
                'per_page' => 1,
                'orientation' => 'landscape',
            ]);
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $searchUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Client-ID ' . $this->accessKey,
                'Accept-Version: v1'
            ]);
            
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            if ($httpCode !== 200) {
                return false;
            }
            
            $data = json_decode($response, true);
            
            if (!isset($data['results'][0])) {
                return false;
            }
            
            $photo = $data['results'][0];
            $imageUrl = $photo['urls']['regular']; // Get regular size (1080px wide)
            
            // Download the actual image
            $imageData = file_get_contents($imageUrl);
            
            if ($imageData === false) {
                return false;
            }
            
            // Save the image
            return file_put_contents($savePath, $imageData) !== false;
            
        } catch (Exception $e) {
            return false;
        }
    }
    
    /**
     * Check which images are missing
     */
    public function checkMissingImages() {
        $missing = [];
        
        foreach ($this->imageMap as $filename => $searchQuery) {
            $filePath = $this->imgDir . $filename;
            if (!file_exists($filePath)) {
                $missing[] = $filename;
            }
        }
        
        return $missing;
    }
    
    /**
     * Get total image count
     */
    public function getTotalCount() {
        return count($this->imageMap);
    }
    
    /**
     * Get downloaded image count
     */
    public function getDownloadedCount() {
        $count = 0;
        
        foreach ($this->imageMap as $filename => $searchQuery) {
            $filePath = $this->imgDir . $filename;
            if (file_exists($filePath)) {
                $count++;
            }
        }
        
        return $count;
    }
}
?>