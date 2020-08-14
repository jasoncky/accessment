<?php

namespace App\Http\Requests;

use App\Sentence;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateSentenceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sentence_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'        => [
                'required',
            ],
            'style'        => [
                'required',
            ],
            'colour'        => [
                'required',
            ],
            'position'        => [
                'required', 'integer'
            ],
        ];
    }
}
