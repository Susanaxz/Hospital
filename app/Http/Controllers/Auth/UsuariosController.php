<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validate;
use App\Models\Usuario;
use Password;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UsuariosController extends Controller
{
    public function alta(Request $request)
    {
        $datos = request()->all();

        $request->validate([
            'nif' => ['required', 'string', 'min:9', 'max:9', 'unique:usuarios,nif'],
            'nombre' => 'required|string|max:80',
            'apellidos' => 'required|string|max:80',
            'email' => ['required', 'email', 'max:80', 'unique:usuarios,email'],
            'password' => ['required', 'confirmed', Rules\Password::default()]
        ]);

        $usuario = Usuario::create([
            'nif' => $datos['nif'],
            'nombre' => $datos['nombre'],
            'apellidos' => $datos['apellidos'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']), // hace lo mismo que el método bcrypt()
        ]);

        // return to_route('login')->with('status', 'Cuenta creada');
        Auth::login($usuario);

        return to_route('login')->with('status', 'Cuenta creada');

    }

    public function logout(Request $request)
    {
        $nombre = Auth::user()->nombre;
        $apellidos = Auth::user()->apellidos;
        Auth::guard('web')->logout(); // cierra la sesión (web es el nombre del guard)

        $request->session()->invalidate(); // invalida la sesión
        $request->session()->regenerateToken(); // regenera el token de la sesión
        return redirect()->route('login')->with('status', 'Hasta la próxima ' . $nombre . ' ' . $apellidos);
    }

    public function login(Request $request)
    {
        $datos = request()->all();

        $request->validate([
            'nif' => ['required', 'string', 'min:9', 'max:9'],
            'password' => ['required', 'string', Rules\Password::defaults()]
        ]);

        $credenciales = $request->only('nif', 'password');

        // $recordar = $request['recordar'] == 'on' ? true : false;  // si el checkbox está marcado, recordar es true, si no, false
        $recordar = $request->boolean('recordar'); // otra forma de hacer lo mismo que la línea anterior

        if (Auth::attempt($credenciales, $recordar)) { // si las credenciales son correctas, se crea la sesión
            $request->session()->regenerate(); //  regenera el ID de la sesión para evitar ataques de fijación de sesión
            return redirect()->intended('/')->with(['status' => 'Login correcto']); // si el usuario intenta acceder a una página que requiere autenticación, se le redirige a la página que quería acceder
        }

        return back()->withErrors([
            'nif' => 'El nif no es correcto',
            'password' => 'El password no es correcto'
        ]);
    }
}

