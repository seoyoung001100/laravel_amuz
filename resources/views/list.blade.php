<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="css/list.css"> --}}
    @vite('resources/css/app.css')
    <title>NOTES</title>
    <style>
        /* @import url(resources/css/list.css); */
        * {
            margin: 0;
            padding: 0;
        }
        body{
            margin-top: 10%
        }
        /* ---------------------- 윗부분 ---------------------- */
        div{
            margin: 0 auto;
            width: 1000px;
        }
        a{
            text-align: center;
            margin: 20px 20px;
            padding: 0 0;
            height: 25px;
        }
        span{
            height: 25px;
            margin-top:10px;
            margin-left: 20px;
            margin-right: 20px;
            padding: 0 0;
        }
        div h1{
            text-align: center;
            color: #47372a;
            font-size: 30px;
            font-weight: bold;
        }
        div h5{
            line-height: 36px;
            margin-left: 10px;
            color: #47372a;
        }
        .under_head{
            display: flex;
        }
        .under_head_1,.under_head_2{
            width: 500px;
        }
        .under_head_2{
            text-align: right;
            margin-right: 10px;
        }

        /* ---------------------- 게시판 ---------------------- */
        table {
            border: 1px #a39485 solid;
            font-size: .9em;
            box-shadow: 0 2px 5px rgba(0,0,0,.25);
            width: 100%;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden;
            /* text-align: center; */
        }
        
        th {
            text-align: left;
            color: #ffffff;
        }
            
        thead {
            font-weight: bold;
            color: #fff;
            background: #9E8A7A;
        }
            
        td, th {
            padding: 1em .5em;
            vertical-align: middle;
        }
            
        td {
            border-bottom: 1px solid rgba(0,0,0,.1);
            background: #fff;
        }

        #th_No{
            width: 15%;
        }
        #th_Title{
            width: 35%;
        }
        #th_Name{
            width: 25%;
        }
        #th_Date{
            width: 25%;
        }
        
        /* ------------------ 하단 부분 */
        .page_num{
            width: 400px;
            text-align: center;
            margin-top: 40px;
            display: flex;
            justify-content: center;
            
        }
       .page_num_1 {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: #9E8A7A;
            text-align: center;
            line-height: 28px;
            box-shadow: 0 2px 5px rgba(0,0,0,.25);
        }
        a{
            color: #fff;
            text-decoration-line: none;
        }     
        @media all and (max-width: 768px) {
            
            table, thead, tbody, th, td, tr {
            display: block;
            }
            
            th {
            text-align: right;
            }
            
            table {
            position: relative; 
            padding-bottom: 0;
            border: none;
            box-shadow: 0 0 10px rgba(0,0,0,.2);
            }
            
            thead {
            float: left;
            white-space: nowrap;
            }
            
            tbody {
            overflow-x: auto;
            overflow-y: hidden;
            position: relative;
            white-space: nowrap;
            }
            
            tr {
            display: inline-block;
            vertical-align: top;
            }
            
            th {
            border-bottom: 1px solid #a39485;
            }
            
            td {
            border-bottom: 1px solid #e5e5e5;
            }
            }
            .title_a{
                color: #47372a;
            }
    </style>
</head>
<body>
    {{-- <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1> --}}
    {{-- <a href="{{route("index.test")}}">test</a>  --}}
    {{-- route name으로 불러오기 --}}
    <div>
        <h1>NOTES</h1>
    </div>
    <div class="under_head">
        <div class="under_head_1"><h5>Total</h5></div> {{--total을 나타내고 싶음... --}}
        <div class="under_head_2"><a href="{{route("create")}}"><button class="mb-2 h-7 w-20 items-center justify-center rounded-full bg-[#9E8A7A] from-pink-600 to-pink-400 p-0 text-sm text-white shadow-md shadow-pink-[#000000] duration-150 ease-in-out"  type="submit" value="글쓰기"/>글쓰기</a></div> {{--글쓰기 페이지로 넘어가야함--}}
    </div>
    
    <div class="list_wrap">
        <table class="list">
            <thead> {{-- 헤더 콘텐츠 묶음 --}}
                <tr>
                    <th id="th_No">No.</th>
                    <th id="th_Title">Title</th>
                    <th id="th_Name">Name</th>
                    <th id="th_Date">Date</th>
                </tr>
            </thead>
            @csrf
            @foreach ($contents as $key => $content)
            <tr>
                <td>{{$key+1+($contents->currentPage()-1) *5}}</td>
                <td><a href="{{route("show", $content->id)}}" class="title_a"> {{$content->title}} </a></td>  {{--route로 show 페이지로 넘어가게 만듦--}}
                <td>{{$content -> name}}</td>
                <td>{{$content -> updated_at}}</td>
            </tr>
            @endforeach
        </table>
    </div>
        <div style="display: flex; text-align: center; justify-content: center;">
            @if ($contents->currentPage() > 0)
                <a href="{{ $contents->previousPageUrl() }}"><i class="fa fa-chevron-left mx-1 flex h-7 w-7 items-center justify-center rounded-full bg-[#9E8A7A] from-pink-600 to-pink-400 p-0 text-sm text-white shadow-md shadow-pink-[#000000] transition duration-150 ease-in-out"
                    href="#"><</i></a>
            @endif
            @for($i = 1; $i <= $contents->lastPage(); $i++)
                <a href="{{$contents->url($i)}}" class="fa fa-chevron-left mx-1 flex h-7 w-7 items-center justify-center rounded-full bg-[#9E8A7A] from-pink-600 to-pink-400 p-0 text-sm text-white shadow-md shadow-pink-[#000000] transition duration-150 ease-in-out"
                    href="#">{{$i}}</a>
            @endfor
            @if ($contents->currentPage() <= $contents->lastPage() )
                <a href="{{$contents->nextPageUrl()}}"><i class="fa fa-chevron-left mx-1 flex h-7 w-7 items-center justify-center rounded-full bg-[#9E8A7A] from-pink-600 to-pink-400 p-0 text-sm text-white shadow-md shadow-pink-[#000000] transition duration-150 ease-in-out"
                    href="#">></i></a>
            @endif
        </div>
        <div style="display: flex; text-align: center; justify-content: center;">
            @for($i = 1; $i <= $contents->lastPage(); $i++)
                <a href='{{$contents->onEachSide(2)->url($i)}}' class="fa fa-chevron-left mx-1 flex h-7 w-7 items-center justify-center rounded-full bg-[#9E8A7A] from-pink-600 to-pink-400 p-0 text-sm text-white shadow-md shadow-pink-[#000000] transition duration-150 ease-in-out">{{$i}}</a>
            @endfor
        </div>
        {{$contents->onEachSide(2)->links()}}
        
</body>
</html>
