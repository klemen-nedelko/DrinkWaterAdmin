@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Input water amount') }}</div>

                <div class="card-body">
                    <div>
                        <a class="btn btn-primary" href="{{route('/home')}}">Back to Home</a>
                    </div>
                    Add water amount:
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
