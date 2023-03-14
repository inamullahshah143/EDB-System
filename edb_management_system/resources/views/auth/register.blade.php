@extends('layouts.app')

@section('content')
    <div class="container-fluid p-5">
        <div class="row align-items-lg-center justify-content-lg-center" style="height:100vh">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center">
                            <a href="#">
                                <img src="{{ URL::to('assets/images/logo.png') }}" style="height:150px;" alt="">
                            </a>
                        </div>
                        <h4 class="text-center m-2 p-2">Register to your OEM account</h4>
                        <form action="{{ route('manufacturer_registration.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col">
                                    <label for=" name">Username <span class="text-danger">*</span></label>
                                    <input type="text" v-model="form.name" required class="form-control" id="name"
                                        name="name" placeholder="Manufacturer">
                                </div>
                                <div class="form-group col">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="text" v-model="form.email" v-validate="'required|email'"
                                        class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group col">
                                    <label for="tel">Phone No.
                                        <span class="text-danger">*</span></label>
                                    <input type="text" v-model="form.tel" required class="form-control" id="tel"
                                        name="tel" placeholder="+92-3##-#######">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label for="secp_registration_no">SECP Registration No. <span
                                            class="text-danger">*</span></label>
                                    <input type="text" v-model="form.secp_registration_no" required class="form-control"
                                        id="secp_registration_no" name="secp_registration_no" placeholder="##########">
                                </div>
                                <div class="form-group col">
                                    <label for="ntn">NTN No. <span class="text-danger">*</span></label>
                                    <input type="text" v-model="form.ntn" required class="form-control" id="ntn"
                                        name="ntn" placeholder="##########">
                                </div>
                                <div class="form-group col">
                                    <label for="strn">STRN No. (if any)</label>
                                    <input type="text" v-model="form.strn" class="form-control" id="strn"
                                        name="strn" placeholder="STRN No.">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="product_brand">Brand Name<span class="text-danger">*</span></label>
                                    <input type="text" v-model="form.product_brand" required class="form-control"
                                        id="product_brand" name="product_brand" placeholder="Product Brand">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contact">Contact <span class="text-danger">*</span></label>
                                    <input type="text" v-model="form.contact" required class="form-control"
                                        id="contact" name="contact" placeholder="+92-3##-#######">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="poc">POC <span class="text-danger">*</span></label>
                                    <input type="text" v-model="form.poc" required class="form-control" id="poc"
                                        name="poc" placeholder="POC">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="poc_cell">POC Cell <span class="text-danger">*</span></label>
                                    <input type="text" v-model="form.poc_cell" required class="form-control"
                                        id="poc_cell" name="poc_cell" placeholder="+92-3##-#######">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="registration_address">Registration Address <span
                                            class="text-danger">*</span></label>
                                    <textarea rows="4" type="text" v-model="form.registration_address" required class="form-control"
                                        id="registration_address" name="registration_address" placeholder="Registration Address"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="factory_address">Factory Address<span class="text-danger">*</span></label>
                                    <textarea rows="4" type="text" v-model="form.factory_address" required class="form-control"
                                        id="factory_address" name="factory_address" placeholder="Factory Address"></textarea>
                                </div>
                            </div>

                            <div class="text-center">
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary ">Apply for Registration</button>
                                </div>
                            </div>
                        </form>
                        {{-- <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                    <div class="text-center m-3">
                        <span class="opacity-70 mr-4">
                            Already have an account?
                        </span>
                        <a href="{{ route('login') }}" class="text-muted text-hover-primary font-weight-bold">Sign
                            In!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
