<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username'=>'required',
            'password'=>'required'
        ];
    }

    //function to let login with username or email
    public function getCredentials(){
        $username = $this->get('username');
        //in case an email was sent
        if($this->isEmail($username)){
            return [
                'email' => $username,
                'password' => $this->get('password')
            ];
        }
        //in case an username was sent
        return $this->only('username', 'password');
    }
    //Function to determinate an email was sent
    public function isEmail($value){
        $factory = $this->container->make(ValidationFactory::class);
        //returns true or false
        return !$factory->make(['username' => $value],['username' => 'email'])->fails();
    }
}
