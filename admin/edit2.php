<?php
include '../database/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Country</title>
    <!-- Add your CSS styles here (if any) -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Edit Country</h2>
        <?php
        $result;

        if (isset($_GET['editid'])) {
            $state_id = $_GET['editid'];
            $database = new Database;
            $result = $database->getedit1(['state_id' => $state_id]);
        }
        ?>
        <form action="state.php" method="post">
            <!-- Add hidden input for country_id to send it to the server when the form is submitted -->
            <input type="hidden" name="state_id" value="<?= $result["id"] ?>">

            <div class="form-group">
                    <label class="control-label">Country</label>
                    <select name="country_id" id="country_id" class="form-control input-sm">
                      <option>Select Country</option>
                      <?php foreach ($countries as $country) : ?>
                        <option value="<?= $result["country_id"]?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
            <div class="form-group">
                <label for="state_name">Enter state Name:</label>
                <input type="text" id="state_name" name="state_name" value="<?= $result["state_name"] ?>" placeholder="Enter Country" required>
            </div>
            <div class="form-group">
                <label for="state_code">Enter state Code:</label>
                <input type="text" id="state_code" name="state_code" value="<?= $result["state_code"] ?>" placeholder="Enter Code" required>
            </div>
            <div class="form-group">
                <input type="submit" name="updateEdit1" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>

</body>

</html>