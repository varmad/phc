<?php

namespace App\Http\Requests\Site;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ProfileRequest extends FormRequest
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
      // $this->merge([
      //     'created_by' => Auth::user()->id
      // ]);
      // $this->merge([
      //     'updated_by' => Auth::user()->id
      // ]);

      // $this->merge([
      //     'status' => 'Active',
      //     'name' => $this->input('display_name'),
      //     'password' => ''
      // ]);


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

    switch($this->method()) {
        // CREATE
        case 'POST':
        {
          return [
              'display_name' => 'required',
              'mobile' => 'required',
              'address' => 'required'
          ];
        }
        // UPDATE
        case 'PUT':
        case 'PATCH':
        {

          return [
              'display_name' => 'required',
              'mobile' => 'required',
              'address' => 'required'
          ];

        }
        case 'GET':
        case 'DELETE':
        default:
        {
            return [];
        };
    }
  }

}
