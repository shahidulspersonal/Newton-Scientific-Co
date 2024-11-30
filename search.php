<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search|Newton Scientific Co.</title>
    <link rel="icon" href="images/fab.png">
    <!-- Add Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.6/dist/css/splide.min.css">
    
    <!-- Prevent indexing and following of this page -->
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">
</head>

<body class="font-sans">

<?php include 'nav.php'; ?>
<style>
    @media (max-width: 1024px) {
        #bottom-links-container {
            padding: 1rem 0;
        }

        #bottom-links a {
            font-size: 0.675rem; /* Adjust font size for mobile */
            padding: 0.5rem 1rem; /* Adjust padding for mobile */
        }
    }
</style>


<div class="container mx-auto p-4 mt-8" data-nosnippet>
   <h2 class="text-center text-xl font-bold">Search Result</h2>

    <!-- Grid layout modification for mobile -->
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-4">
        <?php
        if (isset($_GET['search'])) {
            include 'dbconnect.php';

            $search = mysqli_real_escape_string($conn, $_GET['search']);

            $query = "SELECT * FROM product WHERE name LIKE '%$search%'";
            $result = mysqli_query($conn, $query) or die('query failed');

            // Display search results
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="bg-gray-200 rounded border-green-700 border-spacing-2 p-2">';
                echo '<a href="products/' . $row['pro_url'] . '" rel="nofollow">';
                echo '<div class="relative w-full h-56 overflow-hidden">';
                echo '<img src="uploaded_img/' . $row['image'] . '" alt="' . htmlspecialchars($row['name']) . '" class="absolute inset-0 w-full h-full object-cover">';
                echo '</div>';
                echo '</a>';
                echo '<div class="mt-2">';
                
                // Truncate product name to a maximum of 3 lines
                echo '<div class="text-sm font-bold text-center overflow-hidden" style="height: 4.5em; line-height: 1.5em; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">' . htmlspecialchars($row['name']) . '</div>';
                
                // Check if price is available
                if (!empty($row['price'])) {
                    echo '<p class="text-center"><strong>BDT</strong> ' . htmlspecialchars($row['price']) . '</p>';
                } else {
                    echo '<p class="text-center">';
                    echo '<a href="tel:+880815491313" class="inline-block bg-blue-500 text-white text-xs sm:text-sm py-1 px-4 rounded hover:bg-blue-600" rel="nofollow"><span role="img" aria-label="Phone">📞</span> +880815491313</a>';
                    echo '</p>';
                }
                echo '</div>';
                echo '</div>';
            }

            mysqli_close($conn);
        }
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.6/dist/js/splide.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('.splide', {
            type: 'fade',
            heightRatio: 0.5,
            arrows: true,
            autoplay: true,
            interval: 3000,
            loop: true,
        }).mount();
    });
</script>
</body>

</html>
