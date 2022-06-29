@extends('layout.admin')

@section('title', 'Категории')

@section('content')

    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Категории</h3>

        <div class="mt-8">
            <a href="{{ route('admin.categories.create') }}" class="text-indigo-600 hover:text-indigo-900">Добавить</a>
        </div>

        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                        class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                        </thead>

                        <tbody class="bg-white">
                        @foreach($Categories as $Category)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if(isset($Category->Parent_id))
                                    <div class="text-sm leading-5 text-gray-900">{{ $Category->Name }}</div>
                                    @else
                                    <div class="text-sm leading-5 text-gray-900">{{ $Category->Name }} - Родитель</div>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    <a href="{{ route('admin.categories.edit', $Category->Category_id) }}" class="text-indigo-600 hover:text-indigo-900">Редактировать</a>

                                    <form action="{{ route('admin.categories.destroy', $Category->Category_id) }}" method="POST">
                                        @csrf

                                        @method('DELETE')

                                        <button type="submit" class="text-red-600 hover:text-red-900">Удалить</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $Categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection