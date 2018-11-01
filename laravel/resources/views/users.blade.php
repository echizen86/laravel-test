{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('id', 'Id:') !!}
			{!! Form::text('id') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('sub', 'Sub:') !!}
			{!! Form::text('sub') !!}
		</li>
		<li>
			{!! Form::label('isRegistered', 'IsRegistered:') !!}
			{!! Form::text('isRegistered') !!}
		</li>
		<li>
			{!! Form::label('first_name', 'First_name:') !!}
			{!! Form::text('first_name') !!}
		</li>
		<li>
			{!! Form::label('last_name', 'Last_name:') !!}
			{!! Form::text('last_name') !!}
		</li>
		<li>
			{!! Form::label('nick_name', 'Nick_name:') !!}
			{!! Form::text('nick_name') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}