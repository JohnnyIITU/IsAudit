<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbars/">
    <link rel="stylesheet" href="/css/admin_head.css">
    <title>Navbar Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        html, body {
            background-color: #fff;
            color: #181819;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 90vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 50px;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>


</head>
<body>
<div class="container">
    @include('admin._header')
    <main role="main">
        <div>
            <div class="flex justify-content-end mb-3">
                <a href="/test/add">
                    <button class="btn btn-success btn-sm">
                        ADD NEW
                        <i class="fas fa-plus"></i>
                    </button>
                </a>
            </div>
            <table class="table table-responsive-sm table-stripper table-data table-bordered">
                <thead class="thead-inverse">
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Company</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tests as $test)
                    <tr>
                        <td>{{$test->id}}</td>
                        <td>{{$test->fullname}}</td>
                        <td>{{$test->getCompanyLabel()}}</td>
                        <td>
                            <a href="/test/delete/{{$test->id}}">
                                <button class="btn btn-danger btn-sm">
                                    Удалить
                                    <i class="fas fa-trash"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
</html>