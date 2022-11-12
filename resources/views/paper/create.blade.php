@extends('../app')
@extends('../breadcrumbs')
@extends('../header')
@extends('../sidebar')
@extends('../footer')

@section('title', 'Submit Paper')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                Add New Paper
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('paper.index') }}">
                    Back
                </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input. <br><br>

            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>

                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('paper.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-sm-12">
                <div class="form-group">
                   <strong> Title </strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong> Content </strong>
                    <input type="text" name="content" class="form-control" placeholder="Write your text here">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong> Paper Owner </strong>
                    <input type="text" name="owner" class="form-control" placeholder="Owner">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-sm-12 text-center">
                <button type="submit" class="btn btn-primary"> Submit </button>
            </div>
        </div>
    </form>
@endsection
