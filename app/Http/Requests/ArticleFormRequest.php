<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class ArticleFormRequest extends FormRequest
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
        return [
                 'title' => 'required|min:5|max:100',
                 'description' => 'required|max:255',
                 'body' => 'required',
                 'image' => ($this->isMethod('post')) ? 'required|image|max:2048' : 'image|max:2048',
             ];
    }

    public function messages()
    {
        return [
             'title.required' => 'Введите название новости',
             'title.min' => 'Название должно быть длиннее 5 символов',
             'title.max' => 'Название должно быть короче 100 символов',

             'description.required' => 'Введите описание новости',
             'description.max' => 'Описание должно быть короче 255 символов',

             'body.required' => 'Введите текст новости',

             'image.required' => 'Добавьте изображение',
             'image.image' => 'Добавьте изображение в формате: jpeg,png,jpg,gif,svg',
             'image.max' => 'Превышен размер файла',

         ];
    }

    public function getPublishedAt()
    {
        if ($this->publicated == 'on') {
            return Carbon::now()->toDateString();
        } else {
            return null;
        }
    }
}
