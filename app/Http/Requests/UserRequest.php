<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;
use Illuminate\Support\Collection;

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
        $segments = Collection::make($this->segments());

        $rules = User::$rules;

        if (in_array($this->method, $this->updateMethods))
        {
            $rules['email'] = 'required|email|unique:users,email,' . $segments->last();
            $rules['username'] = 'required|alpha_dash|unique:users,username,' . $segments->last();
        }

        return $rules;
	}

}
