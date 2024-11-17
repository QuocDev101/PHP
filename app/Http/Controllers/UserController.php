<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
   
   

    public function showCreateForm()
    {
        return view('create_user');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function storeUser(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.list')->with('success', 'Người dùng đã được tạo thành công!');
    }

    public function showUser()
    {
        $users = User::all(); 
        return view('admin', compact('users'));
    }
    public function showAPIUser()
    {
        $users = User::all(); 
        return response()->json($users);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit_user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email']));

        return redirect()->route('users.list')->with('success', 'Người dùng đã được cập nhật!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.list')->with('success', 'Người dùng đã được xóa!');
    }




    public function authenticate(Request $request){
        // dd($request->all());

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],[
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
        ]);

        if (Auth::attempt( $credentials)) {


            $request->session()->regenerate();
            return redirect()->intended(route('users.list', absolute: false))->with('success','Đăng nhập thành công');
        }
        return redirect()->back()->with('error','Email hoặc mật khẩu không đúng');

    }



    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success','Đăng xuất thành công');

    }
}
