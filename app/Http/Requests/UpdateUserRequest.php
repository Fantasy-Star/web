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
            'weibo_link'      => 'url',
        ];
    }

    public function performUpdate(User $user)
    {
        $data = $this->only($this->allowed_fields);
        $user->update($data);
        return $user;
    }
}
