
@extends('layout.app')

@section('main')
    {{-- heading  --}}
    <div class="container">
       <div class="conrtainer">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                <form method="POST" action="/products/store" enctype="multipart/form-data"> 
                    @csrf
                        <div class="form-group my-1">
                            <label>Name</label>
                            <input type="text" value="{{old('name')}}" name="name" class="form-control"/>
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group my-1">
                            <label>Description</label>
                            <textarea type="text"  value="{{old('desc')}}" name="desc" rows="4" class="form-control"></textarea>
                            @if($errors->has('desc'))
                            <span class="text-danger">{{ $errors->first('desc') }}</span>
                            @endif
                        </div>

                        <div class="form-group my-1">
                            <label>Image</label>
                            <input type="file" name="image"  value="{{old('image')}}" class="form-control"/>
                            @if($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>

                        <button class="btn btn-dark mt-2" type="submit">Submit</button>
                </form>
            </div>
            </div>
        </div>
       </div>
    </div>

    @endsection
    