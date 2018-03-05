@extends('admin.layout')

@section('content')
    <div class="content">
    @foreach($categories as $category)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="{{ route('category.show', [$category->slug]) }}">{{ $category->name }}</a>
                </h3>
            </div>
            <div class="panel-body">
                <div class="pull-right btn-group-vertical">
                    <a href="{{ route('category.edit', [$category->slug]) }}" type="button" class="btn btn-info btn-sm btn-block ad-click-event">Редактировать</a>
                    <form action="{{ route('category.destroy', [$category->slug]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-sm btn-block ad-click-event">Удалить</button>
                    </form>
                </div>
                {!! str_limit($category->text, 150) !!}
            </div>
        </div>
    @endforeach
    {{ $categories->links() }}
    </div>
@endsection