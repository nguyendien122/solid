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