@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', ['title' => 'Administrar Profesores', 'icon' => 'unlock-alt'])
@endsection

@section('content')
    <div class="pl-5 pr-5">
        <courses-list
            :labels="{{ json_encode([
                'name' => __("Nombre"),
                'status' => __("Estado"),
                'activate_deactivate' => __("Activar / Desactivar"),
                'approve' => __("Aprobar"),
                'reject' => __("Rechazar")
            ]) }}"
            route="{{ route('admin.teachers_json') }}"
        >
        </teachers-list>
    </div>
@endsection