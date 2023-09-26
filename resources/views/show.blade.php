<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            color: #47372a
        }
        .writing{
            height: 500px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,.25);
            border: solid #ffffff 1px;
            color: #47372a;
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
            margin-top: 25px;
        }
        .btn>input{
            margin: 0 15px;
        }
    </style>
</head>
<body>
            <h1>{{$laravel_amuz[0]->title}}</h1>

            <div class="writing">
                <div class="writing_head">No. {{$laravel_amuz[0]->id}}</div>
                <div class="writing_text"> {{$laravel_amuz[0]->text}} </div>
            </div>
            <div class="btn">
                <input type="button" value="수정" onclick=" location.href= '{{route('edit', $laravel_amuz[0]->id)}}'">
                <input type="button" value="삭제">
            </div>

</body>
</html>