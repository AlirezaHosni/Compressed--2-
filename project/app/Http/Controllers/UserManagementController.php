<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\createUserRequest;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserManagementController extends Controller
{

    public function index()
    {

        $users=User::all();
        return view('backEnd.usermanagement.index')->with(compact('users'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
            $user=User::findOrFail($id);
           return view('backEnd.usermanagement.showuser')->with(compact('user'));
    }


    public function edit($id)
    {
        $permission=Permission::findByName('تحلیلگر');
        $roles=Role::all();
        $user=User::findOrFail($id);
        return view('backEnd.usermanagement.profile')->with(compact('user','roles','permission'));
    }


    public function update(createUserRequest $request, $id)
    {

        $user=User::findOrFail($id);
        $user->name=$request->name;
        $user->firstName=$request->firstName;
        $user->lastName=$request->lastName;
        $user->nationalCode=$request->nationalCode;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->phoneNumber=$request->phoneNumber;
        if ($request->active === null){
            $user->active=0;
        }else{
            $user->active=$request->active;
        }

        $user->save();
        $user->syncRoles($request->role);
        $user->syncPermissions($request->permission);
        session()->flash('updateUser','اطلاعات شما با موفقیت اصلاح شد.');
        return redirect()->back();

    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);

        if (!empty($image=$user->image)){
            $path='upload/users/'.$image;
            unlink($path);
        }
        User::destroy($user->id);
        session()->flash('delete','کاربر مورد نظر با موفقیت حذف شد');
        return redirect()->back();


    }
    public function editImage(Request $request,$id){
        $user=User::findOrFail($id);
        $file=$request->file('image');
        if (empty($file)){
            $image=$user->image;
            $user->image=$image;
        }else{
            $oldImage=$user->image;
            if (!empty($oldImage)){
                $oldPath="upload/users/".$oldImage;
                unlink($oldPath);
            }
            $image=$file->getClientOriginalName();
            $path="upload/users/".$image;
            if (file_exists($path)){
                $image=bin2hex(random_bytes(5)).$image;
            }
            $file->move("upload/users/",$image);
            $user->image=$image;
        }
        $user->save();
        return redirect()->back();



    }
}
