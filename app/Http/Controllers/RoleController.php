<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Role;
use App\User;

class RoleController extends Controller
{
    //Phương thức hiển thị dữ liệu
    function show()
    {
        //1)Tìm kiếm những người nào sở hữu quyền 3
        $users = Role::find(3)
            ->users;

        //2)Tìm kiếm những quyền do người có id = 2 sở hữu
        // $roles = User::find(2)
        // ->roles;
        return $users;
    }
}
