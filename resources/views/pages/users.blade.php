@extends('base')

@section('content')
    <div class="content-page">
        <div class="content">
        @include("_partials.errors-and-messages")
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box page-title-box-alt">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Accueil</a></li>
                                    <li class="breadcrumb-item active">Utilisateurs</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Utilisateurs</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-2 fw-bolder">Listes des utilisateurs</h5>

                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-2">
                                            <button class="float-end btn btn-danger" id="send_mail">Envoyer les mails</button>

                                        </div>
                                     </div>
                                    <div class="responsive-table-plugin">
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="table_user" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="selectAll"></th>
                                                        <th>#</th>
                                                        <th>Nom</th>
                                                        <th>Prenom</th>
                                                        <th>phone</th>
                                                        <th>adresse</th>
                                                        <th>adressepostal</th>
                                                        <th>commune</th>
                                                        <th>email</th>
                                                        <th>Role</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                               {{--     @foreach($users as $user)
                                                    <tr>
                                                        <td>{{$user->id}}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->lastname}}</td>
                                                        <td>{{$user->phone}}</td>
                                                        <td>{{$user->adresse}}</td>
                                                        <td>{{$user->adressepostal}}</td>
                                                        <td>{{$user->commune}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>{{$user->role}}</td>
                                                    </tr>
                                                    @endforeach--}}
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

