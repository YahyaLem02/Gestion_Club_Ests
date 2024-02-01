@extends('layout')

@section('content')
    @include('header')
    <style>
        /* Styles existants */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .custom-table th,
        .custom-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        .custom-table th {
            background-color: #f2f2f2;
        }

        .custom-table td.etat-en-cours {
            background-color: #f2f2f2;
        }

        .custom-table td.etat-traite button {
            background-color: #5cb85c;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        /* Ajout de styles pour la table des administrateurs */
        .table-container {
            margin-top: 30px;
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table-container th,
        .table-container td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        .table-container th {
            background-color: #f2f2f2;
        }

        /* Nouveaux styles pour la mise en page */
        .table-container {
            display: flex;
            justify-content: center;
        }

        .table-container table {
            max-width: 80%;
        }
    </style>

    <!-- Votre contenu -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Succès!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Erreur!</strong> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                </div>
                <div class="table-container">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Profil</th>
                                <th>Affectation</th>
                                <th>Suppression</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->isadmin == 1)
                                            Administrateur
                                        @else
                                            Utilisateur
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#updateUserModal{{ $item->id }}">
                                            @if ($item->isadmin)
                                                Retourner à l'utilisateur
                                            @else
                                                Passer à admin
                                            @endif
                                        </button>

                                        <div class="modal" id="updateUserModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirmation de mise à jour</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            @if ($item->isadmin)
                                                                Êtes-vous sûr de vouloir retourner cet utilisateur ?
                                                            @else
                                                                Êtes-vous sûr de vouloir passer cet utilisateur à admin ?
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Annuler</button>
                                                        <form method="POST"
                                                            action="{{ route('admin.update', ['admin' => $item->id]) }}">
                                                            @csrf
                                                            @method('put')
                                                            <button type="submit" class="btn btn-info">
                                                                @if ($item->isadmin)
                                                                    Retourner à l'utilisateur
                                                                @else
                                                                    Passer à admin
                                                                @endif
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteUserModal{{ $item->id }}">
                                            Supprimer
                                        </button>

                                        <div class="modal" id="deleteUserModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Supprimer un utilisateur</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Annuler</button>
                                                        <form action="{{ route('admin.destroy', ['admin' => $item->id]) }}"
                                                            method="post" id="deleteForm{{ $item->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsection
