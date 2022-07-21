@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <!-- news details card-->
            <div class="card mb-4">
                <div class="card-header">News Details</div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-5 col-5">
                                    <strong class="">Title:</strong>
                                </div>
                                <div class="col-md-7 col-7">
                                    {{ $row->title }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-5 col-5">
                                    <strong class="">Content:</strong>
                                </div>
                                <div class="col-md-7 col-7">
                                    {{ $row->content }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-5 col-5">
                                    <strong class="">Authod:</strong>
                                </div>
                                <div class="col-md-7 col-7">
                                    {{ $row->user->name }}
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- Back btn-->
                    <a href="{{ url()->previous() }}" class="btn btn-primary mt-5" type="button">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection