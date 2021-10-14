<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view("contact");
    }

    public function confirm(Request $request)
    {
        $form = $request->session()->get("form");

        if(!$form){
            return redirect()->action([ContactController::class, 'index']);
        }
        return view("confirm", ["form" => $form]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Contact::$rules);
        $form = $request->all();
        $zip = $request->postcode;
        $zip = mb_convert_kana($zip, 'a', 'UTF-8');
        if (preg_match("/\A\d{3}[-]\d{4}\z/", $zip)) {
            $request->session()->put("form", $form);
            return redirect()->action([ContactController::class, 'confirm']);
        } else {
            return redirect()->action([ContactController::class, 'index'])->withInput();
        }
    }

    public function send(Request $request)
    {
        $form = $request->session()->get("form");
        if($request->has("back")){
            return redirect()->action([ContactController::class, 'index'])->withInput($form);
        }

        if(!$form){
            return redirect()->action([ContactController::class, 'index']);
        }
        Contact::create($form);
        $request->session()->forget("form");
        return redirect()->action([ContactController::class, 'complete']);
    }

    public function complete()
    {
        return view("complete");
    }

    public function managePage(Request $request)
    {
        $getname = $request->input('getname');

        $getgender = $request->input('getgender');

        $from =  $request->input('from');

        $until =  $request->input('until');

        $getemail = $request->input('getemail');

        $query = Contact::query();

        if($request->has("reset")){
            $getname = '';

            $getgender = '';

            $from =  '';

            $until =  '';

            $getemail = '';
        }

        if(!empty($getname)) {
            $query->where('fullname', 'like', "%{$getname}%");
        }

        if(!empty($getemail)) {
            $query->where('email', 'like', "%{$getemail}%");
        }

        if(!empty($getgender)) {
            $query->where('gender', $getgender);
        }

        if (!empty($from) && !empty($until)) {
            $query->whereBetween("created_at", [$from, $until]);
        }

        $items = $query->orderBy('created_at','desc')->paginate(4);

        return view('manage', ["items" => $items, "getname" => $getname, "getemail" => $getemail, "from" => $from, "until" => $until]);
    }
    
    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect()->action([ContactController::class, 'managePage']);
    }
}
