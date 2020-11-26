@extends(env('THEME').'.admin.admin')
@section('content')
@if($user)
    <form method="POST" enctype="multipart/form-data">
       {{ csrf_field() }}
       <div class="form-group row">
         <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Id клиента:') }}</label>
         <div class="col-md-6 align-self-center">
           <strong>{{$user->id}}</strong>
         </div>
       </div>

       <div class="form-group row">
         {!! Form::label('name', 'Имя клиента:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
         <div class="col-md-6">
           {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
         </div>
       </div>

       <div class="form-group row">
         <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email клиента:') }}</label>
         <div class="col-md-6">
           <input type="text" name="email" class="form-control" value="{{$user->email}}">
         </div>
       </div>

       <div class="form-group row">
         {!! Form::label('created_at', 'Дата регистрации клиента:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
         <div class="col-md-6">
           {!! Form::date('created_at',\Carbon\Carbon::parse($user->created_at), ['class' => 'form-control']) !!}
         </div>
       </div>

       <div class="form-group row">
         {!! Form::label('updated_at', 'Дата последних изменений клиента:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
         <div class="col-md-6">
           {!! Form::date('updated_at',\Carbon\Carbon::parse($user->updated_at), ['class' => 'form-control']) !!}
         </div>
       </div>

       <div class="form-group row">
         {!! Form::label('is_admin', 'Администратор:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
         <div class="col-md-6">
           <input type="text" name="is_admin" class="form-control" value="{{$user->is_admin}}">
         </div>
       </div>

       <div class="form-group row">
         {!! Form::label('deposit', 'Депозит:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
         <div class="col-md-6">
           {!! Form::text('deposit', $user->deposit, ['class' => 'form-control']) !!}
         </div>
       </div>

       <div class="form-group row mb-0">
           <div class="col-md-6 offset-md-4">
               <button type="submit" class="btn btn-primary">
                   {{ __('Изменить') }}
               </button>
           </div>
       </div>

    </form>
@endif

<br />
<div class="form-group row mb-0">
  <div class="col-md-6 offset-md-4">
    <a href={{route('UsersList')}}><<< Вернуться к списку Клиентов !!!</a>
  </div>
</div>
@endsection
