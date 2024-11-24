<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['query'])) {
    $query = $_POST['query'];
    $app_id = 'ab79852b'; // Replace with your actual app ID
    $app_key = '208d8f996cb010cadd71f6444ade39b6'; // Replace with your actual app key

    $url = 'https://trackapi.nutritionix.com/v2/natural/nutrients';
    $headers = [
        "Content-Type: application/json",
        "x-app-id: $app_id",
        "x-app-key: $app_key"
    ];
    $data = json_encode(['query' => $query]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($http_code === 200) {
        echo $response; // Successful API response
    } else {
        echo json_encode(['error' => 'Unable to fetch data from Nutritionix API.']);
    }

    curl_close($ch);
} else {
    echo json_encode(['error' => 'Invalid request.']);
}
?>
