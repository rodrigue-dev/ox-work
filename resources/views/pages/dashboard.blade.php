@extends('base')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <a type="button" class="btn btn-primary" href="{{route('dashboard',['month'=>$moments['previous']['month'],'year'=>$moments['previous']['year']])}}"><i class="icon-arrow-left"></i>
                        </a>
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-dark btn-lg" >{{$current_month}} - {{$year}}
                        </button>
                    </div>
                    <div class="col-md-4 align-items-lg-end">
                        <a type="button" class="float-end btn btn-primary" href="{{route('dashboard',['month'=>$moments['next']['month'],'year'=>$moments['next']['year']])}}"><i class="icon-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">

                            <div class=" table-responsive">
                                <table class=" table table-bordered" id="tooltip-container">
                                    <thead>

                                    <tr>
                                        <th></th>
                                        @foreach($periodes as $periode)
                                            <th>{{$periode->heure_debut}} {{$periode->heure_fin}}</th>@endforeach
                                    </tr>

                                    </thead>
                                    <tbody>
                                    @foreach($calandars as $calandar)
                                        <tr>
                                            <td style="width: 120px">{{$calandar['day_string']}} <br>{{$calandar['day']}}
                                            </td>
                                            @foreach($calandar['calandar_periodes'] as $calandar_periode)
                                                @if($calandar_periode['is_conge'])
                                                    <td class="" style="background-color: #afafb5;opacity: 0.6" title="Congé ou fermeture">
                                                        <a class="btn disabled" style="display: block;width: 100%;height: 100%">
                                                        </a>
                                                    </td>
                                                @else
                                                <td>
                                                    <div class="row" style="display: block;width: 100%;height: 100%">
                                                        <div class="col-md-6" >
                                                        @foreach($calandar_periode['list_calendars'] as $calandar_periode_)
                                                            <a href="#">
                                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ $calandar_periode_->user->name }} {{ $calandar_periode_->user->lastname }}"
                                                                class="badge badge-outline-danger">{{ $calandar_periode_->user->name }}</span>
                                                                <br>
                                                            </a>
                                                        @endforeach
                                                        </div>

                                                        <div class="col-md-4" >
                                                            <div class="btn-group">
                                                            <a  data-bs-container="#tooltip-container" href="{{route('savecalandar',['month'=>$current_month_int,'year'=>$year,'periode'=>$calandar_periode['periode_id'],'date_reservation'=>$calandar['day']])}}"
                                                                     data-bs-toggle="tooltip" data-bs-placement="top"
                                                                     title="Inscription" class="btn btn-sm"><i class="icon icon-plus"></i>
                                                            </a>
                                                            <a  data-bs-container="#tooltip-container" href="{{route('deletecalandar',['month'=>$current_month_int,'year'=>$year,'periode'=>$calandar_periode['periode_id'],'date_reservation'=>$calandar['day']])}}"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Desinscription" class="btn btn-sm"><i class="icon icon-trash"></i>
                                                            </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endif

                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

