@extends('base.base-index')
@section('custom-css')
<style>
    .f20{
        font-size: 20px
    }
</style>
@endsection
@section('content')
<div class="row layout-top-spacing">
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="text f20">Reply {{ $menu . (' - From ') . $message->name }}</span>
                <span class="icon">
                    <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-paper-plane"></i></button>
                </span>
            </div>
            <div class="row card-body">
                <div class="form-group mb-2 col-lg-6 col-12">
                    <label for="name">Name User</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $message->name }}">
                </div>
                <div class="form-group mb-2 col-lg-6 col-12">
                    <label for="email">Mail User</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $message->email }}">
                </div>
                <div class="form-group mb-2 col-lg-12 col-12">
                    <label for="subject">Subject Mail</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>
                <div class="form-group mb-2 col-lg-12 col-12">
                    <label for="message">Message Mail</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span class="text f20">Detail {{ $menu . (' - From ') . $message->name }}</span>
                <span class="icon">
                    <a href="" class="btn btn-outline-warning"><i class="fa-solid fa-sync"></i></a>
                </span>
            </div>
            <div class="row card-body">
                <div class="form-group mb-2 col-lg-6 col-12">
                    <label for="name">Name User</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $message->name }}">
                </div>
                <div class="form-group mb-2 col-lg-6 col-12">
                    <label for="email">Mail User</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $message->email }}">
                </div>
                <div class="form-group mb-2 col-lg-12 col-12">
                    <label for="subject">Subject Mail</label>
                    <input type="text" name="subject" id="subject" class="form-control" value="{{ $message->subject }}">
                </div>
                <div class="form-group mb-2 col-lg-12 col-12">
                    <label for="message">Message Mail</label>
                    <textarea name="message" id="message" cols="30" rows="10" value="{{ $message->message }}" class="form-control">{{ $message->message }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')

@endsection
