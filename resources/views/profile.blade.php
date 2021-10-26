@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                  ชื่อ {{$profile->first_name}} นามสกุล {{$profile->last_name}}
                  <br>
                  ชื่อเล่น {{$profile->nick_name}} 
                  <br>
                  วันเกิด {{date('d-m-Y',strtotime($profile->birthday))}}
                  <br>
                  เบอร์ {{$profile->phone}}
                  <br>

                  <button class="btn btn-primary" onclick="editForm()">Edit</button>
                </div>

                
            </div>
        </div>

        <script>
            function editForm(){

                document.getElementById('form').style.display = "block";


            }
        </script>
        


        <div class="col-md-8" style="padding-top:2em;display:none" id="form">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">
                <form method="POST" action="updateProfile" id="profile">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">first name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $profile->first_name }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">last name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{$profile->last_name}}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nick_name" class="col-md-4 col-form-label text-md-right">nick name</label>

                            <div class="col-md-6">
                                <input id="nick_name" type="text" class="form-control{{ $errors->has('nick_name') ? ' is-invalid' : '' }}" name="nick_name" value="{{$profile->nick_name}}" required autofocus>

                                @if ($errors->has('nick_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nick_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birth_day" class="col-md-4 col-form-label text-md-right">birth day</label>

                            <div class="col-md-6">
                                <input id="birth_day" type="date" class="form-control{{ $errors->has('birth_day') ? ' is-invalid' : '' }}" name="birth_day" value="{{$profile->birthday}}" required autofocus>

                                @if ($errors->has('birth_day'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birth_day') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{$profile->phone}}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                       


                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" onclick ="conFirmForm()">
                                    save
                                </button>

                                <button type="button" class="btn btn-default" onclick ="closeForm()">
                                    cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <script>
                    function closeForm(){

                        document.getElementById('form').style.display = "none";


                    }

                    function conFirmForm(){

                        Swal.fire({
                        title: 'คุณต้องการบันทึก?',
                        text: "หากคุณกด ยืนยัน ระบบจะบันทึกการแก้ไขทันที!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ยื่นยัน',
                        cancelButtonText: 'ยกเลิก'
                        }).then((result) => {
                        if (result.isConfirmed) {

                        //     Swal.fire({
                        // title: 'คุณต้องการบันทึก?',
                        // text: "หากคุณกด ยืนยัน ระบบจะบันทึกการแก้ไขทันที!",
                        // icon: 'success'
                        //     })

                            // Swal.fire(
                            // 'ทำการบันทึก!',
                            // 'success'
                            // )

                            document.getElementById('profile').submit();
                        }
                        })

                    }
                </script>

                
            </div>
        </div>
    </div>
</div>
@endsection
