<?php

// Check if muscle group is provided
if (!isset($_GET['muscle']) || empty($_GET['muscle'])) {
    echo json_encode(["status" => "error", "message" => "Please provide a muscle group."]);
    exit;
}

$muscleGroup = $_GET['muscle'];

// Initialize cURL
$curl = curl_init();

// API Configuration
curl_setopt_array($curl, [
    CURLOPT_URL => "https://exercisedb.p.rapidapi.com/exercises/bodyPart/" . urlencode($muscleGroup),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: exercisedb.p.rapidapi.com",
        "x-rapidapi-key: 45c47615cemsh4ffadff54158aa9p148816jsn5174ad595035"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

// Log raw response for debugging
if ($err) {
    echo json_encode(["status" => "error", "message" => "Failed to fetch exercises. cURL Error: $err"]);
    exit;
}

// Log the raw response from the API
file_put_contents("response_log.txt", $response, FILE_APPEND); // Logs the response to a file

// Decode API response
$decodedResponse = json_decode($response, true);

// Validate API response
if (is_array($decodedResponse) && count($decodedResponse) > 0) {
    $exercises = array_map(function ($exercise) {
        return [
            "name" => $exercise['name'] ?? "Unknown Exercise",
            "gif" => $exercise['gifUrl'] ?? null,
        ];
    }, $decodedResponse);

    echo json_encode(["status" => "success", "exercises" => $exercises]);
} else {
    echo json_encode(["status" => "error", "message" => "No exercises found for the specified muscle group."]);
}
?>