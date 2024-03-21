@extends('layouts.app')

@section('content')
<div class="dashboard">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Settings') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('settings.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', auth()->user()->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', auth()->user()->email) }}" required autocomplete="email" disabled>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-10">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-2">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Company -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Company Information</div>
                <div class="card-body">
                    <form>
                        <div class="form-group row mb-3">
                            <label for="companyLogo" class="col-md-2 col-form-label text-md-right">Logo Perusahaan</label>
                            <div class="col-md-10">
                                <img src="#" id="previewLogo" class="img-fluid mb-2" alt="Preview Logo" style="display: none;">
                                <input type="file" class="form-control" id="companyLogo" onchange="previewImage(this)">
                            </div>
                        </div>
                        <div class="col-md-2 offset-md-2 form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="showLogo">
                            <div class="col-md-10">
                                <label class="form-check-label" for="showLogo">Tampilkan Logo di Laporan</label>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="stempelLogo" class="col-md-2 col-form-label text-md-right">Stempel Perusahaan</label>
                            <div class="col-md-10">
                                <img src="#" id="stempelLogo" class="img-fluid mb-2" alt="Preview Logo Stample" style="display: none;">
                                <input type="file" class="form-control" id="stempelLogo" onchange="previewImage(this)">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="billingAddress" class="col-md-2 col-form-label text-md-right">Alamat Penagihan</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="billingAddress" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="shippingAddress" class="col-md-2 col-form-label text-md-right">Alamat Pengiriman</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="shippingAddress" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="npwp" class="col-md-2 col-form-label text-md-right">NPWP</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="npwp">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="website" class="col-md-2 col-form-label text-md-right">Website</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="website">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-2">
                                <button class="btn btn-secondary me-md-2" type="button">Cancel</button>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewLogo').attr('src', e.target.result).show();
            }
            reader.onload = function(e) {
                $('#stempelLogo').attr('src', e.target.result).show();
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>
@endsection
