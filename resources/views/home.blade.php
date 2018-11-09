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
							<td>
								@can('update', $ad )
								<a class="btn btn-primary" href="/edit/{{ $ad->id }}" role="button">Edit</a>
								@endcan
							</td>
							<td>
								@can('delete', $ad )
								<form action="{{ route('delete', $ad->id) }}" method="post">    
									{{method_field("DELETE")}}
									{{csrf_field()}}
									<button class="btn btn-danger">Delete</button>
								</form>
								@endcan
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<?php echo $ads->render(); ?>
			</div>
		</div>
	</div>
</div>
@else
<h1>We dont have Ads</h1>
@endif
@endsection