@extends('layouts.app')

@section('content')
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

    </style>
</head>


    <div class="container">
        <div class="row">

            <h1>Read old order</h1>
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
            @foreach ($user_orders as $order)
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
<div class="container">
    
    <style>
        .uper {
            margin-top: 2px;
        }

    </style>
   <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">Add New Order</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form method="post" action="{{ route('orders.store') }}">
                        @csrf
                       
                        <div class="form-group ">
                            <label class="label">order_price </label>
                            <input type="number" name="order_price" class="form-control" value="{{ old('order_price') }}" />
                           
                        </div>
                        <div class="form-group">
                            <label class="label">order_amount </label>
                            <input type="number" name="order_amount" class="form-control" value="{{ old('order_amount') }}" />
                           
                        </div>
                        
                        <div class="form-group mt-4 d-flex justify-content-center">
                            <input type="submit" class="btn btn-success col-12 " />
                        </div>
                        <div class="form-group mt-4 d-flex justify-content-center">
                            <a href="{{ route('users.index') }}"class="btn btn-light m-r-1em border border-dark col-12">|| Goo To User... </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

<style>
    .text {
        font-size: 100px
    }

</style>
</div>
@endsection
