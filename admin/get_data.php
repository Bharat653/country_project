<?php
// Include your database connection file
include '../database/connection.php';

// Assuming the method getstatesByCountryId is defined in your database connection class
if (isset($_POST['id'])) {
    $data = $database->getstatesByCountryId($_POST['id']);

    $html = "";
    foreach ($data as $state) {
        $html .= '<option value="' . $state['id'] . '">' . $state['state_name'] . '</option>';
    }

    echo $html;
} else {
    // Handle the case where 'id' is not set in the POST data
    echo '<option value="">Select a state</option>';
}
?>

 