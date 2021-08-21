<?php

// Như chúng ta thấy ở trên, cách thiết kế mà chúng ta vừa áp dụng đã không sử dụng “tính đa hình” trong lập trình hướng đối tượng một cách đúng đắn. Để vừa giải quyết được yêu cầu của phần mềm, vừa làm chương trình ổn định trong lâu dài, chúng ta cần đảm bảo rằng chương trình sẽ báo lỗi ngay với chúng ta khi vừa biên dịch, tránh tình trạng bị quăng Exception như ví dụ trên.
//
//Ở đây, mình sẽ đề xuất một cách giải quyết đó là tách hàm runForSecretary() ra một interface riêng, chỉ những class nào được sử dụng các chức năng trong đó thì chúng ta mới implement function rõ ràng. Code mới sẽ có thiết kế như sau:
//
//Thiết kế lớp cơ sở và interface cần thiết như sau:
class Student
{
    // other functions and properties ...

    public function getStudentInfoJson()
    {
    return json_encode( array(name, age) );
    }
}

interface NationalSocialActivityInterface
{
    public function runForSecretary();
}

// Thực hiện implement
class NormalStudent extends Student implements NationalSocialActivityInterface
{
    public function runForSecretary()
    {
        // do something here ...
    }
}

class AdvancedStudent extends Student implements NationalSocialActivityInterface
{
    public function runForSecretary()
    {
        // do something here ...
    }
}

class ForeignStudent extends Student
{
    // ...
}

// Như vậy khi dùng dependency injection interface vào để chạy hàm runForSecretary thì sẽ không có lớp ForeignStudent. Hoặc nếu ở ngôn ngữ biên dịch thì nó sẽ báo lỗi ngay khi biên dịch
