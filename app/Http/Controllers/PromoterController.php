<?php

namespace App\Http\Controllers;

use App\ControlDay;
use App\Promoter;
use Illuminate\Http\Request;

class PromoterController extends Controller
{
    public function index()
    {
       return view('promoter.index');
    }

    public function singin(Request $request)
    {
       $request->validate([
          'document' => 'required|exists:promoters,document'
       ]);

       session(['promoter_id' => Promoter::where('document', $request->get('document'))->first()->id]);

       return redirect(route('promoter.controls', [
          'id' => session('promoter_id')
       ]));
    }

    public function controls($id){
       if (session()->exists('promoter_id')) {
          return view('promoter.controls', [
             'promoter' => Promoter::find($id)
          ]);
       }
       return redirect(route('promoter'));
    }

    public function controlDetails($userid, $id)
    {
       if (session()->exists('promoter_id')) {
          $control = ControlDay::find($id);
          return view('promoter.control_detail', [
             'control' => $control
          ]);
       }
       return redirect(route('promoter'));
    }

    public function controlsCreate()
    {
       if (session()->exists('promoter_id')) {
          return view('promoter.create');
       }
       return redirect(route('promoter'));
    }

    public function controlsStore(Request $request)
    {
       if (session()->exists('promoter_id')) {
          $request->validate([
             'type' => 'required',
             'hour' => 'required',
             'date' => 'required',
             'evidence' => 'required|mimetypes:image/jpeg',
          ]);
          $evidence = $request->file('evidence');
          $control_day = new ControlDay();
          $control_day->type = $request->get('type');
          $control_day->date = $request->get('date') . ' ' . $request->get('hour');
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
       return redirect(route('promoter'));
    }

    public function logout()
    {
       if (session()->exists('promoter_id')) {
          session()->flush();
       }
       return redirect(route('promoter'));
    }
}
