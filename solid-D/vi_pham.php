<?php

public function index()
{
    $users = new User();
    $users = $users->where('created_at', Carbon::yesterday())->get();

    return response()->json(['users' => $users]);
}

/*
 * Mã này sẽ không tệ, bởi vì nó rõ ràng sẽ hoạt động. Nhưng đồng thời nó sẽ tạo ra các vấn đề sau:

Không thể sử dụng lại mã vì bị ràng buộc với Eloquent.
Rất khó để kiểm tra các phương pháp khởi tạo một hoặc một số đối tượng (khớp nối cao), vì rất khó để xác minh rằng nó đang thất bại.
Nó phá vỡ nguyên tắc trách nhiệm duy nhất (SRP) , bởi vì, ngoài phương pháp thực hiện công việc của nó, nó còn phải tạo ra các đối tượng để thực hiện công việc của nó.

 */