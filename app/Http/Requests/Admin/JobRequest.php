<?php

namespace App\Http\Requests\Admin;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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

  }
  /**
   * Get the validation rules that apply to the request.
   */
  public function rules(): array
  {
      return [
          'job_reference_id' => 'required',
          'nursing_id' => 'required',
          'staff_count' => 'required',
          'nurse_category_id' => 'required',
          'shift_id' => 'required',
          'start_date' => 'required',
          'end_date' => 'required',
          'description' => 'required',
          'status' => 'required'
      ];
  }
}
