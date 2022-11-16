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

        <div class="col-sm-3"> <?php echo $row['r_name']; ?></div>
        <div class="col-sm-3"> <?php echo $row['r_address']; ?></div>
        <div class="col-sm-1">
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
        </div>
        <div class="col-sm-2">
        <?php
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        echo '<span class="glyphicon glyphicon-star"></span>';
                    } else {
                        echo '<span class="glyphicon glyphicon-star-empty"></span>';
                    }
                }
            } else {
                echo "No rating";
            }


        ?>
        </div>
        <?php
        $sql_rest = "SELECT re_id, review, re_date, rating, r_name, r_by from review WHERE `r_address` ='$r_address'";
        $result = $conn->query($sql_rest);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {



        ?>

                <div class="list-group-item">
                    <div>
                        <span class="label label-default">posté le : <?php echo $row['re_date']; ?></span>

                        de : <?php 
                                $sql_user = "SELECT u_name from users WHERE 'u_id' ='" . $row['r_by'] . "'";
                                $result_user = $conn->query($sql_user);
                                if ($result_user->num_rows > 0) {
                                    $row_user = $result_user->fetch_assoc();
                                    echo $row_user['u_name'];
                                }else{
                                    echo "Anonyme";
                                }
                                ?>

                    </div>
                    <div class="stars">
                        <?php
                        $rating = $row['rating'];
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rating) {
                                echo '<span class="glyphicon glyphicon-star"></span>';
                            } else {
                                echo '<span class="glyphicon glyphicon-star-empty"></span>';
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