<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Novo Produto</title>
</head>
<body class="bg-gray-100 p-6">

<h1 class="text-3xl font-bold mb-6">Cadastrar Produto</h1>

<form action="{{ route('products.store') }}" method="POST"
      class="bg-white p-6 shadow rounded w-96 space-y-3">
    @csrf

    <label class="block">
        Nome:
        <input type="text" name="name" class="w-full border p-2 rounded">
    </label>
            @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror

    <label class="block">
<label class="block">
    Categoria:
    <select name="category_id" class="w-full border p-2 rounded">
        <option value="">-- Selecione a Categoria --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>
            @error('category_id')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
</label>
    </select>
</label>

    <label class="block">
        Quantidade:
        <input type="number" name="amount" class="w-full border p-2 rounded">
    </label>
            @error('amount')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror

    <label class="block">
        Preço:
        <input type="text" name="price" class="w-full border p-2 rounded">
    </label>
            @error('price')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror

    <div class="flex items-center gap-3">
        <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Salvar</button>
        <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">Voltar</a>
    </div>
</form>

</body>
</html>