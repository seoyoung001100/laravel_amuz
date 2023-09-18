<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laravel_amuz;

class postcontroller extends Controller
{
    private $laravel_amuz;

    public function __construct(laravel_amuz $laravel_amuz){
        // Laravel 의 IOC(Inversion of Control) 입니다
        // 일단은 이렇게 모델을 가져오는 것이 추천 코드라고 생각하시면 됩니다.
        $this->laravel_amuz = $laravel_amuz;
    }
    public function list()
    {
        return view('list');
    }
    public function create(){
        return view('create');
    }
    public function upload(Request $request){
        $request=$request->validate([
            'title'=>'required',
            'name'=>'required'
        ]);
        $this->laravel_amuz->create($request);
        return redirect()->route('list');
    }

}
