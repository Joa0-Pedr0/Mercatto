<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Nova Categoria</title>
</head>
<body class="bg-gray-100 p-6">

<h1 class="text-3xl font-bold mb-6">Cadastrar Categoria</h1>


<form action="{{ route('categories.store') }}" method="POST"
      class="bg-white p-6 shadow rounded w-96 space-y-3">
    @csrf

    <label class="block">
        Nome da categoria:
        <input type="text" name="name" class="w-full border p-2 rounded">
    </label>
             @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror

    <label class="block">
        Exemplos de produtos:
        <input type="text" name="description" class="w-full border p-2 rounded">
    </label>
            @error('description')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror

    <div class="flex items-center gap-3">
        <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Salvar</button>
        <a href="{{ route('categories.index') }}" class="text-blue-600 hover:underline">Voltar</a>
    </div>
</form>

</body>
</html>