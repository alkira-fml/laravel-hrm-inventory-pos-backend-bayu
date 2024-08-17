<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'company_id'            => $this->company_id,
            'user_id'               => $this->user_id,
            'date'                  => $this->date,
            'is_holiday'            => $this->is_holiday,
            'is_leave'              => $this->is_leave,
            'leave_id'              => $this->leave_id,
            'holiday_id'            => $this->holiday_id,
            'clock_in_date_time'    => $this->clock_in_date_time,
            'clock_out_date_time'   => $this->clock_out_date_time,
            'total_duration'        => $this->total_duration,
            'is_late'               => $this->is_late,
            'is_half_day'           => $this->is_half_day,
            'is_paid'               => $this->is_paid,
            'status'                => $this->status,
            'reason'                => $this->reason,
        ];
    }
}
