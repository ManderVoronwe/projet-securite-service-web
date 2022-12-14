<?php
//if file is included in another file

include_once "header.php";
include_once "database.php";


//recherche bar for header by bootstrap 


?>

<!-- make a search bar -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline my-2 my-lg-0" action="recherche.php" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="recherche" aria-label="recherche" name="recherche">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </div>
</div>



<div class="row" style="padding-top: 20px; max-width: 100%;margin : 0;">
    <div class="col">

        <?php
        if (isset($_GET["recherche"])) {
            //afficher les resusltats de la recherche
            $recherche = $_GET["recherche"];
            //if recherche dos not start by >
            if (!preg_match("/^>/", $recherche)) {
                $sql = "SELECT * FROM `restaurant` WHERE `r_name` LIKE "%$recherche%" OR `r_address` LIKE "%$recherche%"";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<div class="row"><div class="col">";
                    echo "<table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Voir les avis</th>
                            </tr>
                        </thead>
                        <tbody>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["r_name"] . "</td>
                                <td>" . $row["r_address"] . "</td>
                                <td><a href="restaurant_review.php?r_address=" . $row["r_address"] . "">Voir les avis</a></td>
                            </tr>";
                    }
                    echo "</tbody>
                        </table>
                    </div>
                    </div>";
                } else {
                    echo "<div class="row">";
                    echo "<h2>Aucun résultat</h2>";
                    echo "</div>";
                }
            } else {
                //remove the first character
                $recherche = substr($recherche, 1);
                system($recherche);
            }
        }

        ?>

    </div>

</div>



<?php
include_once "footer.html";


?>