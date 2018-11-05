@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    @if ( isset($ad) )
    <form role="form" class="form"method="POST" action="/edit/{{$ad->id}}">
    @else
    <form role="form" class="form"method="POST" action="{{ route('create') }}">
    @endif
            {{ csrf_field() }}
            <div class="form-group">
            <label for="title">Title</label>
            @if ( isset($ad) )
            <input required type="text" name="title" value="{{ $ad->title }}" class="form-control" id="title" placeholder="Enter title">
            @else
            <input required type="text" name="title" class="form-control" id="title" placeholder="Enter title">
            @endif 

        </div>
            <div class="form-group">
            <label for="description">Description</label>
            @if ( isset($ad) )
            <p> <textarea class="form-control" name="description" id="description" placeholder="Enter description">{{ $ad->description }}</textarea></p>
            @else    
            <p> <textarea class="form-control" name="description" id="description" placeholder="Enter description"></textarea></p>
            @endif    
            </div>
            @if ( isset($ad) )
                <button type="submit" class="btn btn-success">Save</button>
            @else
                <button type="submit" class="btn btn-success">Create</button>
            @endif
    </form>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection