@extends('layout.app')

@section('main')

<div class="text-end">
    <a href="products/create" class="btn btn-dark m-2">New Product</a>
</div>

      {{-- heading  --}}
    <div class="container">
        <h2>Products</h2>
    </div>
    

    {{-- table  --}}
    <div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Desc</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <th scope="row">{{ $loop->index+1 }}</th>
              <td><a href="products/{{$product->id}}/show" class="text-dark text-decoration-none cursor-pointer">{{$product->name}}</a></td>
              <td>{{$product->desc}}</td>
              <td><img src="products/{{$product->image}}" class="rounded-circle" height="30px" width="30px" /></td>
              <td>
                <a href="products/{{$product->id}}/edit" class="btn btn-warning">Edit</a>
                {{-- <a href="/" class="btn btn-danger">Delete</a> --}}

                <form method="POST" action="products/{{$product->id}}/delete" class="d-inline">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            </tr>
            @endforeach           
          </tbody>
      </table>
      {{$products->links()}}
    </div>
@endsection