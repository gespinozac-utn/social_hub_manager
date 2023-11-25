@extends('components.layout')

@section('content')

    <x-setting heading="Publish new Post!">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="tittle" />
            <x-form.input name="slug" />
            <x-form.input name="thumbail" type="file" />
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />

            <x-form.field>
                <x-form.label name ="category" />
                <select name="category_id" id="category_id">
                    @foreach (App\Models\Category::all() as $category)
                        <option value="{{$category->id}}" 
                            {{ old('category_id') == $category->id ? 'selected' : ''}}
                        >
                            {{ucwords($category->name)}}
                        </option>
                    @endforeach
                </select>
                <x-form.error name="category" /> 
            </x-form.field>
            
            <x-form.button>Publish!</x-form.button>

        </form>
    </x-setting>

@endsection