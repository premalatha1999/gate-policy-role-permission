<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Spatie\Permission\Models\Role;
use App\Policies\PostPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function post(){
        return view('post');
    }

    public function create_to_post(Request $request,Post $post){
        //Gate
//        if(Gate::allows('post-create')){
//            $data = new Post();
//            $data->user_id = auth()->user()->id;
//            $data->comment = $request->comment;
//            $data->save();
//            echo 'you are sucessfully created post';
//        }else{
//            echo 'you are not access to create post';
//        }

        //Policy
        if(auth()->user()->can('create',$post)){
            echo "created";
        }else{
            echo "not created";
        }
    }

    public function delete_post(){
        $post = Post::find(1);
        if (Gate::allows('post-delete', $post)) {
            echo 'Deleted successfully';
        }else{
            echo 'you are not access to delete post';
        }
    }

    public function assignRole(){
        auth()->user()->assignRole('user');
        return view('home');
    }

    public function createPermission(){
        $permissions = [
            'aadd-product',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        return view('home');
    }

    public function assignPermissionToRole(){
        $role = Role::find(2);
        $role->syncPermissions('aadd-product');
        return view('home');
    }
}
