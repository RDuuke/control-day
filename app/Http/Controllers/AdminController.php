<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Promoter;
use App\Admin;

class AdminController extends Controller
{
    
    public function login(){

        return view('admin.login.index');

    }

    public function sigin(Request $request){

        $validateInfo = $request->validate([

            'email' => 'required|email|exists:admins,email',
            'password' => 'required'

        ]);

        $admin = Admin::where('email', $request->get('email'))->first();

        if(Hash::check($request->get('password'), $admin->password)){

            session(['admin_user'=> $admin]);

            return redirect(route('admin.index'));

        }
        
        $request->session()->flash('invalid_password', 'La contraseña es incorrecta');
        return redirect()->back();

    }

    public function logout(){

        if (session()->exists('admin_user')) {
            session()->flush();
        }
        return redirect(route('admin.login'));

    }

    public function index(){

        $promoters = Promoter::all();
        return view('admin.dashboard.index', ['promoters' => $promoters]);

    }

    public function create(){

        return view('admin.dashboard.create');

    }

    public function store(Request $request){

        $validateInfo = $request->validate([

            'name' => 'required',
            'last_name' => 'required',
            'document' => 'required'

        ]);
        
        $preparedData = [

            'name' => $request->post('name'),
            'last_name' => $request->post('last_name'),
            'document' => $request->post('document'),

        ];

        Promoter::create($preparedData);

        session()->flash('result', 
            [
                'type' => 'success',
                'message' => 'Promotor guardado correctamente'
            ]
        );
        return redirect(route('admin.index'));

    }

    public function edit($id){

        $promoter = Promoter::where('id', $id)->first();
        return view('admin.dashboard.edit', ['promoter' => $promoter]);

    }

    public function update(Request $request, $id){

        $validateInfo = $request->validate([

            'name' => 'required',
            'last_name' => 'required',
            'document' => 'required'

        ]);
        
        $preparedData = [

            'name' => $request->post('name'),
            'last_name' => $request->post('last_name'),
            'document' => $request->post('document'),

        ];

        Promoter::where('id', $id)->update($preparedData);

        session()->flash('result', 
            [
                'type' => 'success',
                'message' => 'Promotor guardado correctamente'
            ]
        );
        return redirect(route('admin.index'));

    }

    public function delete($id){

        try {

            Promoter::where('id', $id)->update(['deleted' => '1']);

            session()->flash('result', 
            [
                'type' => 'success',
                'message' => 'Promotor retirado del sistema correctamente'
            ]
            );

            return redirect(route('admin.index'));

        } catch (\Throwable $th) {

            session()->flash('result', 
            [
                'type' => 'error',
                'message' => 'Algo ha fallado al procesar la operación. Intente mas tarde'
            ]
            );

            return redirect(route('admin.index'));

        }


    }

    public function reintegrate($id){

        try {

            Promoter::where('id', $id)->update(['deleted' => '0']);
            
            session()->flash('result', 
            [
                'type' => 'success',
                'message' => 'Promotor reintegrado al sistema correctamente'
            ]
            );

            return redirect(route('admin.index'));

        } catch (\Throwable $th) {

            session()->flash('result', 
            [
                'type' => 'error',
                'message' => 'Algo ha fallado al procesar la operación. Intente mas tarde'
            ]
            );

            return redirect(route('admin.index'));

        }


    }

}
