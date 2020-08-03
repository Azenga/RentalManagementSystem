<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rental App') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="row justify-content-center align-items-center"  style="min-height: 100vh">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-light">Verify Token</div>
                <div class="card-body">
                    <form action="/2fa/verify" method="post" class="pt-5">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="otp_token" id="otp_token" class="form-control"
                                placeholder="Verification Token" required autofocus />
                        </div>

                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-block btn-primary">
                                <span>Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
