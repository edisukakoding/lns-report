<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ClassRoom;

class CreateClassRoomRequest extends FormRequest
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
        return ClassRoom::$rules;
    }

    public function attributes()
    {
        return [
            'name'          => __('models/classRooms.fields.name'),
            'description'   => __('models/classRooms.fields.description'),
        ];
    }
}
