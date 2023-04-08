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
                                            <td style="width: 120px">
                                                {{$calandar['day_string']}} <br>{{$calandar['day']}}
                                                <button onclick='getReportDay("{{$calandar['day']}}")' data-bs-toggle="modal" data-bs-target="#bs-report-modal-sm" class="btn btn-sm btn-outline-dark" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="reporter les inscription sur le chaque {{$calandar['day_string']}}"><i class="icon icon-target"></i></button>

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
                                                            <span data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="left" title="Nom: {{ $calandar_periode_->user->name }} {{ $calandar_periode_->user->lastname }} Email:{{ $calandar_periode_->user->email }} Telephone: {{ $calandar_periode_->user->phone }}"
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
    <div class="modal fade" id="bs-report-modal-sm" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Report de vos inscriptions</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Veuillez confirmer la recopie de vos inscriptions sur chaque <span id="periode_id"></span> du mois</p>
                    <form>
                        {{csrf_field()}}
                        <span id="reportday_id" hidden></span>

                        <div class="mb-3 d-grid text-center">
                            <button class="btn btn-outline-success" type="button" id="confirm_btn_calandar"> Je confime </button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

