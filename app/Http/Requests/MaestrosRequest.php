<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaestrosRequest extends FormRequest
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
            "nombre"=>"required|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑü\s]+$/",
            "apellido_paterno"=>"required|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑü\s]+$/",
            "apellido_materno"=>"required|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑü\s]+$/",
            "telefono"=>"required|regex:/^\d{10}$/",
            "email"=>"required|unique:users|regex:/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑü]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/",
            "password"=>"required",
            "cedula"=>"required|regex:/^\d{7}\d?$/",
         ];
    }
    public function messages()
    {
        return [
            "nombre.required"=>"Porfavor ingrese el nombre",
            "nombre.regex"=>"Porfavor ingrese un nombre valido (solo letras y espacios)",
            "apellido_paterno.required"=>"Porfavor ingrese el apellido paterno",
            "apellido_paterno.regex"=>"Porfavor ingrese un apellido paterno valido (solo letras y espacios)",
            "apellido_materno.required"=>"Porfavor ingrese el apellido materno",
            "apellido_materno.regex"=>"Porfavor ingrese un apellido materno valido (solo letras y espacios)",
            "telefono.required"=>"Porfavor ingrese el telefono",
            "telefono.regex"=>"Porfavor ingrese un numero valido, ejemplo: 12345678910",
            "email.required"=>"Porfavor ingrese el email",
            "email.unique"=>"El email ya tiene una cuenta asociada",
            "email.regex"=>"Ingrese un email valido, ejemplo: edwin@gmail.com",
            "password.required"=>"Porfavor ingrese la contraseña",
            "cedula.required"=>"Porfavor ingrese la cedula",
            "cedula.regex"=>"La cedula es un conjunto de 7 u 8 numeros",
           ];
    }
}
