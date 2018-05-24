<?php

namespace App\Http\Requests\Admin;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class NurseCategoryRequest extends FormRequest
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
   * Prepare the data for validation.
   */
  protected function prepareForValidation(): void
  {
      $this->merge([
          'created_by' => Auth::user()->id
      ]);
      $this->merge([
          'updated_by' => Auth::user()->id
      ]);

      // $this->merge([
      //     'slug' => str_slug($this->input('title'))
      // ]);
      // $this->merge([
      //     'posted_at' => Carbon::parse($this->input('posted_at'))
      // ]);
  }
  /**
   * Get the validation rules that apply to the request.
   */
  public function rules(): array
  {
      return [
          'name' => 'required',
          'description' => 'required',
          'is_active' => 'required'
      ];
  }
}
