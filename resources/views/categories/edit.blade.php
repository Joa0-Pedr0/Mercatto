<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Editar Categoria</title>
</head>
<body class="bg-gray-100 p-6">

<h1 class="text-3xl font-bold mb-6">Editar Categoria</h1>

@if ($errors->any())
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        <ul class="list-disc ml-6">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categories.update', $category->id) }}" method="POST"
      class="bg-white p-6 shadow rounded w-96 space-y-3">
    @csrf @method('PUT')

    <label class="block">
        Nome da categoria:
        <input type="text" name="name" class="w-full border p-2 rounded" value="{{$category->name}}">
    </label>

    <label class="block">
        Exemplos de produtos:
        <input type="number" name="description" class="w-full border p-2 rounded" value="{{$category->amount}}">
    </label>

    <div class="flex items-center gap-3">
        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Salvar</button>
        <a href="{{ route('categories.index') }}" class="text-blue-600 hover:underline">Voltar</a>
    </div>
</form>

</body>
</html>