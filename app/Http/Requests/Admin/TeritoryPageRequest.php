<?php

namespace App\Http\Requests\Admin;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class TeritoryPageRequest extends FormRequest
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
          'updated_by' => Auth::user()->id
      ]);

      $this->merge([
          'slug' => str_slug($this->input('name'))
      ]);

  }
  /**
   * Get the validation rules that apply to the request.
   */
  public function rules(): array
  {
      return [
          'name' => 'required',
          'description' => 'required',
          'status' => 'required'
      ];
  }
}
