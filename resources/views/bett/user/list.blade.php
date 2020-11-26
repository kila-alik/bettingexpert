@extends(env('THEME').'.admin.admin')
@section('content')

<div>
   <h3 align="center">Список Клиентов</h3>
    <p align="center">
      <a class="btn btn-secondary" href='#'}} role="button">Добавить Клиента</a>
    </p>
    @if(session('password_changed'))
    <div class="row">
      <div class="col-md-6 offset-md-3 alert alert-success">
        <strong>{{ session('password_changed') }}</strong>
      </div>
    </div>
    @endif
    @if (session('password_changed'))
      @php
      unset($password_changed);
      @endphp
    @endif

    <p align="center">
       (КНОПКА ВЫШЕ если надо, и кто это может добавлять, и не преследует это налоговая)
    </p>
     <table width="600" border="1" align="center">
         <tbody align="center">
           <tr bgcolor="#c0c0c0">
             <th>№ записи</th>
             <th>Id клиента</th>
             <th>Платный статус</th>
             <th>Login</th>
             <th>E-mail</th>
             <th>Сбросить пароль в 12345678</th>
             <th><font size="1">Дата регистрации</font></th>
             <th><font size="1">Дата крайнего входа</font></th>
             <th>Администратор</th>
             <th>Депозит</th>
             <th>Посмотреть подробно</th>
             <th>Изменить</th>
             <th>Удалить</th>
           </tr>
            @if($users)
               @foreach($users as $key => $user)
               <!-- @ php dd() @ endphp -->
                            <tr>
                               <td>{{$key+1}}</td>
                               <td>{{$user['id']}}</td>
                               <td>{{ $user->deposit>10 ? '1' : '0' }}</td>
                               <td>{{$user->name}}</td>
                               <td>{{$user->email}}</td>
                               <td>
                                 <form action={{route('UserPass', ['id' => $user->id])}} method="POST">
                                   {{ csrf_field() }}
                                   <input type="hidden" name="pass" value="{{$user->id}}">
                                   <input type="submit" value="сбросить" />
                                 </form>
                               </td>
                               <td><font size="2">{!! $user->created_at ? \Carbon\Carbon::parse($user->created_at)->format('d.m.Y H:i') : ''!!}</font></td>
                               <td><font size="2">{!! $user->updated_at ? \Carbon\Carbon::parse($user->updated_at)->format('d.m.Y H:i') : ''!!}</font></td>
                               <td>{{$user->is_admin}}</td>
                               <td>{{$user->deposit}}</td>
                               <td><a href={{route('UserDetail', ['id' => $user->id])}}>Подробно</a></td>
                               <td><a href={{route('UserEdit', ['id' => $user->id])}}><i><b>Изменить</b></i></a></td>
                               <td>
                                 <form action={{route('UserDel', ['id' => $user->id])}} method="POST">
                                         {{ csrf_field() }}
                                         <input type="submit" value="удалить" />
                                 </form>
                               </td>
                             </tr>
               @endforeach
            @endif
         </tbody>
    </table>

</div>
@endsection
