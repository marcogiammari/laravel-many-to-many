@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">Edit Project</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', $project) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">

                <label for="inputName" class="form-label">Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="inputName"
                    value="{{ old('name') ?? $project->name }}">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="mb-3">

                <label for="textareaDesc">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="textareaDesc">{{ old('description') ?? $project->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">

                <label for="inputImage" class="form-label">Image URL</label>
                <input name="image" type="text" class="form-control @error('image') is-invalid @enderror"
                    id="inputImage" value="{{ old('image') ?? $project->image }}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">

                <label for="inputLink" class="form-label">Link</label>
                <input name="link" type="text" class="form-control @error('link') is-invalid @enderror" id="inputLink"
                    value="{{ old('link') ?? $project->link }}">
                @error('link')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3 d-flex gap-2">

                {{-- @dump($project->stacks)
                @dump($stacks) --}}

                @foreach ($stacks as $i => $stack)
                    <div class="form-check">
                        <label class="form-check-label" for="checkStack{{ $i }}">{{ $stack->name }}</label>
                        <input class="form-check-input" type="checkbox" name="stacks[]" value="{{ $stack->id }}"
                            id="checkStack{{ $i }}">
                    </div>
                @endforeach

                @error('stacks')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">

                <label for="selectType" class="form-label">Type</label>
                <select id="selectType" name="type_id" class="form-select" aria-label="Default select example">
                    <option disabled>Select type</option>
                    @foreach ($types as $i => $type)
                        <option @selected(old($type) == $type) value="{{ $i + 1 }}">{{ $type }}</option>
                    @endforeach
                </select>

                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
