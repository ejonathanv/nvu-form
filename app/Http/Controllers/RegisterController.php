<?php

namespace App\Http\Controllers;

use App\Mail\SayThanks;
use App\Models\Referral;
use App\Models\Register;
use App\Mail\NewRegister;
use App\Exports\AllRegistersExport;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateRegisterRequest;

class RegisterController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.registers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegisterRequest $request)
    {

        // Vamos a obtener la fecha de zoom del referido.
        $zoomDate = $this->get_referral_zoom_date($request);

        if(!$zoomDate){
            return redirect()->route('home')->with('error', 'Lo sentimos, no hay fechas disponibles para la presentación.');
        }

        // Si ya se tiene el total de participantes, se le notificará al usuario que no hay cupo disponible.
        if($zoomDate->registers->count() >= $zoomDate->participants){
            $response = 'Lo sentimos, ya no hay cupo disponible para esta presentación.';
            return redirect()->back()->with('error', $response);
        }

        // Vamos a validar que el usuario no se haya registrado anteriormente.
        $duplicated = $this->prevent_duplicate_register($request, $zoomDate);

        if($duplicated){
            $response = 'Al parecer ya te has registrado anteriormente a esta presentación.';
            return redirect()->route('home')->with('error', $response);
        }

        // Vamos a intentar registar a un usuario en una fecha de zoom
        $register = $this->store_new_register($request, $zoomDate);

        // Se le notificará al referido que alguien se ha registrado con su código.
        $this->notify_to_referral($register);

        // Se le notificará al usuario que se ha registrado con éxito.
        $this->say_thanks($register);

        // Se retorna al usuario a la página de inicio con un mensaje de éxito.
        $response = '¡Felicidades ' . $request->name . '!, Te has registrado con éxito a nuestra Presentación Gratuita para alcanzar la Libertad Financiera.';
        
        return redirect()->route('home')->with('success', $response);
    }

    public function get_referral_zoom_date($request){
        // Vamos a buscar el referido por el código que nos envía el usuario.
        $referral = Referral::where('code', $request->referral_code)->first();

        // Si no hay referido, se le asignará el referido por defecto.
        if(!$referral){
            $referral = Referral::where('default', true)->first();
        }

        // Se le asignará la primera fecha de zoom activa del referido.
        $zoomDate = $referral->user->zoomDates()->where('active', true)->first();

        return $zoomDate;
    }

    public function prevent_duplicate_register($request, $zoomDate){
        // Vamos a validar que el usuario no se haya registrado anteriormente.
        $duplicated = Register::where('email', $request->email)
            ->where('zoom_date_id', $zoomDate->id)
            ->first();

        if($duplicated){
            return redirect()->route('home')->with('error', 'Lo sentimos, ya te has registrado anteriormente a esta presentación.');
        }

        return $duplicated;
    }

    public function store_new_register($request, $zoomDate){

        // Se crea el registro.
        $register = new Register();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->phone = $request->phone;
        $register->referral_id = $zoomDate->referral->id;
        $register->zoom_date_id = $zoomDate->id;
        $register->save();

        // Se retorna el registro para continuar con el proceso.
        return $register;

    }

    public function notify_to_referral($register){
        $referral = $register->referral;
        Mail::to($referral->user->email)->send(new NewRegister($register, $referral));
    }

    public function say_thanks($register){
        Mail::to($register->email)->send(new SayThanks($register, $register->zoomDate));
    }

    /**
     * Display the specified resource.
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegisterRequest $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Register $register)
    {
        //
    }

    public function downloadAllRegisters(){
        $referral = auth()->user()->referral;
        $filename = 'registros-de-' . $referral->code . '.xlsx';
        return Excel::download(new AllRegistersExport, $filename);
    }
}
