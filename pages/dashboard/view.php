<?php 
echo $_GET['pID']; 
?>
<div class="row align-items-center">

    <div class="col-lg-6">
        <div class="portfolio-popup-thumbnail">
            <div class="image">
                <img class="w-100" src="upload/portfolio/<?= htmlspecialchars($portfolio_single['img']); ?>" alt="slide">
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="text-content">
            <h3><?= htmlspecialchars($portfolio_single['title']); ?></h3>
            <p class="mb--30"><?= htmlspecialchars($portfolio_single['content']); ?></p>

            <div class="button-group mt--20">
                <a href="#" class="rn-btn thumbs-icon" 
                   id="like-btn" 
                   data-id="<?= $portfolio_single['ID']; ?>">
                    <span id="like-count-<?= $portfolio_single['ID']; ?>">
                        <?= $portfolio_single['likes']; ?>
                    </span> LIKE THIS
                    <i data-feather="thumbs-up"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript should be placed just before the closing body tag -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const likeBtn = document.getElementById('like-btn');

        likeBtn.addEventListener('click', function (event) {
            likePost(event);
        });
    
        function likePost(event) {
            event.preventDefault(); // Prevent default anchor behavior

            const button = event.currentTarget;
            const postID = button.getAttribute('data-id'); // Get the post ID
            const likeCountSpan = document.getElementById(`like-count-${postID}`);

            fetch('passer.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ postID: postID }), // Send the post ID
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const currentCount = parseInt(likeCountSpan.textContent) || 0;
                    likeCountSpan.textContent = currentCount + 1;
                } else {
                    console.error('Error liking the post:', data.message);
                    alert('Could not like the post. Please try again.');
                }
            })
            .catch(error => {
                console.error('AJAX request failed:', error);
                alert('Something went wrong. Please try again.');
            });
        }
    });

    
</script>
