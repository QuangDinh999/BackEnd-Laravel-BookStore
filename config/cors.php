<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie', 'vnpay/*'],  // Điều chỉnh các đường dẫn API mà bạn muốn cho phép

    'allowed_methods' => ['*'],  // Chỉ cho phép phương thức POST

    'allowed_origins' => ['http://localhost:3000'],  // Cho phép yêu cầu từ localhost:3000

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],  // Cho phép tất cả các tiêu đề

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,   // Đặt true nếu bạn muốn cho phép thông tin đăng nhập (cookies, authorization headers, TLS client certificates)

];
