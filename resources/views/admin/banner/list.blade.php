@extends('admin.layouts.master')
@section('title')
    Banner List | Furniture Store
@endsection
@section('page-name')
    Banner Management
@endsection
@section('content')
    <section>
        <div>
            <a class="my-btn d-flex justify-content-around align-items-center" href="{{ route('banner.create') }}">
                <i class="lni lni-circle-plus"></i> 
                Add Banner
            </a>
        </div>
        <div class="table-container tableBorder">
            <table class="table shadow-sm mt-3 tableBorder table-custom table-borderless">
                <thead class="table-heading">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Hello</td>
                        <td>Hello</td>
                        <td>Hello</td>
                        <td>Hello</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection