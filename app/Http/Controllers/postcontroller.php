<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laravel_amuz;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class postcontroller extends Controller
{
    private $laravel_amuz;

    public function __construct(laravel_amuz $laravel_amuz){
        $this->laravel_amuz = $laravel_amuz;
    }


    //페이지네이션
    public function list(Request $request){
        // $this->laravel_amuz = $laravel_amuz; //총 레코드 수
        $contents = $this->laravel_amuz->orderBy('created_at', 'desc')->paginate(5); //내림차순으로 정리되게 함
        $total = DB::table('laravel_amuzs')->count();
        

        return view('list', compact(['contents','total'])); //모델 가져옴
    }


    public function create(Request $request){
        $checked=$request->checked;
        if($checked==0){
            return redirect()->route('list')->with('alert','로그인을 해주세요.');
        }
        else{
            return view('create');
        }
        
    }
    //글 작성
    public function upload(Request $request){
        $request=$request->validate([
            'title'=>'required',
            'text'=>'required',
            'name'=>'required',
            'UserKey'=>'required'
        ]); //들어가는 값들에 해당 설정을 부여하지 않으면 오류가 남
        $this->laravel_amuz->create($request);
        
        return redirect()->route('list');
    }


    //상세보기
    public function show(Request $request){
        $contentId = $request->content;
        $laravel_amuz = DB::table('laravel_amuzs')->where('id', $contentId)->first(); //쿼리문에 해당하는 배열을 가져옴
            return view('show', compact(["laravel_amuz"]));
    }


    //글 수정
    public function edit(Request $request){
        $contentId = $request->content;
        
        $laravel_amuz = DB::table('laravel_amuzs')->where('id', $contentId)->first();
        $checked=$request->checked;
        if(Auth::user()->email!=$laravel_amuz->UserKey){
            return redirect()->route('list')->with('alert','본인 글이 아니면 수정이 불가능 합니다. 메인 페이지로 넘어갑니다.');
        }
        elseif(Auth::user()->email==$laravel_amuz->UserKey){
            return view('edit', compact("laravel_amuz"));
        }
        
    }


    //데이터 업데이트
    public function update(Request $request){
        $contentId = $request->content;
        $title = $request->input('title');
        $text = $request->input('text');
        $currentDateTime = Carbon::now()->toDateTimeString(); //날짜 및 시간을 현재시간으로 불러옴. 
        // echo $currentDateTime->toDateTimeString('');

        $updatedData = [
            'title' => request('title'),
            'text' => request('text')
        ];

        $affected = DB::table('laravel_amuzs')
            ->where('id', $contentId) //인덱스 번호
            ->update(['title' => $title, 'text' => $text, 'updated_at' => $currentDateTime]); //내용 수정, 데이터베이스에 입력
        
        return redirect(route('list'));
    }

    //글 삭제
    public function destroy(Request $request){
        // $laravel_amuz->delete($laravel_amuz);
        $contentId = $request->content;
        $title = $request->input('title');
        $text = $request->input('text');  

        $deleted = DB::table('laravel_amuzs')->where('id', $contentId)->delete();
        return redirect(route('list'));
    }
    public function account(){
        return view('account');
    }
    

    //마이페이지
    public function mypage(Request $request){
        $contents = $this->laravel_amuz->orderBy('created_at', 'desc'); 
        $total = DB::table('laravel_amuzs')->where('UserKey', $request->UserKey)->count();
        $myPosts = DB::table('laravel_amuzs')->where('UserKey', $request->UserKey)->paginate(100);
        

        if(Auth::user()->email!==$myPosts[0]->UserKey){
            return redirect()->route('list')->with('alert','허가되지 않은 사용자입니다.');
        }
        elseif(Auth::user()->email==$myPosts[0]->UserKey){
            return view('mypage', compact(['contents','total', 'myPosts'])); 
        }
    }
}
