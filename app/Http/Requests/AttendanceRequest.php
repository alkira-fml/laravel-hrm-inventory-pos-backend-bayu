<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => 'required',
            'user_id' => 'required',
            'is_holiday' => 'nullable',
            'is_leave' => 'nullable',
            'leave_id' => 'nullable',
            'holiday_id' => 'nullable',
            'clock_in_date_time' => 'required',
            'clock_out_date_time' => 'nullable',
            'total_duration' => 'nullable',
            'is_late' => 'nullable',
            'is_half_day' => 'nullable',
            'is_paid' => 'nullable',
            'status' => 'nullable',
            'reason' => 'nullable',
        ];
    }
}
