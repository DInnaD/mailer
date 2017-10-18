<div class="form-group">
    {!!Form::label('name_compaign', 'Name') !!}
    {!!Form::text('name_compaign', null, ['class' => 'form-control']) !!}

{{-- DROPDOWN --}}
{!!Form::select('size', array('template_id' => 'id_template')) !!}

{!!Form::select('size', array('bunch_id' => 'id_bunch' !!}

    
    {!!Form::label('description_compaign', 'Description') !!}
    {!!Form::text('description_compaign', null, ['class' => 'form-control']) !!}

</div>

