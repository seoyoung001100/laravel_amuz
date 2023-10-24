<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>show</title>
    <style>
         body{
            /* margin-top: auto 0; */
            margin: 10% auto;
            width: 1000px;
        }
        div{
            margin: 0 auto;
            width: 100%;
        }
        h1{
            text-align: center;
            color: #47372a;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 30px
        }
        .writing{
            height: 500px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,.25);
            border: solid #ffffff 1px;
            color: #47372a;
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
        hr{
            width: 970px;
            height: 1px;
            text-align: center;
            background-color: #cfbbab;
            border: 0;
        }
        .title{
            margin-top: 10px;
            padding: 0 10px;
            height: 40px;
            font-size: 30px;
            color: #47372a;
        }
        .writing_text{
            padding: 20px 20px;
        }
        .btn{
            text-align: center;
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
            <h1>{{$laravel_amuz[0]->title}}</h1>
            <div class="writing">
                <div class="writing_head">No.{{$laravel_amuz[0]->id}}</div>
                <div class="writing_text"> {{$laravel_amuz[0]->text}} </div>
            </div>
            <div class="btn">
                <input class="m-2 h-7 w-20 items-center justify-center rounded-full bg-[#9E8A7A] from-pink-600 to-pink-400 p-0 text-sm text-white shadow-md shadow-pink-[#000000] duration-150 ease-in-out" type="button" value="수정" onclick=" location.href= '{{route('edit', $laravel_amuz[0]->id)}}'">
                <form method="POST" action="/contents/{{ $laravel_amuz[0]->id }}">
                    @csrf
                    @method('delete')
                    <button class="m-2 h-7 w-20 items-center justify-center rounded-full bg-[#9E8A7A] from-pink-600 to-pink-400 p-0 text-sm text-white shadow-md shadow-pink-[#000000] duration-150 ease-in-out" type="submit">삭제
                </form>
               
            </div>

</body>
</html>