@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add offer</div>

                <div class="card-body">
                    <form method="POST" action="{{route('offer.store')}}">
                        @csrf
                        {{-- <input name="_token" value="{{csrf_token()}}">  --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Price</label>
                            <input type="price" class="form-control" name="price" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Add offer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
