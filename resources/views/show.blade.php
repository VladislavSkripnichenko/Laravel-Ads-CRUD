@extends('layouts.app')

@section('content')
<div class="row">
<div class="container">
<div class="col-md-12">
<div class="jumbotron">
<h1 class="display-4">{{ $ad->title }}</h1>
        <p class="lead">{{ $ad->description }}</p>
        <hr class="my-4">
        <ul class="list-inline">
            <li class="list-inline-item">{{ $ad->creator->username }}</li>
            <li class="list-inline-item">{{ $ad->created_at }}</li>      
        </ul>
        <p class="lead">
        <a class="btn btn-primary btn-lg" href="/edit/{{$ad->id}}" role="button">Edit</a>
        </p>
        <form action="{{ route('delete', $ad->id) }}" method="post" onSubmit="return confirm('Are You Sure To Delete 
                This Item? #{{ $ad->title }} ')">
                
                {{method_field("DELETE")}}
                {{csrf_field()}}
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
      </div>
</div>
</div>
</div>
@endsection