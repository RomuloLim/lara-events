<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Editar Evento</title>
  </head>
  <body>
    <div class="container">
        <h1 class="display-5 mt-5 mb-4 text-center">nome do evento</h1>
        <form name="updateForm" action="" method="post" class="row g-3">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-mt-12 mt-3">
                        <label for="image" class="form-label">Nome</label>
                        <input required value="{{ $event->name }}" class="form-control col" type="text" name="name" id="name">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="event_date" class="form-label">Data do evento</label>
                        <input required value="{{ $event->event_date }}" class="form-control col" type="date" name="event_date" id="event_date">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="name" class="form-label text-muted">Horário do evento (em breve)</label>
                        <input disabled class="form-control col text-muted" type="time" name="date" id="date">
                    </div>
                    <div class="col-md-6 mt-3">
                        <button type="submit" class="btn btn-primary">Editar evento</button>
                    </div>
                    <div class="col-md-6 mt-3 d-flex justify-content-end mb-4">
                        <a href="{{ route('events.index') }}" type="submit" class="btn btn-success">Voltar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
