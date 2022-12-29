<?php
include "header.php";
include "database.php";
?>

<div class="container">

    <div class="jumbotron other-color">
        <h2>Voici la liste de tous les Maki 🍣</h2>
        <p>Vous pouvez voir les avis de chaque restaurant en cliquant sur le bouton "Voir les avis".</p>

        <?php
        $sql_rest = "SELECT r_id, r_name, r_address from restaurant";
        $result = $conn->query($sql_rest);

        if ($result->num_rows > 0) {
            // output data of each row
        ?>
            <div class="list-group">
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-sm-3">
                            <h3>Restaurant</h3>
                        </div>
                        <div class="col-sm-3">
                            <h3>Adresse</h3>
                        </div>
                        <div class="col-sm-2">
                            <h3>Note</h3>
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                </div>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-sm-3"> <?php echo $row["r_name"]; ?></div>
                            <div class="col-sm-2"> <?php echo $row["r_address"]; ?></div>
                            <div class="col-sm-1">
                                <?php
                                $sql_rating = "SELECT rating from review WHERE `r_address` =\"" . $row["r_address"] . "\"";
                                $result_rating = $conn->query($sql_rating);
                                $rating = 0;
                                $count = 0;
                                while ($row_rating = $result_rating->fetch_assoc()) {
                                    $rating += $row_rating["rating"];
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
                                            echo "<span style=\"color: #FFD700\" class=\"fa-solid fa-star\"></span>";
                                        } else {
                                            echo "<span class=\"fa-regular fa-star\"></span>";
                                        }
                                    }
                                } else {
                                    echo "<div>No rating </div> ";
                                    echo "</div><div class=\"col-sm-2\">";

                                    for ($i = 1; $i <= 5; $i++) {
                                        echo "<span> _</span>";
                                        
                                    }
                                    
                                }

                            


                            ?>
                            </div>
                            <div class="col-sm-2">
                                
                                <a href="restaurant_review.php?r_address=<?php echo $row["r_address"]; ?>" class="btn btn-success btn-sm">Voir les avis</a>
                            </div>
                            <div class="col-sm-2">
                                <?php if (isset($_SESSION["u_id"]) && !empty($_SESSION["u_id"])) { ?>
                                    <a href="add_review.php?r_id=<?php print $row["r_id"]; ?>&r_name=<?php print $row["r_name"]; ?>&r_address=<?php print $row["r_address"]; ?>" role="button" class="btn btn-primary btn-sm">Ajouter un avis</a>
                                <?php 
                                    } else {
                                
                                 ?>
                                    <a href="signin.php" role="button" class="btn btn-primary btn-sm">Ajouter un avis</a>
                                <?php } ?>
                                
                            </div>


                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

        <?php
        } else {
            echo "0 results";
        }
        ?>
    </div>
</div>


<?php include "footer.html"; ?>