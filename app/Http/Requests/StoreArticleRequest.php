<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Article;

class StoreArticleRequest extends FormRequest
{
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            // Crate
            case 'POST':
            {
                return [
                    'title'       => 'required',
                    'body'        => 'required',
//                    'category_id' => 'required|numeric',
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
//              $article = Article::findOrFail($this->route('id'));
                return [
                    'title'       => 'required|min:2',
                    'body'        => 'min:2',
//                    'category_id' => 'required|numeric',
                ];
            }
            default:break;
        }
    }
}
