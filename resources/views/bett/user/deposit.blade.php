@extends(env('THEME').'.admin.admin')
@section('content')

<form class="form-group" method="POST" action="#" enctype="multipart/form-data">
   {{ csrf_field() }}

   <div class="form-group row">
       <label for="name" class="col-md-5 col-form-label text-md-right">{{ __('Name') }}</label>

       <div class="col-md-5 align-self-center">
         <strong>{{$user->name}}</strong>
       </div>
   </div>

   <div class="form-group row">
       <label for="email" class="col-md-5 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

       <div class="col-md-5 align-self-center">
           <strong>{{$user->email}}</strong>
       </div>
   </div>

   <div class="form-group row">
       <label for="deposit" class="col-md-5 col-form-label text-md-right">{{ __('Deposit') }}</label>

       <div class="col-md-5 align-self-center">
           <strong>{{$user->deposit}}</strong>
       </div>
   </div>

   <div class="form-group row align-items-center">
       {!! Form::label('sistem', 'VISA', ['class' => 'col-md-5 col-form-label text-md-right', 'for' => 'visa3']) !!}
       <div class="col-md-5">
         {!! Form::radio('sistem', 'visa_value', ['class' => 'form-control', 'id' => 'visa3', 'checked' => true]) !!}
       </div>
   </div>


   <div class="form-group row align-items-center">
       {!! Form::label('sistem', 'ELECTRON', ['class' => 'col-md-5 col-form-label text-md-right']) !!}
       <div class="col-md-5">
         {!! Form::radio('sistem', 'electron_value') !!}
       </div>
   </div>

   <div class="form-group row align-items-center">
       {!! Form::label('sistem', 'WEB-MANEY', ['class' => 'col-md-5 col-form-label text-md-right']) !!}
       <div class="col-md-5">
         {!! Form::radio('sistem', 'web-maney_value') !!}
       </div>
   </div>

   <div class="form-group row align-items-center">
       {!! Form::label('sistem', 'ДРУГОЙ', ['class' => 'col-md-5 col-form-label text-md-right']) !!}
       <div class="col-md-5">
         {!! Form::radio('sistem', 'other_value') !!}
       </div>
   </div>

   <div class="form-group row mb-0">
       <div class="col-md-5 offset-md-5">
           <button type="submit" class="btn btn-primary">
               {{ __('Renew Deposit') }}
           </button>
       </div>
   </div>

</form>
@endsection
