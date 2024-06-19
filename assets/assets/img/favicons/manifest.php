<?php
// Set the appropriate headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Define your manifest array
$manifest = [
    "name" => "",
    "icons" => [
        [
            "src" => "/android-chrome-192x192.png",
            "sizes" => "192x192",
            "type" => "image/png"
        ],
        [
            "src" => "/android-chrome-512x512.png",
            "sizes" => "512x512",
            "type" => "image/png"
        ]
    ],
    "theme_color" => "#ffffff",
    "background_color" => "#ffffff",
    "display" => "standalone"
];

// Output the manifest as JSON
echo json_encode($manifest);
?>
