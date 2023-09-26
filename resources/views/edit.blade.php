<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            color: #47372a
        }
        .writing{
            height: 430px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,.25);
            border: solid #ffffff 1px;
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
        .writing_1>.writing_main>.title{
            font-size: 15px;
            width: 50%;
            height: 15px;
        }
        .writing_1>.writing_head{
            width: 480px;
            height: 20px;
        }
        .writing_head{
            width: 990px;
            background-color: #9E8A7A;
            height: 30px;
            border-radius: 5px 5px 0px 0px;
            line-height: 30px;
            color: #ffffff;
            padding-left: 10px;
        }
        /* ---------------------- 글쓰는 부분 ---------------------- */
        hr{
            width: 970px;
            height: 1px;
            text-align: center;
            background-color: #cfbbab;
            border: 0;
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

    </style>
</head>
<body>
    <div>
        <h1>Edit</h1>
    </div>
    <form action="{{route("update", $laravel_amuz[0]->id)}}" method="post">
        @csrf {{--  보안 --}}
        <div class="writing">
            <div class="writing_head" id="writing_head"></div> {{--이부분에 현재 날짜 혹은 시간이 나오게 구현하고 싶음.--}}
            <div class="writing_main">
                <input name="title" id="title" class="title" type="text" value="{{$laravel_amuz[0]->title}}" required>
                <hr>
                <textarea name="text" id="contents" required>{{$laravel_amuz[0]->text}}</textarea>
            </div>
        </div><br>
        
        <div class="button">
            <div class="button2"><input type="submit" value="저장하기" ></div> {{--콘솔창>저장했다는 콘솔>list로 돌아감--}}
        </div>
    </form>
    
    <script>
        let today = new Date();
        document.getElementById("writing_head").innerHTML=today.toLocaleDateString()
        
    </script>
</body>

</html>