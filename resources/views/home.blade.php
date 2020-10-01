@extends('layouts.app')

@section('content')
    <div id="home_content">
        <div class="imageUpload">
            <form action="{{ route('storeImage') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="newimage">
                <input type="submit" value="Save">
            </form>
        </div>

        <div class="newImages">
            <div class="row justify-content-center">
                @foreach ($images as $image)
                    <div class="col-md-2">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ $image->url }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $image->name }}
                                </h5>
                                <p class="card-text">
                                    {{ $image->information }}
                                </p>
                                <a href="{{ route('info', $image->id) }}" class="btn btn-primary">
                                    もっと見る
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
