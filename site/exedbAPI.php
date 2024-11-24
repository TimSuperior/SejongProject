<?php
// Set API credentials
$apiUrl = "https://exercisedb.p.rapidapi.com/exercises/target/";
$apiHost = "exercisedb.p.rapidapi.com";
$apiKey = "45c47615cemsh4ffadff54158aa9p148816jsn5174ad595035"; // Replace with your actual API key

// Get user query
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $muscleGroup = strtolower($_POST['muscle'] ?? '');

    if (empty($muscleGroup)) {
        echo json_encode(["status" => "error", "message" => "Please specify a muscle group."]);
        exit;
    }

    // API Request
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $apiUrl . urlencode($muscleGroup),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: $apiHost",
            "X-RapidAPI-Key: $apiKey"
        ]
    ]);

    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if ($httpCode === 200) {
        $exercises = json_decode($response, true);
        if (count($exercises) > 0) {
            $result = array_map(function ($exercise) {
                return [
                    "name" => $exercise['name'],
                    "equipment" => $exercise['equipment'],
                    "gifUrl" => $exercise['gifUrl']
                ];
            }, $exercises);

            echo json_encode(["status" => "success", "exercises" => $result]);
        } else {
            echo json_encode(["status" => "error", "message" => "No exercises found for this muscle group."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to fetch exercises from the API."]);
    }
}
?>
