@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="container-form">
    <form action="{{ route('category.edit', [$category->slug]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label >Заголовок</label>
            <input type="text" name="title" class="form-control" value="{{ $category->title }}" placeholder="Title">
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label >Название в меню</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}"  placeholder="Name">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
            <label >Ссылка</label>
            <input type="text" name="slug" class="form-control" value="{{ $category->slug }}" placeholder="Slug">
            @if ($errors->has('slug'))
                <span class="help-block">
                    <strong>{{ $errors->first('slug') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label>Родительская</label>
            <select name="parent_id" class="form-control">
                <option selected value="{{ is_null($category->category) ? '' : $category->category->name }}">{{ is_null($category->category) ? 'Выберите категорию (необязательно)' : $category->category->name }}</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}">{{  $cat }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label >Текст</label>
            <textarea rows="6" name="text" class="form-control"  placeholder="Text">{!! $category->text !!}</textarea>
        </div>

        <button type="submit" class="btn btn-default">Сохранить</button>
    </form>
    </div>
        </div>
    </div>
@endsection