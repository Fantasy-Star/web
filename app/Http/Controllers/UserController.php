<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Auth;
use Mail;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ResetPasswordRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index', 'confirmEmail']
        ]);

        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        $statuses = $user->statuses()
                           ->orderBy('created_at', 'desc')
                           ->paginate(20);
        return view('users.show', compact('user', 'statuses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'stu_id' => 'required|digits:12',
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ],[

        ],[
            'stu_id' => '学号',
        ]);

        $user = User::create([
            'stu_id' => $request->stu_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $this->sendEmailConfirmationTo($user);
        session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');
        return redirect('/');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $this->authorize('update', $user);
        $request->performUpdate($user);
        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.edit', $user->id);
    }

    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }

// 发送邮件
    protected function sendEmailConfirmationTo($user)
    {
        $view = 'emails.confirm';
        $data = compact('user');

        $to = $user->email;
        $subject = "感谢加入幻星科幻协会 - Fantasy Star！请确认你的邮箱。";

        Mail::send($view, $data, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }

    public function confirmEmail($token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', '恭喜你，激活成功！');
        return redirect()->route('users.show', [$user]);
    }

    public function followings(User $user)
    {
        $users = $user->followings()->paginate(20);
        $title = '关注的人';
        return view('users.show_follow', compact('users', 'title'));
    }

    public function followers(User $user)
    {
        $users = $user->followers()->paginate(20);
        $title = '粉丝';
        return view('users.show_follow', compact('users', 'title'));
    }

//    avatar
    public function editAvatar($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        return view('users.edit_avatar', compact('user'));
    }
//    password
    public function editPassword($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        return view('users.edit_password', compact('user'));
    }
    public function updatePassword($id, ResetPasswordRequest $request)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);

        $user->password = bcrypt($request->password);
        $user->save();

        session()->flash('success', '密码修改成功！');

        return redirect(route('users.edit_password', $id));
    }
}
