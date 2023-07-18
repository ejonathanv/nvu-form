<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function index($referido = null){

        $usersCount = User::count();
        if($usersCount == 0){
            return view('website.index');
        }

        // Buscamos si el referido existe en la base de datos
        if($referido){
            Referral::where('code', $referido)->firstOrFail();
        }

        // Si el referido existe, necesitamos el zoomDate actual para mostrar la fecha de zoom en el formulario
        if($referido){
            $referral = Referral::where('code', $referido)->first();
            $user = $referral->user;
        }else{
            $referral = Referral::where('default', true)->first();
            $user = $referral->user;
        }

        // Se busca el zoomDate activo del usuario
        $zoomDate = $user->zoomDates->where('active', true)->first();

        // Retornamos la vista de la pagina principal con el formulario
        return view('website.index', compact('referido', 'zoomDate'));
    }

    public function config(){
        return view('website.config');
    }

    public function storeConfig(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'code' => 'required|unique:referrals,code',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'El nombre es obligatorio',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'El correo debe ser válido',
            'email.unique' => 'El correo ya está en uso',
            'code.required' => 'El código es obligatorio',
            'code.unique' => 'El código ya está en uso',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = \Hash::make($request->password);
        $admin->save();

        $referral = new Referral();
        $referral->user_id = $admin->id;
        $referral->code = $request->code;
        $referral->default = true;
        $referral->save();

        // Vamos a autenticar al usuario y enviarlo al dashboard
        Auth::login($admin);

        return redirect()->route('dashboard');
    }
}
