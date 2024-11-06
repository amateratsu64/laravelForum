<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Novo Tópico</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Criar Novo Tópico</h1>
        <form action="{{ route('topics.createTopic') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagem</label>
                <input type="text" class="form-control" id="image" name="image" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Categoria</label>
                <select class="form-control" id="category" name="category" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Criar Tópico</button>
        </form>
    </div>
</body>
</html>
