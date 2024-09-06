<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Country</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="m-0">Edit Country</h2>
                            </div>
                            <div class="col-6 text-end">
                                <a href="{{ route('countries') }}" class="btn btn-outline-primary">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @session('success')
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ $value }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endsession

                        @session('failure')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $value }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endsession
                        {{-- @dump($errors) --}}
                        {{-- @dump($continents) --}}
                        {{-- @dump($country) --}}
                        <form action="{{ route('country.edit', $country) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" placeholder="Country name!"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ? old('name') : $country->name }}">

                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="capital" class="form-label">Capital</label>
                                <input type="text" id="capital" name="capital" placeholder="Country capital!"
                                    class="form-control @error('capital') is-invalid @enderror"
                                    value="{{ old('capital') ?? $country->capital }}">

                                @error('capital')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="currency" class="form-label">Currency</label>
                                <input type="text" id="currency" name="currency" placeholder="Country currency!"
                                    class="form-control @error('currency') is-invalid @enderror"
                                    value="{{ old('currency') ?? $country->currency }}">

                                @error('currency')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="continent" class="form-label">Continent</label>
                                <select id="continent" name="continent"
                                    class="form-select @error('continent') is-invalid @enderror">
                                    <option value="">Select a continent!</option>
                                    @foreach ($continents as $continent)
                                        <option value="{{ $continent }}" @selected(old('continent') ? $continent == old('continent') : $continent == $country->continent)>
                                            {{ $continent }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('continent')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <input type="submit" name="submit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
