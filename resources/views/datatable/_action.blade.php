{!! Form::model($model,['url'=>$form_url,'method'=>'delete','class'=>'form-inline js-confirm','data-confirm'=>$confirm_message]) !!}
	<a href="{{$edit_url}}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Ubah</a>
	{!! Form::button('<i class="fa fa-trash"></i> Hapus',['class'=>'btn btn-xs btn-danger','type'=>'submit']) !!}
{!! Form::close() !!}