<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Siswa - Ardiansyah Sulistyo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="bg-dark text-white">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Tutorial Laravel 10 untuk Pemula</h3>
                    <div class="d-flex justify-content-center align-items-center text-center">
                        <h5 class="text-center"><a href="#">Ardiansyah Sulistyo</a></h5>
                        <h5 class="ms-2 text-center"><a href="/posts">Data Post</a></h5>
                    </div>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('siswa.create') }}" class="btn btn-md btn-success mb-3">TAMBAH SISWA</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">NIS</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No Telepon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Foto Siswa</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr class="align-middle text-center">
                                        <td>{{ $student->nis }}</td>
                                        <td>{!! $student->nama !!}</td>
                                        <td>{!! $student->no_telp !!}</td>
                                        <td>{!! $student->alamat !!}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/siswa/' . $student->image) }}" class="rounded"
                                                style="width: 150px">
                                        </td>
                                        <td class="text-center">
                                            <form
                                                onsubmit="return confirm('Apakah Anda yakin ingin melakukan tindakan ini?');"
                                                action="{{ route('siswa.destroy', $student->id) }}" method="POST">
                                                <a href="{{ route('siswa.show', $student->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('siswa.edit', $student->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Siswa Belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>

</body>

</html>
