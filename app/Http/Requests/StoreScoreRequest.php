<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'contestant_id' => 'integer|exists:contestants,id',
            'criteria_id'   => 'integer|exists:criterias,id',
            'scored_by'     => 'integer|exists:users,id',
            'score'         => 'integer|required|max:100',
            'updated_by'    => 'integer|exists:users,id',
        ];
    }
}