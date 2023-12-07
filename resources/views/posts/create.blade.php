@extends('components.layout')

@section('content')

    <x-setting heading="Publish new Post!">
        <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf

            <x-form.textarea name="body" />

            <input name="publish_at" id="publish_at" class="form-control" type="datetime-local" value="{{ date(now()) }}" min="{{ date(now()) }}" max="">

            <x-form.field>
                <x-form.label name ="plataform" />
                <select name="plataform_id" id="plataform_id">
                    @foreach (App\Models\Plataform::all() as $plataform)
                        <option value="{{$plataform->id}}" 
                            {{ old('plataform_id') == $plataform->id ? 'selected' : ''}}
                        >
                            {{ucwords($plataform->name)}}
                        </option>
                    @endforeach
                </select>
                <x-form.error name="plataform" /> 
            </x-form.field>
            
            <x-form.button>Post!</x-form.button>

        </form>
    </x-setting>

@endsection