<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store()
    {
        // /** validate your form fields */
        // $this->validate(request(), [
        //     'username' => 'required | max:1200',
        //     'password' => 'nullable|max:1200',
        // ], [
        //     'title.required' => 'Title field is required'
        //     // 'password.required' => 'Password field is required'
        // ]);
        // // return redirect()->to('indexx')->withSuccess(username);

        // $req = request();
        // $data = $req->all();
        // $users = new CreateUsersTable();


        //  $users->userName = $data['userName'];
        //  $users->name = $data['name'];
        //  $users->phone = $data['phone'];
        //  $users->email = $data['email'];
        //  $users->userType = 'customer';
        //  $users->password = Hash::make($data['password']);
        //  $users->save();
        //  return redirect()->to('home')->withSuccess('successfully registered');

        // if (request()->hasFile('image')) {
        //     $file_name = $this->uploadFile(request()->file('image'), $this->image_dir);
        //     $blog->image = $file_name;
        // }

        // $blog->title = $form_req['title'];
        // $blog->slug = str_slug($form_req['title']);
        // /*Image*/
        // $blog->description = $form_req['description'];
        // $blog->meta_title = $form_req['meta_title'];
        // $blog->meta_keywords = $form_req['meta_keywords'];
        // $blog->meta_description = $form_req['meta_description'];
        // $blog->status = $form_req['status'];
        // $status = $blog->save();
        // return redirect()->to('blogs')->withSuccess('New blog successfully added');
    }

    // protected function create(array $data)
    // {
    //     return users::create([
    //         'userName' => $data['userName'],
    //         'name' => $data['name'],
    //         'phone' => $data['phone'],
    //         'email' => $data['email'],
    //         'userType' => 'customer',
    //         'password' => Hash::make($data['password']),
    //         // 
    //     ]);
    // }
    public function login()
    {
        return view('home');
    }

    public function admin()
    {
        return view('room');
    }
    public funtion edit($id)
    {
        retutn view ('editprofile');
    }
}
