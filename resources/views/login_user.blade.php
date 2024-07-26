<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    #bg {
        background-image: url(https://asset-2.tstatic.net/jambi/foto/bank/images/kantor-badan-pusat-statistik-bps-provinsi-jambi.jpg);
        background-position: center;
        background-size: 100%;
    }

    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #0000ff, #0000cc, #000099, #000066);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: rgb(0, 0, 128);
    }

    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }

    .bold {
        font-weight: bold;
    }

    .alert {
        /* margin-top: 1rem; */
        padding-left: 10px;
        padding-top: 3px;
        padding-bottom: 3px;
        color: red;
        font-size: 12px;
        margin-bottom: 0px;
        margin-top: 0px;
    }
</style>

<body id="bg">
    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Lambang_Badan_Pusat_Statistik_%28BPS%29_Indonesia.svg/1280px-Lambang_Badan_Pusat_Statistik_%28BPS%29_Indonesia.svg.png" style="width: 100px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1" style="padding-top: 20px;">S U F R A</h4>
                                    </div>
                                    @if ($errors->has('loginError'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('loginError') }}
                                    </div>
                                    @endif
                                    <form action="/login" method="post">
                                        @csrf
                                        <div class="d-grid gap-2">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" required>

                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" required>



                                            <br>
                                            <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 bold">LOGIN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Selamat datang di website unggah Form Rencana Aksi BPS Provinsi Jambi</h4>
                                    <p class="small mb-0">Website ini memudahkan pegawai mengunggah dan mengelola form dengan cepat dan aman melalui antarmuka intuitif dan fitur unggah mudah, manajemen dokumen, serta keamanan tinggi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>