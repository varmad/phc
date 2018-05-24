<?php

namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
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
              'email' => 'required|string|email|max:255',
              'display_name' => 'required',
              'username' => 'required',
              'mobile' => 'required',
              'address' => 'required'
          ];
        }
        // UPDATE
        case 'PUT':
        case 'PATCH':
        {
          return [
              'email' => 'required|string|email|max:255|unique:users,id'.$this->id,
              'password' => 'confirmed',
              'display_name' => 'required',
              'username' => 'required',
              'mobile' => 'required',
              'address' => 'required',
              'id_proof' => 'required',
              'upload_id_proof' => 'file'
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
