<?php
namespace App\Http\Requests\Dashboard\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class SubscriptionRequestValidation extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules(){
        $rules = [
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'start_data' => 'required|date',
            'end_data' => 'required|date|after_or_equal:start_data',
            'price' => 'required',
            'value' => 'required',
        ];
        return $rules;
    }
}