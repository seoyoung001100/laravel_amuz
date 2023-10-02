<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laravel_amuz;
use Illuminate\Support\Facades\DB;

class postcontroller extends Controller
{
    private $laravel_amuz;

    public function __construct(laravel_amuz $laravel_amuz){
        $this->laravel_amuz = $laravel_amuz;
    }
    public function list(){
        $contents = $this->laravel_amuz->paginate(5);
        return view('list', compact('contents')); //모델 가져옴
    }

    public function create(){
        return view('create');
    }

    public function upload(Request $request){
        $request=$request->validate([
            'title'=>'required',
            'text'=>'required',
            'name'=>'required',
            'password'=>'required'
        ]); //들어가는 값들에 해당 설정을 부여하지 않으면 오류가 남
        $this->laravel_amuz->create($request);
        return redirect()->route('list');
    }

    public function show(Request $request){
        $contentId = $request->content;
        $laravel_amuz = DB::table('laravel_amuzs')->where('id', $contentId)->get(); //쿼리문에 해당하는 배열을 가져옴
        return view('show', compact("laravel_amuz"));
    }
    public function edit(Request $request){
        $contentId = $request->content;
        $laravel_amuz = DB::table('laravel_amuzs')->where('id', $contentId)->get();
        return view('edit', compact("laravel_amuz"));
    }
    public function update(Request $request){

        $title = $request->input('title');
        $text = $request->input('text');    

        $updatedData = [
            'title' => request('title'),
            'text' => request('text')
            
        ];
        
        return redirect(route('list'));
    }


    public function destroy(laravel_amuz $laravel_amuz){
        $laravel_amuz->delete($laravel_amuz);
 
        return redirect(route('list'));
    }
}
