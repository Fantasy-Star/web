<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateUserRequest extends FormRequest
{
    public $allowed_fields = [
        'name', 'real_name', 'academy', 'city', 'gender',
        'department', 'tel', 'major' ,'class' ,'qq' ,'wechat',
        'introduction', 'weibo_name', 'weibo_link', 'email' ,'personal_website',
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'stu_id' => 'digits:12',
            'major' => 'nullable|max:50',
            'class' => 'nullable|max:30',
            'weibo_link' => 'nullable|url',
            'tel' => 'nullable|digits:11',
            'qq' => 'nullable|digits_between:5,11',
            'wechat' => 'nullable|between:5,25',
            'personal_website' => 'nullable|url',
        ];
    }

    public function performUpdate(User $user)
    {
        $data = $this->only($this->allowed_fields);
        $user->update($data);
        return $user;
    }
}
