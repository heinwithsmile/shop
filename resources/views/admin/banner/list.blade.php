@extends('admin.layouts.master')
@section('title')
    Banner Management | Furniture Store
@endsection
@section('page-name')
    Banner Management
@endsection
@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div class="p-1 rounded bg-light my-3">
                {{-- <form action="{{ route('category.index') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="search" placeholder="Search" aria-describedby="button-addon1"
                            class="form-control border-0 bg-light">
                    </div>
                </form> --}}
            </div>
            <div>
                <a class="my-btn d-flex justify-content-around align-items-center" href="{{ route('banner.create') }}">
                    <i class="lni lni-circle-plus"></i> 
                    Add Banner
                </a>
            </div>
        </div>
        <div class="table-container tableBorder">
            <table class="table shadow-sm mt-3 tableBorder table-custom table-borderless">
                <thead class="table-heading">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </section>
@endsection
