<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Topic;

class StoreTopicRequest extends FormRequest
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
                    'category_id' => 'required|numeric',
                    'link'        => 'url|unique:share_links',
                ];
            }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                $topic = Topic::findOrFail($this->route('id'));
                if ($topic->isShareLink()) {
                    return [
                        'title'       => 'required',
                        'body'        => 'required',
                        'category_id' => 'required|numeric',
                        'link'        => 'url|unique:share_links,link,' . $topic->share_link->id,
                    ];
                } else {
                    return [
                        'title'       => 'required',
                        'body'        => 'required',
                        'category_id' => 'required|numeric',
                    ];
                }
            }
            default:break;
        }
    }
}
