{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('id', 'Id:') !!}
			{!! Form::text('id') !!}
		</li>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('mail_driver', 'Mail_driver:') !!}
			{!! Form::text('mail_driver') !!}
		</li>
		<li>
			{!! Form::label('mail_host', 'Mail_host:') !!}
			{!! Form::text('mail_host') !!}
		</li>
		<li>
			{!! Form::label('mail_port', 'Mail_port:') !!}
			{!! Form::text('mail_port') !!}
		</li>
		<li>
			{!! Form::label('mail_username', 'Mail_username:') !!}
			{!! Form::text('mail_username') !!}
		</li>
		<li>
			{!! Form::label('mail_password', 'Mail_password:') !!}
			{!! Form::text('mail_password') !!}
		</li>
		<li>
			{!! Form::label('mail_encryption', 'Mail_encryption:') !!}
			{!! Form::text('mail_encryption') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}