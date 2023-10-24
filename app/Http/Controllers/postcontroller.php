<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\laravel_amuz;
use Illuminate\Support\Facades\DB;
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
        // $pageNum = ($_GET['page']) ? $_GET['page'] : 1;
        // $block_count = 5;
        // $block_num = ceil($pageNum/$block_count);
        // $block_start = (($block_num-1)*$block_count)+1; //블록 시작 번호
        return view('list', compact(['contents'])); //모델 가져옴
    }


    public function create(){
        return view('create');
    }
    //글 작성
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


    //상세보기
    public function show(Request $request){
        $contentId = $request->content;
        $contents = $this->laravel_amuz;
        $laravel_amuz = DB::table('laravel_amuzs')->where('id', $contentId)->get(); //쿼리문에 해당하는 배열을 가져옴
        return view('show', compact(["laravel_amuz","contents"]));
    }


    //글 수정
    public function edit(Request $request){
        $contentId = $request->content;
        
        $laravel_amuz = DB::table('laravel_amuzs')->where('id', $contentId)->get();
        return view('edit', compact("laravel_amuz"));
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
}
