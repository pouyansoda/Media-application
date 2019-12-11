<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\photo;
use App\Role;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with([
            'users' => $users,
        ]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create')->with([
            'roles' => $roles
        ]);

    }

    public function store(UsersRequest $request)
    {
        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);

        }
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        User::create($input);
        return redirect('/admin/users')->with('success','User created successfully!');
    }

    public function show($id)
    {
        return view('admin.users.show');

    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles,
        ]);

    }

    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        if (trim($request->password) == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = bcrypt($request->password);

        }
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $input['password'] = bcrypt($request->password);

        $user->update($input);

        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        $user =  User::findOrFail($id);

        unlink(public_path().$user->photo->file);

        $user->delete();

        return redirect('/admin/users')->with('delete','User delete successfully!');

    }
}
