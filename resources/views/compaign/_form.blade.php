<div class="form-group">
    {!!Form::label('name_compaign', 'Name') !!}
    {!!Form::text('name_compaign', null, ['class' => 'form-control']) !!}

{{-- DROPDOWN --}}

{!! Form::label('template_id', 'Template') !!}

{!! Form::select(
 'template_id',
 \App\Template::getSelectList('name_template', 'id_template'),
 isset($compaign) ? $compaign->template_id : null,
 ['class' => 'form-control']); !!}

{!! Form::label('bunch_id', 'bunch') !!}
{!! Form::select(
 'bunch_id',
 \App\Bunch::getSelectList('name_bunch', 'id_bunch'),
 isset($compaign) ? $compaign->bunch_id : null,
 ['class' => 'form-control']); !!}
    
    {!!Form::label('description_compaign', 'Description') !!}
    {!!Form::text('description_compaign', null, ['class' => 'form-control']) !!}

</div>

