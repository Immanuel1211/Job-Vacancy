@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Data Perusahaan</div>
                <div class="card-body">
                    @if (isset($company))
                        <form method="post" action="{{ URL::to('/companie/company-profile') }}" autocomplete="off">
                            @method('put')
                        @else
                            <form method="post" action="{{ URL::to('/companie/company-profile') }}" autocomplete="off"
                                enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="row">
                        {{-- ini form logo --}}
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Logo Perusahaan</label>
                                <input type="file" id="logo" name="logo"
                                    value=" {{ isset($company) ? $company->logo : old('logo') }}"
                                    placeholder="Masukkan Dengan Class ion Icon"
                                    class="form-control @error('logo')is-invalid @enderror">

                                @error('logo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- ende --}}

                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Nama Perusahaan</label>
                                <input type="text" id="company_name" name="company_name"
                                    value="{{ isset($company) ? $company->company_name : old('company_name') }}"
                                    placeholder="Masukkan Dengan Class ion Icon"
                                    class="form-control @error('company_name')is-invalid @enderror">
                                @error('company_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Email Perusahaan</label>
                                <input type="email" id="email" name="email"
                                    value="{{ isset($company) ? $company->company_name : old('company_name') }}"
                                    placeholder="Masukkan Dengan Class ion Icon"
                                    class="form-control  @error('email')is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Nomer Telepon Perusahaan</label>
                                <input type="text" id="phone" name="phone"
                                    value="{{ isset($company) ? $company->company_name : old('company_name') }}"
                                    placeholder="Masukkan Dengan Class ion Icon"
                                    class="form-control  @error('phone')is-invalid @enderror">
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Alamat Perusahaan</label>
                                <input type="text" id="addres" name="addres"
                                    value="{{ isset($company) ? $company->company_name : old('company_name') }}"
                                    placeholder="Masukkan Dengan Class ion Icon"
                                    class="form-control  @error('addres')is-invalid @enderror">
                                @error('addres')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="name">Profil Singkat Perusahaan</label>
                                <textarea id="deskripsi" name="deskripsi" cols="40" rows="30"
                                    class="form-control  @error('deskripsi')is-invalid @enderror">{{ isset($company) ? $company->company_name : old('company_name') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection