<?php

return [
    'paths' => ['api/*'], // Đường dẫn API mà bạn muốn áp dụng CORS

    'allowed_methods' => ['*'], // Phương thức HTTP cho phép (VD: GET, POST)

    'allowed_origins' => ['http://localhost:3000'], // Nguyên tắc nguồn cho phép (VD: http://example.com)

    'allowed_origins_patterns' => [], // Mẫu nguyên tắc nguồn cho phép

    'allowed_headers' => ['*'], // Các tiêu đề cho phép

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,
];