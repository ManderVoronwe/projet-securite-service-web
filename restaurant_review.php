<?php
include 'header.php';
include "database.php";
?>

<div class="container">

    <div class="jumbotron other-color">


        <?php
        // get the restaurant r_address from the url
        $r_address = $_GET['r_address'];
        $sql_rest = "SELECT r_id, r_name, r_address from restaurant WHERE r_address = '$r_address'";
        $result = $conn->query($sql_rest);
        $row = $result->fetch_assoc();


        ?>
        <h2>Pas de sushi voici les 🍣's avis sur <?php echo $row['r_name']; ?></h2>
        <h3>Adresse : <?php echo $row['r_address']; ?></h3>
        <div class="row">
            <div class="col">
                <span style="margin: 10px">Note moyenne du restaurant <?php echo $row['r_name']; ?> :
                    <?php
                    $sql_rating =  "SELECT rating from review WHERE `r_address` ='" . $row['r_address'] . "'";
                    $result_rating = $conn->query($sql_rating);
                    $rating = 0;
                    $count = 0;
                    while ($row_rating = $result_rating->fetch_assoc()) {
                        $rating += $row_rating['rating'];
                        $count++;
                    }
                    if ($count > 0) {
                        $rating = $rating / $count;
                        $rarting = round($rating, 0, 5);
                        echo $rating;
                    ?>
                </span>
            <?php
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                                echo '<span style="color: #FFD700" class="fa-solid fa-star"></span>';
                            } else {
                                echo '<span class="fa-regular fa-star"></span>';
                            }
                        }
                    } else {
                        echo "No rating";
                    }


            ?>
            </div>
        </div>
        <?php
        $sql_rest = "SELECT re_id, review, re_date, rating, r_name, r_by from review WHERE `r_address` ='$r_address'";
        $result = $conn->query($sql_rest);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {



        ?>

                <div class="list-group-item">
                    <div>
                        <span class="label label-default">Posté le : <?php echo $row['re_date']; ?></span>

                        par : <?php
                                $sql_user = "SELECT u_name from users WHERE `u_id` ='" . $row['r_by'] . "'";
                                $result_user = $conn->query($sql_user);
                                if ($result_user->num_rows > 0) {
                                    $row_user = $result_user->fetch_assoc();
                                    echo $row_user['u_name'];
                                } else {
                                    echo "Anonyme";
                                }
                                ?>

                    </div>
                    <div class="stars">
                        <?php
                        $rating = $row['rating'];
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                                echo '<span style="color: #FFD700" class="fa-solid fa-star"></span>';
                            } else {
                                echo '<span class="fa-regular fa-star"></span>';
                            }
                        }
                        ?>
                    </div>
                    <br>
                    <?php echo $row['review']; ?>

                </div>
        <?php
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>
</div>