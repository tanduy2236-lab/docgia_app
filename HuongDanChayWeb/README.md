# Dự án docgia_app

Ứng dụng quản lý độc giả viết bằng PHP.

## Chức năng chính
- Thêm độc giả
- Sửa thông tin
- Xóa độc giả
- Kết nối CSDL MySQL

## Công nghệ sử dụng
- PHP
- MySQL


## Hướng dẫn chạy
1. Clone project về
2. Import database : Muontrasach
3. Chạy bằng Mysql
4. Chạy các lênh dưới đây trên terminal của visual studio code theo thứ tự:
- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate
- php artisan serve

