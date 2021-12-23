<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/school/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/school/aboutus/test">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/school/contactus">Contact Us</a>
                </li>
            </ul>

        </div>
    </nav>





    <style>
        .uper {
            margin-top: 40px;
        }

    </style>
    <div class="card uper">
        <div class="card-header">
            @foreach ($data as $row)
            @endforeach
            {!!"<h1> Welcome To Show All data  .. Count of User = ".count($data)."</h1>"!!}

            <a href="{{ url('/user/create') }}" class='btn btn-dark'> Register form </a>

            {{-- <a class="btn btn-primary" href="{{ route('datas.index') }}"> Back</a> --}}
        </div>

        <div class="card-body">
            <div class="row">
                @foreach ($data as $row)
                
                    <div class="col-xs-2 col-sm-2 col-md-3 row justify-content-arouned">
                        <div class="form-group">
                            <strong>id:</strong>
                            {{ $row->id }}

                        </div>
                        <div class="form-group">

                            <strong>name:</strong>

                            {{ $row->name }}

                        </div>
                        <div class="form-group">

                            <strong>email:</strong>
                            {{ $row->email }}

                        </div>
                        <div class="form-group">

                            <a href="{{ url('/deleteuser/'.$row->id) }}" class="btn btn-danger m-r-1em">Delete</a>
                            <a href="{{ url('/user/' . $row->id . '/edit') }}"class="btn btn-primary m-r-1em">Edit</a>
                            <a href="{{ url('/user/' . $row->id ) }}"class="btn btn-success m-r-1em">show</a>
                            
                            <a href="{{ url('/logoutuser' ) }}"class="btn btn-dark m-r-1em">logout</a>

                        </div>
                    </div>

                @endforeach
            </div>

        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

<style>
    .text {
        font-size: 100px
    }

</style>
