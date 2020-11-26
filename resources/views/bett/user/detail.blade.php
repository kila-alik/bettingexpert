@extends(env('THEME').'.admin.admin')
@section('content')
  @if($user)

    <div class="form-group row">
      <label for="id" class="col-md-5 col-form-label text-md-right">{{ __('Id клиента:') }}</label>
      <div class="col-md-5 align-self-center">
        <strong>{{$user->id}}</strong>
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('name', 'Имя клиента:', ['class' => 'col-md-5 col-form-label text-md-right']) !!}
      <div class="col-md-5 align-self-center">
        <strong>{{$user->name}}</strong>
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('email', 'Имя клиента:', ['class' => 'col-md-5 col-form-label text-md-right']) !!}
      <div class="col-md-5 align-self-center">
        <strong>{{$user->email}}</strong>
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('created_at', 'Дата регистрации клиента:', ['class' => 'col-md-5 col-form-label text-md-right']) !!}
      <div class="col-md-5 align-self-center">
        <strong>{!! \Carbon\Carbon::parse($user->created_at)->format('d F Y \a\t H:i') !!}</strong>
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('updated_at', 'Дата крайнего входа клиента:', ['class' => 'col-md-5 col-form-label text-md-right']) !!}
      <div class="col-md-5 align-self-center">
        <strong>{!! \Carbon\Carbon::parse($user->updated_at)->format('d F Y \a\t H:i') !!}</strong>
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('is_admin', 'Администратор (1 - администратор):', ['class' => 'col-md-5 col-form-label text-md-right']) !!}
      <div class="col-md-5 align-self-center">
        <strong>{{$user->is_admin}}</strong>
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('status', 'Платный статус (1 если у клиента больше 10 рублей):', ['class' => 'col-md-5 col-form-label text-md-right']) !!}
      <div class="col-md-5 align-self-center">
        <strong>{{$user->deposit>10 ? '1' : '0'}}</strong>
      </div>
    </div>

    <div class="form-group row">
      {!! Form::label('deposit', 'Депозит:', ['class' => 'col-md-5 col-form-label text-md-right']) !!}
      <div class="col-md-5 align-self-center">
        <strong>{{$user->deposit}}</strong>
      </div>
    </div>

    <form action={{route('UserEdit', ['id' => $user->id])}} method="get" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Изменить') }}
                </button>
            </div>
        </div>
    </form>

    <br />
    <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-4">
        <a href={{route('UsersList')}}><<< Вернуться к списку Клиентов !!!</a>
      </div>
    </div>
  @endif

@endsection
