@extends('layout')

@section('content')
    @include('header')
    <style>
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
    </style>


    <div class="container">
        <div class="row">
            <div class="col-md-12" id="bodyReclamation">

                <div class="mb-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Succès!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erreur!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                </div>
                <!-- Ajout d'un club -->
                <h2>Ajouter un club</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClubModal">
                    Ajouter un club
                </button>

                <!-- Modal d'ajout de club -->
                <div class="modal" id="addClubModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Contenu du modal pour ajouter un club -->
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter un club</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('Club.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nom" name="club_name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="admin" class="col-sm-3 col-form-label">Admin</label>
                                        <div class="col-sm-9">
                                            <select name="admin_id" class="form-select" aria-label="Default select example">
                                                <option selected>Choisir l'admin du club</option>
                                                @foreach ($admins as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="image" class="col-sm-3 col-form-label">Image du club</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tableau pour afficher les clubs -->
                <div class="table-container">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clubs as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#descriptionModal{{ $item->id }}">
                                            Voir la description
                                        </button>

                                        <div class="modal" id="descriptionModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Description du club</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $item->description }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <!-- Bouton pour l'image -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#imageModal{{ $item->id }}">
                                            Voir l'image
                                        </button>

                                        <!-- Modal pour afficher l'image -->
                                        <div class="modal" id="imageModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Image du club</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="\images\club\{{ $item->image }}" alt="Image du club">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#editClubModal{{ $item->id }}">Modifier</button>

                                        <div class="modal" id="editClubModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Contenu du modal pour modifier un club -->
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modifier un club</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('Club.update', ['Club' => $item->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3 row">
                                                                <label for="nom"
                                                                    class="col-sm-3 col-form-label">Nom</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control"
                                                                        id="nom" value="{{ $item->name }}"
                                                                        name="club_name" required>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="description"
                                                                    class="col-sm-3 col-form-label">Description</label>
                                                                <div class="col-sm-9">
                                                                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $item->description }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="admin"
                                                                    class="col-sm-3 col-form-label">Admin</label>
                                                                <div class="col-sm-9">
                                                                    <select name="admin_id" class="form-select"
                                                                        aria-label="Default select example">
                                                                        <option value="{{ $item->admin->id }}" selected>
                                                                            {{ $item->admin->name }}</option>
                                                                        @foreach ($admins as $admin)
                                                                            <option value="{{ $admin->id }}">
                                                                                {{ $admin->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="image"
                                                                    class="col-sm-3 col-form-label">Image</label>
                                                                <div class="col-sm-9">
                                                                    <input type="file" name="image" id="image"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Enregistrer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Bouton de suppression -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteClubModal{{ $item->id }}">
                                            Supprimer
                                        </button>

                                        <div class="modal" id="deleteClubModal{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Supprimer un club</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Êtes-vous sûr de vouloir supprimer ce club ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Annuler</button>
                                                        <form action="{{ route('Club.destroy', ['Club' => $item->id]) }}"
                                                            method="post" id="deleteForm-{{ $item->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger">Supprimer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
