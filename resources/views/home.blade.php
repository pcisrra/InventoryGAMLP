@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido
                    <br>
                    <iframe src="https://onedrive.live.com/embed?cid=826601CFF6668224&resid=826601CFF6668224%217931&authkey=AAfMo0P1_4TFquw&em=2" width="100%" height="800" frameborder="0" scrolling="no">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection