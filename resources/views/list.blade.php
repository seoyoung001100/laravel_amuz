<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="css/list.css"> --}}
    
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
    </style>

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
        <div class="under_head_2"><a href="{{route("index.create")}}"><input type="button" value="글쓰기"/></a></div> {{--글쓰기 페이지로 넘어가야함--}}
    </div>
    
    <div class="list_wrap">
        <table class="list">
            <thead> {{-- 헤더 콘텐츠 묶음 --}}
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Name</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tr>
                <td>001</td>
                <td>Laravel_amuz</td>
                <td>이서영</td>
                <td>2023. 09. 13.</td>
            </tr>
        </table>
    </div>
    <div class="page_num"> {{--페이지 수--}}
        <div class="page_num_1"><a href=""><</a></div>
        <div class="page_num_1"><a href="">1</a></div>
        <div class="page_num_1"><a href="">2</a></div>
        <div class="page_num_1"><a href="">3</a></div>
        <div class="page_num_1"><a href="">4</a></div>
        <div class="page_num_1"><a href="">5</a></div>
        <div class="page_num_1"><a href="">></a></div>
    </div>

</body>
</html>