<?php
include 'header.php';
include "database.php";
?>

<div class="container">

  <div class="jumbotron other-color">
    <a href="user_add.php" role="button" class="btn btn-success">Ajouter un restaurant</a>

    <h2>Salut <?php echo $_SESSION['u_name']; ?></h2>


    <?php $user_id = $_SESSION['u_id'];
    $sql_rest = "SELECT * from REVIEW where r_by = " . $user_id;
    $result = $conn->query($sql_rest);
    if ($result->num_rows > 0) {
      // output data of each row

    ?>
      <div class="row">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Nom</th>
              <th scope="col">Adresse</th>
              <th scope="col">Avis</th>
              <th scope="col">Date</th>
              <th scope="col">Note</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>

              <tr>
                <td><?php echo $row['r_name']; ?></td>
                <td><?php echo $row['r_address']; ?></td>
                <td><?php echo $row['review']; ?></td>
                <td><?php echo $row['re_date']; ?></td>
                <td><?php echo $row['rating'];

                    for ($i = 1; $i <= 5; $i++) {
                      if ($i <= $row['rating']) {
                        echo '<span style="color: #FFD700" class="fa-solid fa-star"></span>';
                      } else {
                        echo '<span class="fa-regular fa-star"></span>';
                      }
                    }
                    ?></td>
              </tr>
            <?php
            }
            ?>

          </tbody>
        </table>

        <?php
      } else {
        ?>

          <div class="alert alert-info">
            <strong>Oups !</strong> Aucun restaurant corespondant n'a été trouvé. <br>
          </div>

        <?php
      }
        ?>
      </div>

  </div>
</div>


<?php include 'footer.html'; ?>