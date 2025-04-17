<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('messages.create_offer') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <!-- Navbar with language switcher -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">{{ __('message.navbar_title') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="nav-item">
                            <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}"
                               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <h1>{{ __('message.create_offer') }}</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('offers.store') }}">
        @csrf

        <div class="form-group">
            <label>{{ __('message.offer_name') }}</label>
            <input type="text" class="form-control" name="name_en" value="{{ old('name') }}">
            @error('name_en')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>{{ __('message.offer_name') }}</label>
            <input type="text" class="form-control" name="name_ar" value="{{ old('name') }}">
            @error('name_ar')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>{{ __('message.offer_price') }}</label>
            <input type="text" class="form-control" name="price" value="{{ old('price') }}">
            @error('price')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>{{ __('message.offer_details') }}</label>
            <input type="text" class="form-control" name="details_ar" value="{{ old('details') }}">
            @error('details_ar')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>{{ __('message.offer_details') }}</label>
            <input type="text" class="form-control" name="details_en" value="{{ old('details') }}">
            @error('details_en')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ __('message.submit') }}</button>
    </form>

    <!-- Bootstrap JS (for navbar toggle) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
