@extends('admin.template.app')
@section('title')
User Setting > User Edit > {{$biodata['nama_lengkap']}}
@endsection

@section('content')
<div class="container">
    <div class="card py-2">
        <div class="container-fluid">
            <div class="p-3">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-outline-dark">
                            <img src="https://cdn-icons-png.flaticon.com/512/456/456283.png" alt="" srcset=""
                                height="400">
                        </button>
                    </div>
                    <div class="col-7">
                        <div class="form-floating mb-3">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" value="{{(isset($biodata['nama_lengkap']) ? $biodata['nama_lengkap'] : "" )}}">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="no_handphone">No Handphone</label>
                            <input type="number" class="form-control" id="no_handphone" placeholder="08xxxxxxx" value="{{(isset($biodata['no_handphone']) ? $biodata['no_handphone'] : "" )}}">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="user@example.com" value="{{(isset($biodata->user->email) ? $biodata->user->email: "" )}}">
                        </div>
                     
                        <div class="form-floating mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" placeholder="Leave a comment here" id="alamat"
                                style="height: 100px;">{{(isset($biodata['alamat']) ? $biodata['alamat'] : "" )}}</textarea>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="role">Roles</label>
                            <br>
                            <select class="form-control form-select" id="role" aria-label="Floating label select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
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