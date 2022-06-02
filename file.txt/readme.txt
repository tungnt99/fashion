Phân tích dự án
1: Tổng quan
2: Thiết kế database
3: Triển khai

Yêu cầu:
Công nghệ sử dụng:
   Frontend:
        -HTML5/CSS/JS
        -Bootstrap 5/Jquery
    Backend:
        -PHP/MySQL

Chức năng nổi bật:
    -Thiết kế website bán hàng chuẩn -> đáp ứng yêu cầu thực tế bán hàng của website
    -Ajax trong dự án
    -Cookie/Session trong dự án
    -Tải hình ảnh lên server
    -Local Storage trong dự án
    -Thư viện soạn thảo nội dung (summernote)
-----------------------------------------------------------------------------------------------------
LESSION 1:

Triển Khai dự án:
    -Frontend:
        -Trang chủ
        -Trang danh sách sản phẩm
        -Trang chi tiết sản phẩm
        -Trang giỏ hàng
        -Trang checkout
        -Trang thanh toán
        -Trang liên hệ
    -Admin
        -Tài khoản người dùng
            Quản lý role(admin, user)
            Quản lý người dùng: admin/user
                Hiển thị danh sách thêm sửa xóa
            Đăng ký tài khoản
            Đăng nhập
        -Quản lý danh mục sản phẩm
        -Quản lý sản phẩm
        -Quản lý đơn hàng
            Hiển thị được danh sách đơn hàng -> hiển thị giảm dần theo thời gian (quản lý trạng thái đơn hàng)
        -Quản lý phản hồi
------------------------------------------------------------------------------------------------------------------
LESSION 2:
Thiết kế database
1: Bảng role
    id: int primary key auto_increment,
    name: varchar(55) not null
2: Bảng User
    id int primary key auto_increment,
    fullname varchar(55) not null,
    email varchar(150) not null,
    phone_number varchar(20) not null,
    address varchar(255) not null,
    password varchar(50) not null,
    role_id int foreign key references role(id)
    created_at datetime,
    updated_at datetime,
3: Bảng category
    id int primary key auto_increment,
    name varchar(55) not null,
4: Bảng Product
    id int primary key auto_increment,
    category_id int foreign key references category(id),
    title varchar(255) not null,
    price int,
    discount int,
    thumbnail varchar(255) not null,
    description text,
    created_at datetime,
    updated_at datetime,
5: Bảng quản lý galery
    id int primary key auto_increment,
    product_id int foreign key references product(id),
    thumbnail varchar(255) not null,
6: Bảng quản lý phản hồi -> feedback
    id int primary key auto_increment,
    firstname varchar(55) not null,
    lastname varchar(55) not null,
    email varchar(150) not null,
    phone_number varchar(20) not null,
    subject_name varchar(255) not null,
    content text,
7: Quản lý đơn hàng
    id int primary key auto_increment,
    fullname varchar(55) not null,,
    email varchar(150) not null,
    phone_number varchar(20) not null,
    address varchar(255) not null,
    note text,
    order_date datetime,
    Danh sách sản phẩm: 
        -sản phẩm 1 * số lượng * giá
        -sản phẩm 2 * số lượng * giá
    7.1: Bảng order 
        id int primary key auto_increment,
        user_id int foreign key references user(id),
        fullname varchar(55) not null,
        email varchar(150) not null,
        phone_number varchar(20) not null,
        address varchar(255) not null,
        note text,
        order_date datetime,
        status int,
        total_money int,
    7.2 Bảng order_detail
        id int primary key auto_increment,
        order_id int foreign key references order(id),
        product_id int foreign key references product(id),
        price int,
        num int,
        total_money int
Tạo database
-------------------------------------------------------------------
Quản lý tài khoản người dùng:
-Hiển thị danh sách người dùng
-Thêm/sửa/xóa người dùng (xóa: mềm)