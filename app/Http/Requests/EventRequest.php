<?php

namespace App\Http\Requests;

use App\Models\BackpackUser;
use App\Models\Event;
use Illuminate\Validation\Rule;

class EventRequest extends AuthRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        parent::authorize();

        if (backpack_user()->hasPermissionTo(BackpackUser::PERMISSION_EVENTS_CREATE) || backpack_user()->hasPermissionTo(BackpackUser::PERMISSION_EVENTS_EDIT)) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|min:5|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|min:5|max:255',
            'type' => [
                'required',
                Rule::in([
                    Event::TYPE_ALL,
                    Event::TYPE_ACTION,
                    Event::TYPE_ACTIVITY,
                    Event::TYPE_EVENT,
                    Event::TYPE_MEETING,
                    Event::TYPE_TALK,
                    Event::TYPE_TRAINING,
                ]),
            ],
            'hosted_by' => 'required|min:5|max:255',
            'short_description' => 'required|min:5|max:300',
            'full_description' => 'required|min:5|max:2000',
            'image' => 'required|url',
        ];

        return $rules;
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }
}
