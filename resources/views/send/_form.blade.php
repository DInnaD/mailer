<div class="form-group">
    {!!Form::label('subject_send', 'Subject') !!}
    {!!Form::text('subject_send', null, ['class' => 'form-control']) !!}
    {!!Form::label('to_send', 'To') !!}
    {!!Form::text('to_send', null, ['class' => 'form-control']) !!}
    {!!Form::label('from_send', 'From') !!}
    {!!Form::text('from_send', null, ['class' => 'form-control']) !!}
    {!!Form::label('message_send', 'Message') !!}
    {!!Form::textarea('message_send', null, ['class' => 'form-control']) !!}
    {{-- DROPDOWN --}}
</div>

