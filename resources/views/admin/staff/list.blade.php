@extends('admin.layouts.master')
@push('styles')
@endpush
@section('title', 'Furniture Store | staff List')
@section('page-name')
Staffs Management
@endsection
@section('content')
<section>
    <div class="table-container tableBorder">
        <table class="table shadow-sm mt-3 tableBorder table-custom table-borderless">
            <thead class="table-heading">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $staff->id }}</td>
                        <td><a href="{{ route('staff.show', ['staff' => $staff->id]) }}">{{ $staff->name }}</a></td>
                        <td>{{ $staff->category->name ?? '' }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('staff.edit', ['staff' => $staff->id]) }}">
                                <i class="lni lni-pencil-alt btn"></i>
                            </a>
                            <form class="d-inline-block" method="POST" action="{{ route('staff.destroy', ['staff' => $staff->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn-transparent">
                                    <i class="lni lni-trash-can btn"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</section>
@endsection
