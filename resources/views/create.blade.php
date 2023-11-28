<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Create</title>
    <style>
        /* @import url(resources/css/list.css); */
        body{
            /* margin-top: auto 0; */
            margin: 10% auto;
            width: 1000px;
        }
        /* ---------------------- 윗부분 ---------------------- */
        div{
            margin: 0 auto;
            width: 100%;
        }
        div h1{
            text-align: center;
            color: #47372a;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 30px
        }
        .writing{
            height: 430px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,.25);
            border: solid #ffffff 1px;
            background-color: #ffffff;
        }
        .writing_top{
            display: flex;
        }
        .writing_1{
            height: 55px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,.25);
            border: solid #ffffff 1px;
            width: 49%;
        }
        .writing_main{
            background-color: #ffffff;
        }
        .writing_1>.writing_main>.title{
            font-size: 15px;
            width: 50%;
            height: 15px;
        }
        .writing_1>.writing_head{
            width: 488px;
            height: 20px;
            margin: 0px;
            padding: 0px;
        }
        .writing_head{
            width: 998px;
            background-color: #9E8A7A;
            height: 30px;
            border-radius: 5px 5px 0px 0px;
            line-height: 30px;
            color: #ffffff;
            padding-left: 10px;
        }
        /* ---------------------- 글쓰는 부분 ---------------------- */
        div>hr{
            width: 970px;
            height: 1px;
            text-align: center;
            background-color: #cfbbab;
            border: 0;
            margin: 10px auto;
        }
        .writing_main>input, textarea{
            border: none;
            outline: none;
            margin-left: 10px;
            width: 980px;
        }
        .title{
            margin-top: 10px;
            height: 40px;
            font-size: 30px;
            color: #47372a;
        }
        textarea{
            margin-top: 10px;
            height: 310px; /*이후 글자 속성? 같은거 추가하면 줄여야함*/
            resize: none;
        }
        #contents{
            margin-left: 10px;
        }

        .button{
            margin-top: 10px;
            display: flex;
            /* background-color: #47372a; */
        }
        .button1, .button2{
            width: 500px;
        }
        .button1{
            margin-left: 10px;
        }
        .button2{
            text-align: right;
            margin-right: 10px;
        }
        .Today{
            color: #ffffff;
        }

    </style>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div>
        <h1>Create</h1>
    </div>
    <form action="{{route("upload")}}" method="post">
        @csrf {{--  보안 --}}

        <input style="display: none" type="text" name="name" value="{{Auth::user()->name}}">
        <input style="display: none" type="text" name="UserKey" value="{{Auth::user()->email}}">
        

        <div class="writing">
            <div class="writing_head" id="writing_head">
                {{-- <input class="Today" id="Today" name="Today_Time" onclick="today"> --}}
            </div> {{--이부분에 현재 날짜 혹은 시간이 나오게 구현하고 싶음.--}}
            <div class="writing_main">
                <input name="title" id="title" class="title" type="text" placeholder="제목을 입력해주세요." required>
                <hr>
                <textarea name="text" id="contents" placeholder="내용을 입력해주세요." required></textarea>
            </div>
        </div><br>
        
        <div class="button">
            <div class="button2"><input class="mb-2 h-7 w-20 items-center justify-center rounded-full bg-[#9E8A7A] from-pink-600 to-pink-400 p-0 text-sm text-white shadow-md shadow-pink-[#000000] duration-150 ease-in-out"  type="submit" value="저장하기" ></div> {{--콘솔창>저장했다는 콘솔>list로 돌아감--}}
        </div>
    </form>
    @endsection
</body>

</html>