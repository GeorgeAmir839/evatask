@extends('layouts.app')

@section('content')
<div class="card-header">
    @foreach ($orders as $order)
    @endforeach
    {!!"<h1> Welcome To Show All orders  .. Count of User = ".count($orders)."</h1>"!!}

    <a href="{{ url('/user/create') }}" class='btn btn-dark'> Register form </a>

    {{-- <a class="btn btn-primary" href="{{ route('orderss.index') }}"> Back</a> --}}
</div>
<div class="container">
    <title>PDO - Read Records - PHP CRUD Tutorial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }

    </style>
</head>


    <div class="container">
        <div class="page-header row">

            <h1>Read Products || <a href="add.php">add</a></h1>
            <a href="{{ url('/logoutuser') }}" style="font-size: 20px">logout</a>
        </div>
        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Order price</th>
                <th>Order amount</th>
                <th>User Name</th>
                <th>Action</th>
            </tr>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->order_price }}</td>
                    <td>{{ $order->order_amount }}</td>
                    <td>{{ $order->user->user_name }}</td>
                    <td>

                        
                        <a href="" class="btn btn-danger m-r-1em">Delete</a>
                        <a href="" class="btn btn-primary m-r-1em">Edit</a>

                    </td>

                </tr>
            @endforeach

        </table>
        {{-- {{ $data->links() }} --}}
    </div>
    <div class="container">
        <form method="post">
            <input type="hidden" name="_method" value="delete">
            <button type="submit" class="btn btn-primary con" name="returnregister">return to register page</button>
            <button type="submit" class="btn btn-primary con" name="returnlogin">go logout</button>
            <button type="submit" class="btn btn-primary con" name="showalluser">show all user</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .uper {
            margin-top: 40px;
        }

    </style>
   
        
</div>
@endsection
