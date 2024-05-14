@extends('admin.layouts.master')
@section('title')
    Category Management | Furniture Store
@endsection
@section('page-name')
    Category Management
@endsection
@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center">
            <div class="p-1 rounded bg-light my-3">
                <form action="{{ route('category.index') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="search" placeholder="Search" aria-describedby="button-addon1"
                            class="form-control border-0 bg-light">
                    </div>
                </form>
            </div>
            <div>
                <a class="my-btn d-flex justify-content-around align-items-center" href="{{ route('category.create') }}">
                    <i class="lni lni-circle-plus"></i> 
                    Add Category
                </a>
            </div>
        </div>
        <div class="tbl-container bdr">
            <table class="table shadow-sm mt-3 bdr table-custom table-borderless">
                <thead class="table-heading">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$count}}</td>
                            <td>
                                {{$category->name}}
                            </td>
                            <td class="d-flex align-items-center">
                                <a href="{{ route('category.edit', ['category' => $category->id]) }}">
                                    <i class="lni lni-pencil-alt btn"></i>
                                </a>
                                <form class="d-inline-block" method="POST" action="{{ route('category.destroy', ['category' => $category->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-transparent">
                                        <i class="lni lni-trash-can btn"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                        @endforeach
                </tbody>
            </table>
        </div>
        {{ $categories->links("vendor.pagination.default") }}
    </section>
@endsection
