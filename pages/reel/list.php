
<div class="rn-blog-area rn-section-gap section-separator" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true"
                    class="section-title text-center">
                    <span class="subtitle">Reels</span>
                    <h2 class="title">View Reels</h2>
                </div>
            </div>
        </div>

        <!-- Reels Head -->

<?php
        // Check if session is set
        if (!isset($_SESSION['userSession']) || empty($_SESSION['userSession'])) {
            echo "<div style='color: red; text-align: center;'>You need to log in to view this profile.</div>";
            exit;
        }

        // Get user ID from session
        // $user_id  = htmlspecialchars($_POST['userID']);// Extract userID from the reel
        // $userID = htmlspecialchars($_SESSION['userSession']);

       

        if (isset($_GET['ID'])) {
            $user_id = trim($_GET['ID']); // Remove spaces and sanitize input


             // Fetch user details
        $userProfile = $d->getall("users", "ID = ?", [$user_id], fetch: "details");

        if (empty($userProfile)) {
            echo "<div style='color: red; text-align: center;'>Profile not available. This profile is unavailable.</div>";
            exit;
        }

        // Display user profile details
        echo "<div style='text-align: center; color: green;'>Welcome, " . htmlspecialchars($userProfile['first_name']) . " " . htmlspecialchars($userProfile['last_name']) . "!</div>";

        // Display Reels Section
        echo '<div class="rn-portfolio-area rn-section-gap section-separator" id="portfolio">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="section-title text-center">
                       <span class="subtitle">Reels</span>
                   </div>
               </div>
           </div>
           <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">';

            // echo "<div style='color: green;'>Product ID: " . htmlspecialchars($product_id) . "</div>"; // Debugging
        
            try {
                // Define query parameters
                $queryParams = [$user_id, '1', '1'];
                // echo "<div style='color: blue;'>Query Parameters:</div>";
                // var_dump($queryParams);
        
                // Fetch data using your `getall` function
                $link_data = $d->getall(
                    "reels",
                    "userID = ? AND status = ? AND label_status = ?",
                    $queryParams,
                    fetch: "details",
                );

                // Debugging - Show query result
                // echo "<div style='color: blue;'>Executing query...</div>";
                // var_dump($link_data);
        
                // Check if query result contains data
                if ($link_data && is_array($link_data)) {
                    // If $link_data is multidimensional (multiple rows)
                    if (isset($link_data[0]) && is_array($link_data[0])) {
                        foreach ($link_data as $row) {
                            $title = $row['title'] ?? 'Untitled';
                            $link  = $row['links'] ?? 'No Link Provided';

                            echo "<div style='color: orange;'>Found title: " . htmlspecialchars($title) . "</div>";
                            echo "<div style='color: orange;'>Found link: " . htmlspecialchars($link) . "</div>";
                        }
                    } else {
                        // If $link_data is a single associative array (one row)
                        $title = $link_data['title'] ?? 'Untitled';
                        $link  = $link_data['links'] ?? 'No Link Provided';
                        // $videoLink = $row['links'] ?? '';
        
                        // Fetch poster details for the reel
                        $posterDetails = $d->getall("users", "ID = ?", [$user_id], fetch: "details");

                        // Debugging - Show poster details
                        //  echo "<div style='color: orange;'>Executing posterDetails query...</div>";
                        //  var_dump($posterDetails);
        
                        $firstName = $posterDetails['first_name'] ?? 'Unknown';
                        $lastName  = $posterDetails['last_name'] ?? 'User';
                        // $title = $posterDetails['title'] ?? '';
                        $profileImage = $posterDetails['upload_image'] ?? "user2-160x160.png";

                        $createdAt = $row['created_at'] ?? null;
                        $postTime  = $createdAt ? strtotime($createdAt) : time();
                        $timeAgo   = $d->ago($postTime);

                        // Display the data
                        echo '
                 <div style="width: 300px; background-color: #121212; border-radius: 10px; overflow: hidden; color: #fff; margin-bottom: 20px;">
                     <!-- User Details -->
                     <div style="display: flex; align-items: center; padding: 10px;">
                         <img src="upload/profile/' . htmlspecialchars($profileImage) . '" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                         <div>
                             <span style="font-weight: bold;">' . htmlspecialchars($firstName) . ' ' . htmlspecialchars($lastName) . '</span><br>
                             <span style="font-size: 12px; color: #888;">' . htmlspecialchars($timeAgo) . '</span>
                         </div>
                     </div>

                     <!-- Post Text -->
                     <div style="padding: 10px; font-size: 14px; line-height: 1.5;">
                         ' . $title . '
                     </div>';

                        // Handle TikTok links
// Handle TikTok links
                        $videoLink = $link_data['links'] ?? '';
                        $videoID   = null;

                        // Log the video link for debugging
                        // echo "<div style='color: blue;'>Video Link: " . htmlspecialchars($videoLink) . "</div>";

                        if (!empty($videoLink)) {
                            if (strpos($videoLink, 'vm.tiktok.com') !== false) {
                                // Resolve short URL to full URL
                                $headers     = get_headers($videoLink, 1);
                                $resolvedURL = $headers['Location'] ?? $videoLink;

                                // If Location is an array, take the last URL (in case of redirects)
                                if (is_array($resolvedURL)) {
                                    $resolvedURL = end($resolvedURL);
                                }

                                // echo "<div style='color: green;'>Resolved URL: " . htmlspecialchars($resolvedURL) . "</div>";
                            } else {
                                $resolvedURL = $videoLink;
                            }

                            // Extract the video ID from the resolved full URL
                            if (preg_match('/tiktok\.com\/(?:embed\/v2\/|(?:[^\/]+\/)?video\/)?([0-9]+)/', $resolvedURL, $matches)) {
                                $videoID = $matches[1];
                                // echo "<div style='color: green;'>Video ID extracted: " . htmlspecialchars($videoID) . "</div>";
                            } else {
                                echo "<div style='color: red;'>Regex did not match TikTok video ID.</div>";
                            }
                        } else {
                            echo "<div style='color: red;'>No video link provided.</div>";
                        }

                        if ($videoID) {
                            // Embed the TikTok video using the correct URL
                            echo '
                                <iframe src="https://www.tiktok.com/embed/' . htmlspecialchars($videoID) . '" 
                                    width="100%" 
                                    height="400" 
                                    frameborder="0" 
                                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; accelerometer; gyroscope; fullscreen" 
                                    allowfullscreen>
                                </iframe>';
                        } else {
                            echo '<div style="color: red; padding: 10px;">Invalid TikTok link or video ID extraction failed.</div>';
                        }



                        echo '
                     <!-- Actions -->
                     <div style="padding: 10px; display: flex; justify-content: space-between; align-items: center; font-size: 14px;">
                         <div style="display: flex; gap: 20px;">
                             <span>27 <i class="fa fa-heart" style="color: red;"></i></span>
                             <span>25 <i class="fa fa-comment"></i></span>
                         </div>
                         <button class="share-btn" data-url="http://localhost/mstarztech.com/upload/reels/' . htmlspecialchars($row['upload_reels'] ?? '') . '" style="background: none; border: none; color: #00f; cursor: pointer;">
                             <i class="fa fa-share"></i> Share
                         </button>
                     </div>
                 </div>';
                    }
                } else {
                    echo "<div style='color: red;'>No data found or query failed.</div>";
                }
            } catch (Exception $e) {
                echo "<div style='color: red;'>An error occurred: " . htmlspecialchars($e->getMessage()) . "</div>";
            }
        } else {
            echo "<div style='color: red;'>Invalid product ID provided.</div>";
        }

        ?>


        <!-- Reels Foot -->
    </div>
</div>