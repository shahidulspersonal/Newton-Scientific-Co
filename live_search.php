

<?php
$baseURL = "http://localhost/company/"; // Your actual base URL
?>
<?php
if (isset($_GET['search'])) {
    include 'dbconnect.php';
    include 'config.php';
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT * FROM product WHERE name LIKE '%$search%'";
    $result = mysqli_query($conn, $query) or die('Query failed');

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="flex items-center p-2 hover:bg-gray-100 cursor-pointer text-black">';
            echo '<a href="' . $baseURL . 'products/' . $row['pro_url'] . '" class="flex items-center w-full" rel="nofollow">';
            echo '<img src="' . $baseURL . 'uploaded_img/' . $row['image'] . '" alt="' . htmlspecialchars($row['name']) . '" class="w-12 h-12 object-cover mr-2">';
            echo '<span class="text-sm font-bold">' . htmlspecialchars($row['name']) . '</span>';
            echo '</a>';
            echo '</div>';
        }
    } else {
        echo '<p class="p-2 text-sm text-black">No products found.</p>';
    }

    mysqli_close($conn);
}
