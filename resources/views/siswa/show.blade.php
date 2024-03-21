<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Siswa - Ardiansyah Sulistyo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-dark text-white">

    <div class="container mt-2 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3><a href="{{ route('siswa.index') }}" class="text-white">Kembali</a></h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/siswa/' . $students->image) }}" class="w-100 rounded">
                        <hr>
                        <h5>NIS: {{ $students->nis }}</h5>
                        <p class="tmt-3">
                            Nama: {!! $students->nama !!}
                        </p>
                        <p class="tmt-3">
                            No Telepon: {!! $students->no_telp !!}
                        </p>
                        <p class="tmt-3">
                            {!! $students->alamat !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
