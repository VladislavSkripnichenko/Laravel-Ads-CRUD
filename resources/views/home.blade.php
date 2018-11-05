@extends('layouts.app')

@section('content')

 <!-- Текущие задачи -->
 @if (count($ads) > 0)
<div class="row">
<div class="container">
 <div class="panel panel-default">
   <div class="panel-heading">
    Ads
   </div>

   <div class="panel-body">
     <table class="table table-striped task-table">

       <!-- Заголовок таблицы -->
       <thead>
         <th>Title</th>
         <th>Description</th>
         <th>Creator</th>
         <th>Created_at</th>
       </thead>

       <!-- Тело таблицы -->
       <tbody>
        @foreach ($ads as $ad)
        <tr>
             <!-- Имя задачи -->
            <td class="table-text">
            <div><a href="/{{$ad->id}}">{{ $ad->title }}</a></div>
            </td>

            <td class="table-text">
                <div>{{ $ad->description }}</div>
            </td>

            <td class="table-text">
                <div>{{ $ad->creator->username}}</div>
            </td>

            <td class="table-text">
                <div>{{ $ad->created_at }}</div>
            </td>
           {{-- @if(Auth::user()->username == $ad->creator->username) --}}
             <td>
                <a class="btn btn-primary btn-lg" href="/edit/{{ $ad->id }}" role="button">Edit</a>
             </td>
             <td>
                <form action="{{ route('delete', $ad->id) }}" method="post" onSubmit="return confirm('Are You Sure To Delete 
                    This Item? #{{ $ad->title }} ')">
                    
                    {{method_field("DELETE")}}
                    {{csrf_field()}}
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
          {{-- @endif --}}
           </tr>
         @endforeach
       </tbody>
     </table>
     <?php echo $ads->render(); ?>
   </div>
 </div>
</div>
</div>
@endif

@endsection
