<?php 
    // api/example.php
    
    header("Content-Type: application/json");
    
    // Mock data (this could come from a database)
    $data = [
        ["id" => 1, "task" => "Write portfolio", "status" => "done"],
        ["id" => 2, "task" => "Build PHP demo", "status" => "in-progress"],
    ];
    
    echo json_encode([
        "success" => true,
        "items" => $data,
        "generated_at" => date("Y-m-d H:i:s")
    ]);