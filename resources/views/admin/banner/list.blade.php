@extends('admin.layouts.master')
@section('title')
    Banner List | Shop
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
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($banners))
                        @foreach ($banners as $banner)
                            <tr>
                                <td>{{$banner->id}}</td>
                                <td>{{$banner->title}}</td>
                                <td>{{$banner->description}}</td>
                                <td>{{$banner->photo}}</td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('banner.edit', ['banner' => $banner->id]) }}">
                                        <i class="lni lni-pencil-alt btn"></i>
                                    </a>
                                    <form class="d-inline-block" method="POST"
                                        action="{{ route('banner.destroy', ['banner' => $banner->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-transparent">
                                            <i class="lni lni-trash-can btn"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
@endsection
