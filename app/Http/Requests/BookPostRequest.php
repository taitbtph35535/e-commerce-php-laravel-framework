<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookPostRequest extends FormRequest
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
            'title' => ['required', 'min:10'],
            'thumbnail' => ['image'],
            'author' =>['required', 'min:10'],
            'publisher' =>['required', 'min:10'],
            'Publication' =>['required', 'min:10'],
            'Price' => ['required', 'integer', 'min:1'],
            'Quantity' => ['required', 'integer', 'min:1'],
            'Category_id' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề là bắt buộc',
            'title.min' => 'Tiêu đề phải có ít nhất :min ký tự',
            'thumbnail.image' => 'File phải là ảnh',
            'author.required' => 'Tác giả là bắt buộc',
            'author.min' => 'Tác giả phải có ít nhất :min ký tự',
            'publisher.required' => 'Nhà xuất bản là bắt buộc',
            'publisher.min' => 'Nhà xuất bản phải có ít nhất :min ký tự',
            'Publication.required' => 'Ngày xuất bản là bắt buộc',
            'Publication.min' => 'Ngày xuất bản phải có ít nhất :min ký tự',
            'Price.required' => 'Giá là bắt buộc',
            'Price.integer' => 'Giá phải là số nguyên',
            'Price.min' => 'Giá phải lớn hơn hoặc bằng :min',
            'Quantity.required' => 'Số lượng là bắt buộc',
            'Quantity.integer' => 'Số lượng phải là số nguyên',
            'Quantity.min' => 'Số lượng phải lớn hơn hoặc bằng :min',
            'Category_id.required' => 'Danh mục là bắt buộc',
            'Category_id.integer' => 'Danh mục phải là số nguyên',

        ];
    }
}
