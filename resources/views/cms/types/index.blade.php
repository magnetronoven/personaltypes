@extends('layouts.app')

@section('content')
<div class="container">
    @include('inc.breadcrumb', ['location' => "CMS/Categorieën/Thema's/Types"])
    <h3>Alle types</h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Keywords</th>
                    <th scope="col">Gekoppelde MBTI code</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $type)
                    <tr>
                        <td scope="col">{{$type->keywords}}</td>
                        <td scope="col">{{$type->connected_mbti}}</td>
                        <td scope="col"><a href="{{ route('types.edit', ['type' => $type->id]) }}">Wijzig</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection