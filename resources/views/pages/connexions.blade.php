@extends('base')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box page-title-box-alt">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Accueil</a></li>
                                    <li class="breadcrumb-item active">Connexions</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Connexions</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-2 fw-bolder">Listes des Connexions</h5>
                                <div class="card-body">

                                    <div class="responsive-table-plugin">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>datecreation</th>
                                                        <th>email</th>
                                                        <th>ip</th>
                                                        <th>status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($connexions as $connexion)
                                                    <tr>
                                                        <td>{{$connexion->id}}</td>
                                                        <td>{{$connexion->datecreation}}</td>
                                                        <td>{{$connexion->email}}</td>
                                                        <td>{{$connexion->ip}}</td>
                                                        <td>{{$connexion->status}}</td>
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
                </div>
            </div>
        </div>
    </div>
@endsection

