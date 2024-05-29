@extends('admin.template.app')
@section('title')
    Product
@endsection

@section('content')
<div class="container-fluid">
    <div class="card py-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col d-flex justify-conten-start">
                    <div class="input-group" style="width:30rem;">
                        <input type="text" class="form-control" placeholder="Recipient's username"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                    </div>
                </div>
                <div class="col d-flex justify-content-end">
                    <button type="button" class="btn btn-primary"><img src="   https://cdn-icons-png.flaticon.com/512/2312/2312400.png " alt="icon_add" width="20" style="margin-righ:10px;"/> Create List </button>
                </div>
            </div>
        </div>
    </div>
    <div class="d-sm-flex justify-conten-sm-center">
        <div class="card shadow bg-body-tertiary rounded m-1" style="width: 15rem;">
            <img src="https://m.media-amazon.com/images/I/81II6I1r5gL.jpg" class="card-img-top px-2 pt-2"
                alt="icon_game" height="300">
            <div class="card-body">
                <h5 class="card-title">
                    <center>Metal Gear Solid HD Edition</center>
                </h5>
                <p class="card-text">
                    <!-- tanggal Relase game -->
                <p>JUN 12, 2012. <strong>Rated M for Mature</strong></p>
                <p>From the critically acclaimed director, Hideo Kojima, Metal Gear Solid HD Collection offers a handful
                    of </p>
                </p>
                <a href="#" class="btn btn-primary">Read more</a>
            </div>
        </div>
        <div class="card shadow bg-body-tertiary rounded m-1" style="width: 15rem;">
            <img src="https://m.media-amazon.com/images/I/81II6I1r5gL.jpg" class="card-img-top px-2 pt-2"
                alt="icon_game" height="300">
            <div class="card-body">
                <h5 class="card-title">
                    <center>Metal Gear Solid HD Edition</center>
                </h5>
                <p class="card-text">
                    <!-- tanggal Relase game -->
                <p>JUN 12, 2012. <strong>Rated M for Mature</strong></p>
                <p>From the critically acclaimed director, Hideo Kojima, Metal Gear Solid HD Collection offers a handful
                    of </p>
                </p>
                <a href="#" class="btn btn-primary">Read more</a>
            </div>
        </div>
    </div>
</div>
@endsection