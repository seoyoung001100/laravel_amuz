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
        body{
            margin-top: 10%
        }
        /* ---------------------- 윗부분 ---------------------- */
        div{
            margin: 0 auto;
            width: 1000px;
        }
        div h1{
            text-align: center;
            color: #47372a
        }
        div h5{
            margin: 0;
            margin-left: 10px;
            color: #47372a
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
        <div class="under_head_2"><a href="{{route("create")}}"><input type="button" value="글쓰기"/></a></div> {{--글쓰기 페이지로 넘어가야함--}}
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
            @foreach ($contents as $key => $content)
            <tr>
                <td>{{$content -> id}}</td>
                <td><a href="{{route("show", $content->id)}}" class="title_a"> {{$content->title}} </a></td>  {{--route로 show 페이지로 넘어가게 만듦--}}
                <td>{{$content -> name}}</td>
                <td>{{$content -> updated_at}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    {{-- <div class="page_num">
        <div class="page_num_1"><a href=""><</a></div>
        <div class="page_num_1"><a href="">1</a></div>
        <div class="page_num_1"><a href="">2</a></div>
        <div class="page_num_1"><a href="">3</a></div>
        <div class="page_num_1"><a href="">4</a></div>
        <div class="page_num_1"><a href="">5</a></div>
        <div class="page_num_1"><a href="">></a></div>
    </div> --}}
    {{-- <div class="page_num">
        <div class="page_num_1">
            
        </div>
    </div> --}}

    <div class="mt-5 my-auto flex justify-around">
        <nav>
            <ul class="flex">
              <li>
                <a
                  class="mx-1 flex h-9 w-9 items-center justify-center rounded-full bg-[#9E8A7A] border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out hover:bg-light-300"
                  href="#"
                  aria-label="Previous"
                >
                  <span class="material-icons text-sm"><</span>
                </a>
              </li>
              <li>
                <a
                  class="mx-1 flex h-9 w-9 items-center justify-center rounded-full bg-[#9E8A7A] from-pink-600 to-pink-400 p-0 text-sm text-white shadow-md shadow-pink-500/20 transition duration-150 ease-in-out"
                  href="#"
                >
                  1
                </a>
              </li>
              <li>
                <a
                  class="mx-1 flex h-9 w-9 items-center justify-center rounded-full bg-[#9E8A7A] border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out hover:bg-light-300"
                  href="#"
                >
                  2
                </a>
              </li>
              <li>
                <a
                  class="mx-1 flex h-9 w-9 items-center justify-center rounded-full bg-[#9E8A7A] border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out hover:bg-light-300"
                  href="#"
                >
                  3
                </a>
              </li>
              <li>
                <a
                  class="mx-1 flex h-9 w-9 items-center justify-center rounded-full bg-[#9E8A7A] border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out hover:bg-light-300"
                  href="#"
                  aria-label="Next"
                >
                  <span class="material-icons text-sm">></span>
                </a>
              </li>
            </ul>
          </nav>
    </div>
    
    {{-- {{ $contents->links() }} --}}
</body>
</html>