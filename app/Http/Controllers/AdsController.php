<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ad;

use Auth;


class AdsController extends Controller
{
    //

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $ads = Ad::orderBy('created_at', 'asc')->paginate(5);
        return view('home', [
            'ads' => $ads
        ]);
    }

    public function create(Request $request)
    {
        //TODO Валидацию на пустоту
        $data = $request->all();
        $ad = new Ad;
        $ad->title=$data['title'];
        $ad->description=$data['description'];
        $ad->user_id = Auth::user()->id;
        $ad->save();
        $request->session()->flash('status', 'Ad was successful created!');
        return redirect('/'.$ad->id); //TODO переход на страницу просмотра обьявления 
    }

    public function show($id)
    {
        $ad = Ad::find($id);
        return view('show', [
            'ad' => $ad
        ]);
    }

    public function edit($id)
    {
        $ad = Ad::find($id);
        if(Auth::user()->id == $ad->creator->id){
            return view('edit')->with('ad', $ad);
        }else{
            return redirect('/')->with('status','You dont have permission');
        }
        
    }
 
    public function update(Request $request,$id)
    {
        $data = $request->all();
        $ad = Ad::find($id);
        if(Auth::user()->id == $ad->creator->id){
            $ad->title = $data['title'];
            $ad->description = $data['description'];
            $ad->save();
            return redirect('/'.$id)->with('status','Ad changed');
        }else{
            return redirect('/')->with('status','You dont have permission');
        }
    }

    public function delete($id)
    {
        $ad = Ad::findOrFail($id);
        if(Auth::user()->id == $ad->creator->id){
            Ad::findOrFail($id)->delete();
            return redirect('/')->with('status','Ad deleted');
        }else{
            return redirect('/')->with('status','You dont have permission');
        }
    }

}
