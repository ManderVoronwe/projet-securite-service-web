<!-- get the restaurant name from the url -->
<?php
    $restaurant_name = $_GET['restaurant_name'];
    $restaurant = $restaurant_api->GET_BY_NAME($restaurant_name);
    $restaurant_id = $restaurant['id'];
    $reviews = $review_api->GET_BY_RESTAURANT($restaurant_id);
    $review_count = count($reviews);
    $review_total = 0;
    foreach ($reviews as $review) {
        $review_total += $review['rating'];
    }

    $average_rating = $review_total / $review_count;
    $average_rating = round($average_rating, 0.5);
?>

<!-- display the restaurant name -->
<h1><?php echo $restaurant['name']; ?></h1>

<!-- display the average rating -->
<h2>Average Rating: <?php echo $average_rating; ?></h2>

<!-- display the number of reviews -->
<h2>Number of Reviews: <?php echo $review_count; ?></h2>

<!-- display the reviews -->
<?php foreach ($reviews as $review) { ?>
    <div class="review">
        <h3><?php echo $review['title']; ?></h3>
        <p><?php echo $review['content']; ?></p>
        <p>Rating: <?php echo $review['rating']; ?></p>
    </div>
<?php } ?>

<!-- display the review form -->
<?php if (isset($_SESSION['user_id'])) { ?>
    <form action="ReviewPage.php" method="post">
        <input type="hidden" name="restaurant_id" value="<?php echo $restaurant_id; ?>">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="content" placeholder="Content">
        <input type="number" name="rating" placeholder="Rating">
        <input type="submit" value="Submit">
    </form>
<?php } ?>



