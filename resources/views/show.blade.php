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
    </style>
</head>
<body>
    @section('content')
        @foreach ($contents as $key => $content)
            <h1></h1>

            <div class="writing">
                <div class="writing_head"></div>
            </div>
        @endforeach

</body>
</html>