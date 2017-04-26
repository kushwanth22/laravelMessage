
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container col-md-8 col-md-offset-2" style="background-color: #b8bac6">
        <h2>Hey! <b>{{ Auth::user()->name }}</b> your Inbox</h2>
		<br>
		
        <table class="table table-hover">
        
            <tbody>
				<thead>
					<th>Sender</th>
					<th>Subject</th>
					<th>Message</th>
                    <th>Email</th>
					<th>Delete</th>
					
				</thead>
				@foreach($messages as $message)
					
					<tr>
						<td>{{$message->name}}</td>
						<td>{{$message->subject}}</td>
						<td>{{$message->details}}</td>
                        <td>{{$message->sender}}</td>
						<td>
						
							<form method="POST" action="{{route('messages.destroy', ['id'=>$message->id])}}">
								{{csrf_field()}}
								<input class="btn btn-danger btn-sm" type="submit" value="Delete" / >
								<input type="hidden" name="_method" value="DELETE" />
							</form>
						</td>
						
					</tr>            
                @endforeach
        
               
            </tbody>
        </table>
<a href="{{route('deleteAll')}}" class='btn btn-danger'> Delete All </a>
		<a href="{{route('getImport')}}" class='btn btn-warning'> Import </a>
		<a href='getExport' class='btn btn-info'> Export </a>
		@if(Session::has('msgDelete_sucsess'))
			<div class='alert alert-success'>{{Session::get('msgDelete_sucsess')}}</div>
		@endif
		@if(Session::has('import_success'))
			<div class='alert alert-success'>{{Session::get('import_success')}}</div>
		@endif
		
		@if(Session::has('deleteAll_success'))
			<div class='alert alert-success'>{{Session::get('deleteAll_success')}}</div>
		@endif
		@if(Session::has('mark'))
			<div class='alert alert-success'>{{Session::get('mark')}}</div>
		@endif
		
    </div>
	

</div>
<br>

@endsection
