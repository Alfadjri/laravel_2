@extends('admin.template.app')
@section('title')
User Setting
@endsection

@section('content')
<div class="container-fluid">
    <div class="card py-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col d-flex justify-conten-start">
                    <form action="{{route('admin.user.search', ['page_per_list' => 10])}}" method="get">
                        @csrf
                        @method('GET')
                        <div class="input-group" style="width:30rem;">
                            <input type="text" class="form-control" name="search" placeholder="Recipient's username"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Serach</button>
                        </div>
                    </form>
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="{{route('admin.user.create.page')}}" type="button" class="btn btn-primary"><img
                            src="   https://cdn-icons-png.flaticon.com/512/2312/2312400.png " alt="icon_add" width="20"
                            style="margin-righ:10px;" /> Create User 
                    </a>
                </div>
            </div>
            <div class="mt-3">
                <div class="row ">
                    <div class="col ">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($biodata as $value)

                                    <tr class="text-start">
                                        <th scope="col" class="text-center align-middle">1</th>
                                        <td scope="col" class="align-middle">{{$value->User->email}}</td>
                                        <td scope="col" class="align-middle">{{$value['nama_lengkap']}}</td>
                                        <td scope="col" class="align-middle">{{$value->User->getRoleNames()}}</td>
                                        <td scope="col" class="text-center">
                                            <a href="{{route('admin.user.detail', ['id_user' => $value['id']])}}"
                                                class="btn btn-warning rounded"> <img
                                                    src="https://cdn-icons-png.flaticon.com/512/1827/1827933.png"
                                                    alt="icon_edit" height="18"></a>
                                            <a href="{{route('admin.user.delete', ['id_user' => $value['id']])}}"
                                                class="btn btn-danger rounded"> <img
                                                    src="https://cdn-icons-png.flaticon.com/128/3096/3096687.png"
                                                    alt="icon_delete" height="18"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection