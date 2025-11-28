<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Editar Venda</title>
</head>
<body class="bg-gray-100 p-6">

<h1 class="text-3xl font-bold mb-6">Editar Venda</h1>

@if ($errors->any())
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        <ul class="list-disc ml-6">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('sales.update', $sale->id) }}" method="POST"
      class="bg-white p-6 shadow rounded w-96 space-y-3">
    @csrf @method('PUT')

<label class="block">
    Cliente:
    <select name="customer_id" class="w-full border p-2 rounded">
        <option value="">-- Selecione o Cliente --</option>
        @foreach ($customers as $customer)
            <option value="{{ $customer->id }}"
                {{ $customer->id == $sale->customer_id ? 'selected' : '' }}> 
                {{ $customer->name }}
            </option>
        @endforeach
    </select>
</label>

<label class="block">
    Produto:
    <select name="product_id" class="w-full border p-2 rounded">
        <option value="">-- Selecione o Produto --</option>
        @foreach ($products as $product)
            <option value="{{ $product->id }}"
                {{ $product->id == $sale->product_id ? 'selected' : '' }}> 
                {{ $product->name }}
            </option>
        @endforeach
    </select>
</label>

<label class="block">
    Forma de Pagamento:
    <select name="payment" class="w-full border p-2 rounded" required>
        <option value="">-- Selecione a Forma de Pagamento --</option>

        <option value="pix" {{ $sale->payment == 'pix' ? 'selected' : '' }}>Pix</option>

        <option value="money" {{ $sale->payment == 'dinheiro' ? 'selected' : '' }}>Dinheiro</option>

        <option value="card" {{ $sale->payment == 'cartao' ? 'selected' : '' }}>Cartão</option>

        <option value="ticket" {{ $sale->payment == 'boleto' ? 'selected' : '' }}>Boleto</option>
        
    </select>
</label>

    <div class="flex items-center gap-3">
        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Salvar</button>
        <a href="{{ route('sales.index') }}" class="text-blue-600 hover:underline">Voltar</a>
    </div>
</form>

</body>
</html>