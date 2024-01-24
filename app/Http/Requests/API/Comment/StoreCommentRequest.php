<?php

namespace App\Http\Requests\API\Comment;

use App\DTOs\CommentDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'text' => ['required', 'string'],
            'article_id' => ['required', 'int', 'exists:articles,id'],
        ];
    }

    public function toDTO(): CommentDTO
    {
        $data = $this->validated();

        return CommentDTO::from($data);
    }
}
