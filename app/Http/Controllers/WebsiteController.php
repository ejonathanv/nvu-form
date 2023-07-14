<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Referral;
use Illuminate\Http\Request;

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
}
