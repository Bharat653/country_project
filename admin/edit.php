<?php
include '../database/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $country_id = $_GET['id'];
        $query = "select * from country1 where id=:country_id ";
        $statement = $db->prepare($query);
        $data = [
            ':country_id' => $country_id,
        ];
        $statement->execute($data);

        $result = $statement->fetch(PDO::FETCH_OBJ);
    }
    ?>

    <form action="country.php" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add country</h5>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body ">
                            <div class="form-group">
                                <label class="control-label"><b>Enter Country Name:</b></label>
                                <input type="text" value="<?= $result["country_name"]; ?>" class="form-control input-sm" name="country_name" placeholder="Enter Country">
                            </div>

                            <div class="form-group">
                                <label class="control-label"><b>Enter Country Code:</b></label>
                                <input type="text" class="form-control input-sm " name="country_code" value="" placeholder="Enter Code">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="submit" class="btn btn-sm btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>