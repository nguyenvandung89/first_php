#Hướng dẫn cài đặt và tổng quan về PHP
1. Khái niệm về php
**PHP** (Hypertext Preprocessor) là ngôn ngữ script trên server được thiết kế để xây dựng các trang Web động. Mã **PHP** có thể thực thi trên Webserver để tạo ra mã HTML và xuất ra trình duyệt web.


**PHP** là mã nguồn mở, miễn phí và theo như đánh giá của người dùng thì nó là 1 ngôn ngữ dễ học và dễ sử dụng và mã nguồn khi chạy trên các hệ điều hành khác nhau thì không phải sửa lại nhiều.


Về kết nối với các cơ sở dữ liệu(Mysql, Sql Server, Oracle) thì rất đơn giản

2. Cài đặt


Để chạy một ứng dụng của **PHP** bạn cần phải cài **PHP**, Apache, và 1 hệ quản trị CSDL.


Bạn có thể cài riêng lẻ từng phần và cũng có thể cài một gói tích hợp sẵn cả 3 phần.

```
 sudo apt-get install libapache2-mod-auth-mysql php5-mysql phpmyadmin
```

Sau khi cài đặt xong chúng ta cần khởi động lại apache bằng lệnh sau:

```
sudo /etc/init.d/apache2 restart
```

Cần config servername


```
vi /etc/apache2/httpd_conf
ServerName localhost
```

kiểm tra apache2 có làm việc không

```
localhost:8080/index
```
Màn hình thông báo thành công sẽ như sau:

![alt text](https://cloud.githubusercontent.com/assets/4001514/5849490/b0b2ded6-a218-11e4-85dc-34d5dd605f41.png "anh1")

File index sẽ tự động được tạo ra khi chúng ta cài đặt xong **PHP**


Chúng ta kiểm tra xem cấu hình của **PHP** bằng cách vào thư mục

```
sudo cd /var/www
```

Tạo file vi info.**PHP** và paste dòng sau vào file đó

```
<?php phpinfo(); ?>
```

Và chạy `localhost:8080/info.php`

Hình ảnh:

![alt text](https://cloud.githubusercontent.com/assets/4001514/5849472/aae3e004-a218-11e4-92a2-d0d3b5d0e253.png "anh2")
###Các lỗi thường gặp khi cài đặt **PHP**
######Lỗi bị chiếm mất cổng default 80
Xem cổng 80 đã bị dùng chưa


Hình ảnh:
![alt text](https://cloud.githubusercontent.com/assets/4001514/5849471/aab1cc72-a218-11e4-8d2a-ee2dc7dd2373.png "anh3")


Do cài đặt apache2 mạc định cổng 80 nhưng khi máy bạn cổng 80 đã bị ứng dụng khác dùng thì khi chạy localhost sẽ có thông báo lỗi như sau:


Để khắc phục lỗi này thì ta cần config lại cổng khác cho apache2 ví dụ như cổng 8080


Vào file `vi /etc/apache2/ports.conf` sửa lại

```
Listen 80 thành
Listen 8080
```


Vào file `vi /etc/apache2/sites-available/default` sửa tất cả 80 thành 8080


Trong file `vi /etc/apache2/apache2.conf` ta include thêm 2 dòng sau


```
Include /etc/apache2/sites-enabled/
Include /etc/apache2/sites-available/
```


Sau khi sửa xong ta restart lại apache2



######Lỗi tiếp theo là lỗi và quyền permission
Hình ảnh:
![alt text](https://cloud.githubusercontent.com/assets/4001514/5849488/affad002-a218-11e4-96cf-8c1ab82e7b57.png "anh4")

Thông thường ta xét quền to nhất cho tất cả các thư mục bằng lệnh sau:
`sudo chmod -R 755 /var/www/filename or folder/`


3. Những kiến thức căn bản về PHP


######Cú pháp


Cú pháp chính của **PHP** như sau

`<?php Mã lệnh PHP ?>`

Cách ngắn ngọn như sau

`<? Mã lệnh PHP ?>`

`<% Mã lệnh PHP %>` // cú pháp này giống với ruby và ASP

```
<script language=php>
Mã lệnh php
</script>
```

Mặc dù có nhiều cách thể hiện mã lệnh nhưng thường người sử dụng dùng cách 1
và đặc biệt trong **PHP** để kết thúc một dọng lệnh thì phải có dấu ";" ở cuối
Ví dụ

```
<?php echo "Nguyen Van Dung"; ?>
```

- Về comment hay chú thích dòng code thì ta dùng "//" hoặc "/* block code */"
Ví dụ:

```
<?php
  echo "Hello!" // xin chao
  /* block code
     code
     code
  */
?>
```

Xuất thông tin ra trình duyệt:
+ echo "chuoi";
+ printf "chuoi";
Ví dụ:

```
<?php
  echo "Nguyen Van Dung";
  printf "PHP co ban";
?>
```
Kết nối giữa các chuỗi với nhau ta dùng dấu "."
Ví dụ
echo "Nguyen"."Van"."Dung";
