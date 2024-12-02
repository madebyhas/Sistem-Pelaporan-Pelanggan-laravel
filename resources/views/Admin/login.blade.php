<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <style>
        body {
            background-image: url('images/bgr.jpg');
        }

        .btn-purple {
            background: black;
            width: 100%;
            color: white;
        }
    </style>
    <title>Halaman Masuk Petugas</title>
</head>
<div class="text-center my-5">
    <img src="images/ptlokajayasm.png" alt="lokajaya" width="250px">
</div>

<!-- Mengatur tampilan awal login -->

<body>
    <div class="container">
        <div class="row justify-content-center">
            <!-- Mengatur Shadow -->
            <div class="card bg-transparent border-0 shadow-lg my-1">
                <div class="card-body p-0">
                    <!-- Mengatur Login -->
                    <div class="row">
                        <div class="col-lg-2"> </div>
                        <div class="col-lg-12">
                            <div class="text-center p-4">
                                <div class="card-body p-1">
                                    <h2 class="text-center text-white py-4"><strong>L O G I N</strong></h2>
                                    @if(Session::has('pesan'))
                                    <div class="alert alert-danger mt-2">
                                        {{ Session::get('pesan') }}
                                    </div>
                                    @endif
                                    <form action="{{ route('admin.login') }}" method="POST">
                                        @csrf
                                        <hr>
                                        <div class="form-group">
                                            <div class="text-left text-white">USERNAME</div>
                                            <input type="text" name="username" placeholder=""
                                                class="form-control form-control-user" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="text-left text-white">PASSWORD</div>
                                            <input type="password" name="password" placeholder="" class="form-control"
                                                required>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-purple mt-2" style="width: 100%">M A S U
                                            K</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>