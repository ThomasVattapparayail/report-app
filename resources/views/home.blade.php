@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Report') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="sidebar">
                        <h2>Admin Pannel</h2>
                        <a href="/products/create">Create Product</a>
                        {{-- <a href="#">Manage Products</a>
                        <a href="#">Categories</a>
                        <a href="#">Tags</a> --}}
                    </div>
                    <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                </tr>
                                @endforeach  
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
