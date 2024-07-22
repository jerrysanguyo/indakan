<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContestantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'barangay'      => 'required|string|max:255',
            'no_of_members' => 'required|integer',
            'focal_person'  => 'required|string|max:255',
            'folk_dance_id' => 'integer|exists:categories,id',
            'dance_id'      => 'integer|exists:dances,id',
            'added_by'      => 'integer|exists:users,id',
            'updated_by'    => 'integer|exists:users,id',
        ];
    }
}
