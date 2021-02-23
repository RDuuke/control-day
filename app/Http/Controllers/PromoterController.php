<?php

namespace App\Http\Controllers;

use App\ControlDay;
use App\Promoter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
       // dd(Promoter::where('id', $id));
      $promoter = Promoter::find($id);
      $controls_day = $promoter->controls_day()->where('deleted', '0')->paginate(10);
      return view('promoter.dashboard.index', ['promoter' => $promoter, 'controls_day' => $controls_day]);
      
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
      $control_day->evidence = $evidence->store('images/'.session('promoter_id'));
      $control_day->save();
      return redirect(route('promoter.controls', [
         'id' => session('promoter_id')
      ]));

    }

    public function controlsEdit($id){

      $control = ControlDay::find($id);

      return view('promoter.dashboard.edit', ['control' => $control]);

    }

    public function controlsUpdate(Request $request, $id, $idPromoter){

      //$control = ControlDay::find($id);
      $hasFile = false;
      // dd($request->hasFile('evidence'));

      $dataToValidate = [

         'type' => 'required',
         'hour' => 'required',
         'date' => 'required',
         'description' => 'required',

      ];

      if($request->hasFile('evidence')){

         $dataToValidate['evidence'] = 'required|mimetypes:image/jpeg';
         $hasFile = true;
         $evidence = $request->file('evidence');

      }

      $request->validate($dataToValidate);

      $saveData = [

         'type' => $request->post('type'),
         'hour' => $request->post('hour'),
         'date' => $request->post('date'),
         'description' => $request->post('description'),

      ];

      if($hasFile){

         $saveData['evidence'] = $evidence->store('images/'.session('promoter_id'));

      }

      ControlDay::where('id', $id)->update($saveData);

      return redirect(route('promoter.controls', ['id' => $idPromoter]));

    }

    public function controlsDelete($idpromoter, $id){

      try {

         ControlDay::where('id', $id)->update(['deleted' => '1']);

         session()->flash('result', 
         [
             'type' => 'success',
             'message' => 'Promotor retirado del sistema correctamente'
         ]
         );

         return redirect(route('promoter.controls', ['id' => $idpromoter]));

     } catch (\Throwable $th) {

         session()->flash('result', 
         [
             'type' => 'error',
             'message' => 'Algo ha fallado al procesar la operación. Intente mas tarde'
         ]
         );

         return redirect(route('promoter.controls', ['id' => $idpromoter]));

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
