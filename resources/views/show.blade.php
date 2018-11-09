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
          {{ $ad->created_at }}</li>       
          @can('delete', $ad )
          <li class="list-inline-item pull-right">
            <form action="{{ route('delete', $ad->id) }}" method="post">
              {{method_field("DELETE")}}
              {{csrf_field()}}
              <button class="btn btn-danger">Delete</button>
            </form>
          </li>
          @endcan
          @can('update', $ad )
          <li class="list-inline-item pull-right"><a class="btn btn-success" href="/edit/{{$ad->id}}" role="button">Edit</a></li>
          @endcan
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection