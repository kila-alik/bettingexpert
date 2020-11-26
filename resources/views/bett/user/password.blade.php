@extends(env('THEME').'.admin.admin')
@section('content')

<form method="POST" action="{{route('ChangePass', ['id' => $user->id])}}" enctype="multipart/form-data">
   {{ csrf_field() }}

   <div class="form-group row">
       <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

       <div class="col-md-6 align-self-center">
         <strong>{{$user->name}}</strong>
       </div>
   </div>

   <div class="form-group row">
       <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

       <div class="col-md-6 align-self-center">
           <strong>{{$user->email}}</strong>
       </div>
   </div>

   <div class="form-group row">
       <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

       <div class="col-md-6">
           <input id="password" type="password" class="form-control {{ session('password_old') ? 'is-invalid' : '' }}" name="password_old" required autocomplete="new-password">
            @if (session('password_old'))
              <div class="alert alert-danger">
                <strong>{{ session('password_old') }}</strong>
              </div>
              @endif
              @if (session('password_old'))
              @php
              unset($password_old);
              @endphp
              @endif
             @error('password')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
       </div>
   </div>

   <div class="form-group row">
       <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password (min 8 symbol)') }}</label>

       <div class="col-md-6">
           <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

           @error('password')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
       </div>
   </div>

   <div class="form-group row">
       <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

       <div class="col-md-6">
           <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
       </div>
   </div>

   <div class="form-group row mb-0">
       <div class="col-md-6 offset-md-4">
           <button type="submit" class="btn btn-primary">
               {{ __('Change Password') }}
           </button>
       </div>
   </div>

</form>
@endsection
