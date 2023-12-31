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
            $country_id = $_GET['editid'];
            $database = new Database;
            $result = $database->getedit(['country_id' => $country_id]);
        }
        ?>
        <form action="country.php" method="post">
            <!-- Add hidden input for country_id to send it to the server when the form is submitted -->
            <input type="hidden" name="country_id" value="<?= $result["id"] ?>">
            <div class="form-group">
                <label for="country_name">Enter Country Name:</label>
                <input type="text" id="country_name" name="country_name" value="<?= $result["country_name"] ?>" placeholder="Enter Country" required>
            </div>
            <div class="form-group">
                <label for="country_code">Enter Country Code:</label>
                <input type="text" id="country_code" name="country_code" value="<?= $result["country_code"] ?>" placeholder="Enter Code" required>
            </div>
            <div class="form-group">
                <input type="submit" name="updateEdit" class="btn btn-primary" value="Update">
            </div>
        </form>
    </div>

</body>

</html>