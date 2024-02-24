@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="sidebar">
            <h2>Admin Pannel</h2>
            <a href="/home">Product</a>
            {{-- <a href="#">Manage Products</a>
            <a href="#">Categories</a>
            <a href="#">Tags</a> --}}
        </div>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3">
            </div>   
            <div class="col-md-6">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <h1>Create Product</h1>
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
                </div>
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div> 
        </div>       
    </form>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5 mb-5">
            <h3>Product Table</h3>
            <table class="mt-5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                        </td>
                        <!-- Add more columns as needed -->
                    </tr>
                
                @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
 </div>
</div>  
@endsection

