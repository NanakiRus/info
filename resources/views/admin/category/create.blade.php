@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="container-form">
    <form action="{{ route('category.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label >Заголовок</label>
            <input type="text" name="title" class="form-control"  placeholder="Title">
        </div>
        <div class="form-group">
            <label >Название в меню</label>
            <input type="text" name="name" class="form-control"  placeholder="Name">
        </div>
        <div class="form-group">
            <label >Ссылка</label>
            <input type="text" name="slug" class="form-control" placeholder="Slug">
        </div>
        <div class="form-group">
            <label>Родительская</label>
            <select name="parent_id" class="form-control">
                <option selected value>Выберите категорию (необязательно)</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label >Текст</label>
            <textarea rows="6" name="text" class="form-control"  placeholder="Text">
            </textarea>
        </div>

        <button type="submit" class="btn btn-default">Сохранить</button>
    </form>
    </div>
        </div>
    </div>
@endsection