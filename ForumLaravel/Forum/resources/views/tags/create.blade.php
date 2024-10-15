<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum - Cadastro de Tags</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="d-flex justify-content-center">
        <div class="col-6 p-5">
            <h1>Cadastro de Tags</h1>
            <form action="{{ route('tags.store') }}" method="post">
                @csrf
                <label for="title" class="form-label">Nome da Tag</label>
                <input type="text" name="title" id="title" class="form-control" required />
                @error('title') <span class="text-danger">{{ $message }}</span> <br /> @enderror

                <div class="form-buttons text-right">
                    <input type="submit" value="Cadastrar" class="mt-4 btn btn-secondary">
                    <button type="button" class="btn btn-light" onclick="window.location.href='{{ url('/tags') }}'">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
