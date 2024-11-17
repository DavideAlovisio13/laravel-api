@extends('layouts.admin')
@section('title', 'Projects')

{{-- @section('content')
    <section id="projects" class="container-fluid">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif
        <div class="d-flex justify-content-between align-items-center py-4">
            <h1 class="text-danger">Projects</h1>
        </div>
        <div class="row">
            <div class="col-sm-8 ">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-danger bg-transparent">Id</th>
                                    <th scope="col" class="text-danger bg-transparent">Name</th>
                                    <th scope="col" class="text-danger bg-transparent">Title</th>
                                    <th scope="col" class="text-danger bg-transparent">Description</th>
                                    <th scope="col" class="text-danger bg-transparent">Create at</th>
                                    <th scope="col" class="text-danger bg-transparent">Type</th>
                                    <th scope="col" class="text-danger bg-transparent">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($projects as $project)
                                    <tr>
                                        <td class="bg-transparent text-white border-bottom-0">{{ $project->id }}</td>
                                        <td class="bg-transparent text-white border-bottom-0">{{ $project->name }}</td>
                                        <td class="bg-transparent text-white border-bottom-0">{{ $project->title }}</td>
                                        <td class="bg-transparent text-white border-bottom-0">{{ $project->description }}
                                        </td>
                                        <td class="bg-transparent text-white border-bottom-0">{{ $project->created_at }}
                                        </td>
                                        <td class="bg-transparent text-white border-bottom-0">{{ $project->type_id }}</td>
                                        <td
                                            class=" bg-transparent text-white d-flex border-bottom-0 flex-column justify-content-center align-items-center">
                                            <a href="{{ route('admin.projects.show', $project->slug) }}"><i
                                                    class="fa-solid text-danger fa-eye"></i></a>
                                            <a href="{{ route('admin.projects.edit', $project->slug) }}"><i
                                                    class="fa-solid text-danger fa-pen"></i></a>
                                            <form action="{{ route('admin.projects.destroy', $project->slug) }}"
                                                method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete-button border-0 bg-transparent"
                                                    data-item-title="{{ $project->title }}">
                                                    <i class="fa-solid text-danger fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $projects->links('vendor.pagination.bootstrap-5') }}
                    </div>
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-danger">Create a new post</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="container text-center d-flex flex-column">
                        <div class="row">
                            <div class="col p-2">
                                <img src="/images/logo.png" class="card-img-top rounded-circle p-1"
                                    style="width: 300px height: 300px" alt="logo-profile">
                            </div>
                            <div class="col align-items-center justify-content-center d-flex">
                                <h2 class="text-white fs-1">{{ Auth::user()->name }}</h2>
                            </div>
                        </div>
                        <div class="row pt-4 fs-1 text-white">
                            <div
                                class="col social_card my-4 d-flex flex-column justify-content-center align-content-center">
                                <a href="https://github.com/DavideAlovisio13"><i
                                        class="fa-brands fa-github fa-2xl text-danger"></i></a>
                                <h4 class="pt-3">GitHub</h4>
                            </div>
                            <div
                                class="col social_card my-4 d-flex flex-column justify-content-center align-content-center">
                                <a href="https://it-it.facebook.com/index.php/"><i
                                        class="fa-brands fa-facebook fa-2xl text-danger"></i></a>
                                <h4 class="pt-3">Facebook</h4>
                            </div>
                            <div
                                class="col social_card my-4 d-flex flex-column justify-content-center align-content-center">
                                <a href="https://www.instagram.com/"><i
                                        class="fa-brands fa-instagram fa-2xl text-danger"></i></a>
                                <h4 class="pt-3">Instagram</h4>
                            </div>
                            <div
                                class="col social_card my-4 d-flex flex-column justify-content-center align-content-center">
                                <a href="https://x.com/x."><i class="fa-brands fa-x-twitter fa-2xl text-danger"></i></a>
                                <h4 class="pt-3">Twitter</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-sm">
                <h2 class="text-danger">Total Revenue</h2>
                <canvas id="polarArea" style="width:300px height: 300px"></canvas>
            </div>
            <div class="col-sm">
                <h2 class="text-danger">Total Expenses</h2>
                <canvas id="doughnut" style="width:300px height: 300px"></canvas>
            </div>
            <div class="col-sm d-flex justify-content-center align-items-center flex-column">
                <h2 class="text-danger">Traffic stats</h2>
                <canvas id="barchart"></canvas>
            </div>
        </div>
    </section>
    @include('partials.modal-delete');
@endsection --}}

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('partials.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Projects table</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Id</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Title</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Description</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Create at</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <h6 class="mb-0 text-sm">{{ $project->id }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $project->name }}</p>
                                                    <p class="text-xs text-secondary mb-0">{{ $project->title }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success">Online</span>
                                                </td>
                                                <td class="align-middle text-center overflow-hidden">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $project->description }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $project->created_at }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('admin.projects.show', $project->slug) }}"><i
                                                            class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('admin.projects.edit', $project->slug) }}"><i
                                                            class="fa-solid fa-pen"></i></a>
                                                    <form action="{{ route('admin.projects.destroy', $project->slug) }}"
                                                        method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="delete-button border-0 bg-transparent"
                                                            data-item-title="{{ $project->title }}">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $projects->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('partials.modal-delete')
@endsection
