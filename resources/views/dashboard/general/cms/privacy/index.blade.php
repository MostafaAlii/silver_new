@extends('layouts.master')
@section('css')
<style>
    .ck-editor__editable_inline {
    min-height: 200px;
}
.acd-des-flex {
    display: flex;
    align-items: center;
    gap: 10px;
}
</style>
@section('title')
{{$title}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{$title}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">Dasboard</a></li>
                <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('layouts.common.partials.messages')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <br><br>
                <!-- Start Content -->
                <form id="mainSettings" action="{{route('privacy.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Start Tabs -->
                    <div class="tab round shadow">
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li class="nav-item">
                                    <a class="nav-link @if(app()->getLocale() == $localeCode) active show @endif" id="{{$localeCode}}-tab" data-toggle="tab" href="#{{$localeCode}}" role="tab" aria-controls="{{$localeCode}}" aria-selected="true">
                                        <i class="fa fa-globe"></i>
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <!-- Start Language Panel -->
                                <div class="tab-pane fade @if(app()->getLocale() == $localeCode) active show @endif" id="{{$localeCode}}" role="tabpanel" aria-labelledby="{{$localeCode}}-tab">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <labe>{{'Note' . ' ' . $properties['native'] }} </labe>
                                            <textarea class="form-control" id="note" name="{{$localeCode}}[note]" rows="3">{{ $privace?->translate($localeCode)?->note }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Language Panel -->
                            @endforeach
                        </div>
                    </div>
                    <hr><br>
                    <!-- End Tabs -->
                    <div class="form-group row">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control image">
                    </div>
                    <div class="form-group row">
                        <img src="{{ $privace?->image_path }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                    <!-- End Submit Form -->
                </form>
                <!-- End Content -->
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@endsection