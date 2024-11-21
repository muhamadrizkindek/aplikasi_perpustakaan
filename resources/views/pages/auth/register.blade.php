<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="/store/register" method="POST">
                                        @csrf
                                        <!-- Name -->
                                        <div class="form-group">
                                            <label><strong>Nama</strong></label>
                                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" value="{{ old('nama') }}">
                                            @error('nama')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Class -->
                                        <div class="form-group">
                                            <label><strong>Kelas</strong></label>
                                            <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" placeholder="Kelas" value="{{ old('kelas') }}">
                                            @error('kelas')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Jurusan -->
                                        <div class="form-group">
                                            <label><strong>Jurusan</strong></label>
                                            <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" placeholder="Jurusan" value="{{ old('jurusan') }}">
                                            @error('jurusan')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Date of Joining -->
                                        <div class="form-group">
                                            <label><strong>Tanggal Bergabung</strong></label>
                                            <input type="date" name="tanggal_bergabung" class="form-control @error('tanggal_bergabung') is-invalid @enderror" value="{{ old('tanggal_bergabung') }}">
                                            @error('tanggal_bergabung')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="hello@example.com" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Phone Number -->
                                        <div class="form-group">
                                            <label><strong>Nomor Telepon</strong></label>
                                            <input type="text" name="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" placeholder="Nomor Telepon" value="{{ old('nomor_telepon') }}">
                                            @error('nomor_telepon')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Role -->
                                        <div class="form-group">
                                            <label><strong>Role</strong></label>
                                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>user</option>
                                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>
                                            @error('role')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
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

    <!-- Scripts -->
    <script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('assets/js/quixnav-init.js')}}"></script>
</body>

</html>
