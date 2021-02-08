<?php

namespace App\Http\Controllers;

use App\ControlDay;
use App\Promoter;
use Illuminate\Http\Request;

class PromoterController extends Controller
{
    public function index(){
       return view('promoter.login.index');
    }

    public function singin(Request $request){
       $request->validate([
          'document' => 'required|exists:promoters,document'
       ]);

       session(['promoter_id' => Promoter::where('document', $request->get('document'))->first()->id]);
       session(['promoter_name' => Promoter::where('document', $request->get('document'))->first()->name]);

       return redirect(route('promoter.controls', [
          'id' => session('promoter_id')
       ]));
    }

    public function controls($id){

      return view('promoter.dashboard.index', ['promoter' => Promoter::find($id)]);
      
    }

    public function controlDetails($userid, $id){

      $control = ControlDay::find($id);

      return view('promoter.dashboard.control_show', ['control' => $control]);
       
    }

    public function controlsCreate(){

      return view('promoter.dashboard.create');
       
    }

    public function controlsStore(Request $request){

      $request->validate([
         'type' => 'required',
         'hour' => 'required',
         'date' => 'required',
         'evidence' => 'required|mimetypes:image/jpeg',
      ]);
      $evidence = $request->file('evidence');
      $last_control = ControlDay::select('id')->orderBy('id', 'desc')->first();
      $next_id = $last_control->id + 1;
      // dd($next_id);

      $control_day = new ControlDay();
      $control_day->type = $request->get('type');
      // $control_day->date = $request->get('date') . ' ' . $request->get('hour');
      $control_day->date = $request->get('date');
      $control_day->hour = $request->get('hour');
      $control_day->promoter_id = session('promoter_id');
      if($request->get('description') != '') {
         $control_day->description = $request->get('description');
      }
      $control_day->evidence = $evidence->store('images/'.session('promoter_id') . '/' . $next_id);
      $control_day->save();
      return redirect(route('promoter.controls', [
         'id' => session('promoter_id')
      ]));

    }

    public function controlsEdit($id){

      $control = ControlDay::find($id);

      return view('promoter.dashboard.edit', ['control' => $control]);

    }

    public function controlsUpdate(Request $request, $id){

      $control = ControlDay::find($id);

      $request->validate([
         'type' => 'required',
         'hour' => 'required',
         'date' => 'required'
      ]);

    }

    public function controlsDelete(){

      try {

         ControlDay::where('id', $id)->update(['deleted' => '1']);

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

    public function logout()
    {
       if (session()->exists('promoter_id')) {
          session()->flush();
       }
       return redirect(route('promoter'));
    }
}
