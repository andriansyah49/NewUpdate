{!! Form::model($model,['url'=>$form_url,'method'=>'delete','class'=>'form-inline js-confirm','data-confirm'=>$confirm_message]) !!}
	{!! Form::button('<i class="fa fa-trash"></i> Hapus',['class'=>'btn btn-xs btn-danger','type'=>'submit']) !!}
{!! Form::close() !!}