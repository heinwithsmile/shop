@extends('admin.layouts.master')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/backend/pages/customer.css')}}">
@endpush
@section('title', 'Furniture Store | Customer List')
@section('content')
    <div class="profile">
        <div class="add-product-heading">
            <div class="add-product-heading-left">
                <h3>Customer Management</h3>
            </div>

            <div class="add-product-heading-right">
                <div class="noti-bell">
                    <img src="icons/noti_bell.png" alt="">
                    <span></span>
                </div>

                <img src="Images/profile.png" alt="">
            </div>
        </div>
    </div>

    <div class="date-search-sort">

        <div class="date">
            <p>01/01/2023 - 01/01/2024</p> <img src="icons/calendar.png" alt="">
        </div>

        <div class="search-sort">
            <div class="search">
                <input type="text" placeholder="Search...">
                <img src="icons/search.png" alt="">
            </div>

            <div class="sort">
                <select name="" id="">
                    <option value="">Default Sorting</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
        </div>
    </div>

    <div class="customer">
        <h3>Customers</h3>

        <div class="customer-table">
            <table>
                <tr>
                    <th>
                        <input type="checkbox" name="" id="">
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Phone
                    </th>
                    <th>
                        Joinging Date
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Sebastian Patterson
                    </td>
                    <td>
                        Sebastian Patterson@teleworm.us
                    </td>
                    <td>
                        918-743-7787
                    </td>
                    <td>
                        Nov 30 2023
                    </td>
                    <td>
                        <img src="icons/action.png" alt="">
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Sebastian Patterson
                    </td>
                    <td>
                        Sebastian Patterson@teleworm.us
                    </td>
                    <td>
                        918-743-7787
                    </td>
                    <td>
                        Nov 30 2023
                    </td>
                    <td>
                        <img src="icons/action.png" alt="">
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Sebastian Patterson
                    </td>
                    <td>
                        Sebastian Patterson@teleworm.us
                    </td>
                    <td>
                        918-743-7787
                    </td>
                    <td>
                        Nov 30 2023
                    </td>
                    <td>
                        <img src="icons/action.png" alt="">
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Sebastian Patterson
                    </td>
                    <td>
                        Sebastian Patterson@teleworm.us
                    </td>
                    <td>
                        918-743-7787
                    </td>
                    <td>
                        Nov 30 2023
                    </td>
                    <td>
                        <img src="icons/action.png" alt="">
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Sebastian Patterson
                    </td>
                    <td>
                        Sebastian Patterson@teleworm.us
                    </td>
                    <td>
                        918-743-7787
                    </td>
                    <td>
                        Nov 30 2023
                    </td>
                    <td>
                        <img src="icons/action.png" alt="">
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Sebastian Patterson
                    </td>
                    <td>
                        Sebastian Patterson@teleworm.us
                    </td>
                    <td>
                        918-743-7787
                    </td>
                    <td>
                        Nov 30 2023
                    </td>
                    <td>
                        <img src="icons/action.png" alt="">
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
