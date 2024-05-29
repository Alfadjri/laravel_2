@extends('admin.template.app')
@section('title')
   Product  > Create Product > Nama User
@endsection

@section('content')
<div class="container">
    <div class="card py-2">
        <div class="container-fluid">
            <div class="p-3">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-outline-dark">
                            <img src="https://cdn-icons-png.flaticon.com/512/15523/15523730.png" alt="cover_game" srcset=""
                                height="400">
                        </button>
                    </div>
                    <div class="col-7">
                        <div class="form-floating mb-3">
                            <label for="nama">Nama Game</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="nama">tahun game</label>
                            <input type="date" class="form-control" id="tahun" placeholder="d-m-yyyy">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="nama">Batas usia</label>
                            <input type="text" class="form-control" id="batas" placeholder="Batas Usia">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="alamat">Desct</label>
                            <textarea class="form-control" placeholder="Leave a comment here" id="alamat"
                                style="height: 100px"></textarea>
                        </div>
                        <div class="row mb-3 justify-content-end">
                            <button type="button" class="btn btn-success m-1">Save</button>
                            <button type="button" class="btn btn-danger m-1">back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection