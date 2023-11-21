<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Account</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body{
            margin: 0 auto;
            width: 1000px;
        }
        .header{
                /* background-color: #9E8A7A; */
                margin-bottom: 10%;
                margin-top: 2%;
                height: 50px;
            }
            .HeaderLogo, .HeaderLogin{
                float:left;
                width: 50%;
                height: 50px;
                line-height : 50px;
            }
            .HeaderLogin{
                text-align: right;
            }
            .HeaderLogo>img{
                width: 70px;
            }
    </style>
</head>
<body>
    <div class="header">
        <div class="HeaderLogo">
            <img src="{{url('/imgs/LOGO.png')}}" alt="logo"><a href="{{route("list")}}"></a>
        </div>
        <div class="HeaderLogin">
            <button class="m-2 h-7 w-20 items-center justify-center rounded-full bg-[#9E8A7A] from-pink-600 to-pink-400 p-0 text-sm text-white shadow-md shadow-pink-[#000000] duration-150 ease-in-out" type="submit">회원가입</button>
            <button class="m-2 h-7 w-20 items-center justify-center rounded-full bg-[#9E8A7A] from-pink-600 to-pink-400 p-0 text-sm text-white shadow-md shadow-pink-[#000000] duration-150 ease-in-out" type="submit">로그인</button>
        </div>
    </div>
</body>
</html>