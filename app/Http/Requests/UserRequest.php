<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

    /**
     * @var array
     */
    private $updateMethods = ['PUT', 'PATCH'];

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
        $parameters = $this->route()->parameters();

		$rules = [
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
		];

        if (in_array($this->method, $this->updateMethods))
        {
            $rules['email'] = 'required|email|unique:users,email,' . $parameters['users'];
        }

        return $rules;
	}

}
