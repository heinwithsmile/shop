@extends('admin.layouts.master')
@section('title', 'Add | Furniture Store')
@section('page-name')
    Add Banner
@endsection
@section('content')
    <section>
        <div class="container my-5">
            <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            </form>
        </div>
    </section>
@endsection