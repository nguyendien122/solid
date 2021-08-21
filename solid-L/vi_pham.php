<?php

// Chúng ta có 3 lớp con kế thừa đại diện cho 2 loại sinh viên khác nhau đó là lớp NormalStudent (sinh viên chính quy) lớp AdvancedStudent (Sinh viên tài năng) và lớp ForeignStudent (Sinh viên nước ngoài). Chúng ta sẽ xem xét mở rộng một tính năng như sau: ứng cử vào chức bí thư Đoàn khoa chẳng hạn. Theo quy trình hoạt động trong thực tế, giả định rằng chỉ có sinh viên trong nước mới được ứng cử vào chức bí thư Đoàn, tức là các ForeignStudent không được phép ứng cử, vậy chúng ta sẽ xử lí như thế nào?
class Student
{
    // other functions and properties ...

    public function runForSecretary()
    {
        // do something
    }
}

class ForeignStudent extends Student
{
    // other functions and properties ...

    public function runForSecretary()
    {
        // ALERT - DO NOT USE THIS FUNCTION
        throw Exception("Not Allowed Action!!!");
    }
}

class NormalStudent extends Student
{
    // other functions and properties ...

    public function runForSecretary()
    {
        // do something here ...
    }
}

class AdvancedStudent extends Student
{
    // other functions and properties ...

    public function runForSecretary()
    {
        // do something here ...
    }
}

// Cách giải quyết vi phạm qui tắc Liskov:
// Có một suy nghĩ thường hay xảy đến với chúng ta khi giải quyết tình huống này, đó làm thêm hàm ứng cử runForSecretary() vào lớp cha là Student, tất cả lớp con đều được kế được lớp này, duy chỉ có lớp ForeignStudent là sẽ không có chức năng này. Để ngăn việc các lập trình viên khác không hiểu nghiệp vụ và sử dụng hàm này trong lớp ForeignStudent, ta sẽ quăng exception nếu có ai gọi chạy function này:
foreach ($stu as $student) {
    if ($type == 'normal') {
        ///...
    }
}

// Nếu trong trường chỉ có sinh viên trong nước (Sinh viên tài năng, sinh viên chính quy) thì chương trình chạy ổn, không có lỗi biên dịch, và ta nghĩ rằng ta đã lập trình đúng. Bỗng một ngày trường có thêm sinh viên nước ngoài, chương trình bị crash. Cách thiết kế như thế này tiền ẩn nguy cơ chạy ổn trong ngắn hạn, nhưng gặp lỗi nghiêm trọng trong dài hạn khi mở rộng chương trình. Đây chính là điểm mấu chốt mà nguyên tắc Liskov substitution muốn nói với chúng ta.