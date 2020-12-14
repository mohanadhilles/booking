@extends('eventmie::layouts.app')

@section('title')
    @lang('eventmie-pro::em.profile')
@endsection

@section('content')

<main>
    <div class="lgx-post-wrapper">
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                    
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('eventmie.updateAuthUser')}}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group row">
                                        <label class="col-md-3">@lang('eventmie-pro::em.name')</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="name" type="text" value="{{$user->name}}">
                                            
                                            @if ($errors->has('name'))
                                                <div class="error">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">@lang('eventmie-pro::em.email')</label>
                                        <div class="col-md-9">
                                            <input class="form-control"  name="email" type="email" value="{{$user->email}}">
                                            @if ($errors->has('email'))
                                                <div class="error">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    
                                    <div class="form-group row">
                                        <label class="col-md-3">@lang('eventmie-pro::em.address')</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="address" type="text"  value="{{$user->address}}" >
                                            @if ($errors->has('address'))
                                                <div class="error">{{ $errors->first('address') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3">@lang('eventmie-pro::em.phone')</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="phone" type="text"  value="{{$user->phone}}">
                                            @if ($errors->has('phone'))
                                                <div class="error">{{ $errors->first('phone') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">@lang('eventmie-pro::em.gender')</label>
                                        <div class="col-md-9">
                                            <input  name="gender" type="radio" value="1" @if($user->gender == 1) checked @endif> 
                                            @lang('eventmie-pro::em.male')
                                            @if ($errors->has('gender'))
                                                <div class="error">{{ $errors->first('gender') }}</div>
                                            @endif
                                            <br/>
                                         
                                            <input  name="gender" type="radio" value="0" @if($user->gender == 0) checked @endif>
                                            @lang('eventmie-pro::em.female')
                                            @if ($errors->has('gender'))
                                                <div class="error">{{ $errors->first('gender') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">@lang('eventmie-pro::em.age')</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="age" type="number"  value="{{$user->age}}">
                                            @if ($errors->has('age'))
                                                <div class="error">{{ $errors->first('age') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3">@lang('eventmie-pro::em.linkedin')</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="linkedin" type="text"  value="{{$user->linkedin}}">
                                            @if ($errors->has('linkedin'))
                                                <div class="error">{{ $errors->first('linkedin') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3">@lang('eventmie-pro::em.cities')</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="cities" type="text">
                                                <option value="">@lang('eventmie-pro::em.choose_cities')</option>
                                                @foreach($cities as $key => $value)
                                            <option value={{$key}} @if(isset($user->cities) && $user->cities == $key) selected @endif>{{$value}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('cities'))
                                                <div class="error">{{ $errors->first('cities') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3">@lang('eventmie-pro::em.company')</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="company" type="text"  value="{{$user->company}}">
                                            @if ($errors->has('company'))
                                                <div class="error">{{ $errors->first('company') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">@lang('eventmie-pro::em.preferred')</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="preferred" type="date"  value="{{$user->preferred}}">
                                            @if ($errors->has('preferred'))
                                                <div class="error">{{ $errors->first('preferred') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-9">@lang('eventmie-pro::em.question_1')</label>
                                        <div class="col-md-3">
                                            <input  name="answer_1" type="radio" value="1" @if($user->answer_1 == 1) checked @endif > 
                                            @lang('eventmie-pro::em.yes')
                                            @if ($errors->has('answer_1'))
                                                <div class="error">{{ $errors->first('answer_1') }}</div>
                                            @endif
                                            <br/>
                                         
                                            <input  name="answer_1" type="radio" value="0" @if($user->answer_1 == 0) checked @endif>
                                            @lang('eventmie-pro::em.no')
                                            @if ($errors->has('answer_1'))
                                                <div class="error">{{ $errors->first('answer_1') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-9">@lang('eventmie-pro::em.question_2')</label>
                                        <div class="col-md-3">
                                            <input  name="answer_2" type="radio" value="1" @if($user->answer_2 == 1) checked @endif> 
                                            @lang('eventmie-pro::em.yes')
                                            @if ($errors->has('answer_2'))
                                                <div class="error">{{ $errors->first('answer_2') }}</div>
                                            @endif
                                            <br/>
                                         
                                            <input  name="answer_2" type="radio" value="0" @if($user->answer_2 == 0) checked @endif>
                                            @lang('eventmie-pro::em.no')
                                            @if ($errors->has('answer_2'))
                                                <div class="error">{{ $errors->first('answer_2') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <hr>
                                    <h4>@lang('eventmie-pro::em.update_password') </h4>
                                    <hr>

                                    <div class="form-group row">
                                        <label class="col-md-3">@lang('eventmie-pro::em.current_password')</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="current" type="password" >
                                            @if ($errors->has('current'))
                                                <div class="error">{{ $errors->first('current') }}</div>
                                            @endif
                                        
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3">@lang('eventmie-pro::em.new') @lang('eventmie-pro::em.password')</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="password" type="password" >
                                            @if ($errors->has('password'))
                                                <div class="error">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3">@lang('eventmie-pro::em.confirm_password')</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="password_confirmation" type="password" >
                                            @if ($errors->has('password_confirmation'))
                                                <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- only for organiser and admin --}}
                                    @if(!Auth::user()->hasRole('customer'))

                                        <hr>
                                            <h4>@lang('eventmie-pro::em.update_bank_details')</h4>
                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-md-3">@lang('eventmie-pro::em.bank_name')</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="bank_name" type="text"  value="{{$user->bank_name}}">
                                                @if ($errors->has('bank_name'))
                                                    <div class="error">{{ $errors->first('bank_name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3">@lang('eventmie-pro::em.bank_code')</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="bank_code" type=text"  value="{{$user->bank_code}}">
                                                @if ($errors->has('bank_code'))
                                                    <div class="error">{{ $errors->first('bank_code') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3">@lang('eventmie-pro::em.bank_branch_name')</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="bank_branch_name" type="text" value="{{$user->bank_branch_name}}">
                                                @if ($errors->has('bank_branch_name'))
                                                    <div class="error">{{ $errors->first('bank_branch_name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3">@lang('eventmie-pro::em.bank_branch_code')</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="bank_branch_code" type="text" value="{{$user->bank_branch_code}}">
                                                @if ($errors->has('bank_branch_code'))
                                                    <div class="error">{{ $errors->first('bank_branch_code') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3">@lang('eventmie-pro::em.bank_account_number')</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="bank_account_number" type="text" value="{{$user->bank_account_number}}">
                                                @if ($errors->has('bank_account_number'))
                                                    <div class="error">{{ $errors->first('bank_account_number') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3">@lang('eventmie-pro::em.bank_account_name')</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="bank_account_name" type="text" value="{{$user->bank_account_name}}">
                                                @if ($errors->has('bank_account_name'))
                                                    <div class="error">{{ $errors->first('bank_account_name') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3">@lang('eventmie-pro::em.bank_account_phone')</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="bank_account_phone" type="text" value="{{$user->bank_account_phone}}">
                                                @if ($errors->has('bank_account_phone'))
                                                    <div class="error">{{ $errors->first('bank_account_phone') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        @yield('eventmie-profile-profile')

                                    @endif
                                    
                                    <div class="form-group row">
                                        <div class="col-md-9 offset-md-3">
                                            <button class="lgx-btn" type="submit"><i class="fas fa-sd-card"></i> @lang('eventmie-pro::em.save_profile')</button>
                                        </div>
                                    </div>
                                </form>

                                <hr>
                                {{-- if logged in user is customer and multi-vendor mode is enabled --}}
                                @if(Auth::user()->hasRole('customer'))
                                @if(setting('multi-vendor.multi_vendor')) 
                                <div class="form-group row">
                                    <label class="col-md-3">@lang('eventmie-pro::em.want_to_create_host')</label>
                                    <div class="col-md-9">
                                        <button type="button" class="lgx-btn lgx-btn-black lgx-btn-sm" data-toggle="modal" data-target="#myModal"><i class="fas fa-person-booth"></i> @lang('eventmie-pro::em.become_organiser')</button>
                                    </div>
                                </div>
                                @endif
                                @endif
                                
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">@lang('eventmie-pro::em.become_organiser')</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-info">
                                                    <h4>@lang('eventmie-pro::em.info')</h4>
                                                    <ul>
                                                        <li>@lang('eventmie-pro::em.organiser_note_1')</li>
                                                        <li>@lang('eventmie-pro::em.organiser_note_2')</li>
                                                        <li>@lang('eventmie-pro::em.organiser_note_3')</li>
                                                        <li>@lang('eventmie-pro::em.organiser_note_4')</li>
                                                    </ul>
                                                </div>
                                                <form class="form-horizontal" action="{{ route('eventmie.updateAuthUserRole')}}" method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="role_id" value="3">
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-3">@lang('eventmie-pro::em.organization')</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" name="organisation" type="text" placeholder="@lang('eventmie-pro::em.brand_identity')">
                                                        
                                                            @if ($errors->has('organisation'))
                                                                <div class="error">{{ $errors->first('organisation') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <div class="col-md-12 text-right">
                                                            <button type="submit" class="lgx-btn"><i class="fas fa-sd-card"></i> @lang('eventmie-pro::em.submit')</button>
                                                        </div>
                                                    </div>

                                                </form>    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

@section('javascript')
<script type="text/javascript" src="{{ eventmie_asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ eventmie_asset('js/bootstrap.min.js') }}"></script>
@stop