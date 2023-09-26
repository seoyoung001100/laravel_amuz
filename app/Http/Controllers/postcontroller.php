<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laravel_amuz;
use Illuminate\Support\Facades\DB;

class postcontroller extends Controller
{
    private $laravel_amuz;

    public function __construct(laravel_amuz $laravel_amuz){
        // Laravel 의 IOC(Inversion of Control) 입니다
        // 일단은 이렇게 모델을 가져오는 것이 추천 코드라고 생각하시면 됩니다.
        $this->laravel_amuz = $laravel_amuz;
    }
    public function list(){
        $contents = $this->laravel_amuz->paginate(15);
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
        // $request -> title = $request -> post('title');
        // $request -> text = $request -> post('text');
        $title = $request->input('title');
        $text = $request->input('text');

        // 데이터 수정 로직
        // ...

        // 예시: 수정된 데이터 저장
        $updatedData = [
            'title' => $title,
            'text' => $text,
        ];

        return redirect(route('list')) -> with('alert-success', '수정되었습니다.');
    }
}
