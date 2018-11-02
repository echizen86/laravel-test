{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('id', 'Id:') !!}
			{!! Form::text('id') !!}
		</li>
		<li>
			{!! Form::label('to', 'To:') !!}
			{!! Form::text('to') !!}
		</li>
		<li>
			{!! Form::label('from', 'From:') !!}
			{!! Form::text('from') !!}
		</li>
		<li>
			{!! Form::label('subject', 'Subject:') !!}
			{!! Form::text('subject') !!}
		</li>
		<li>
			{!! Form::label('text', 'Text:') !!}
			{!! Form::text('text') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}