<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand">Admin</a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Sair</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-sm">
        @if (session('message'))
            <div class="alert alert-success mt-3">{{ session('message') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="display-5 mt-5 mb-4 text-center">Eventos disponíveis</h1>
            <div class="row mb-3">
                <button type="button" class="btn btn-success col-md-2 mb-2" data-bs-toggle="modal" data-bs-target="#modal">
                    Criar novo evento
                </button>
                <form class="col-md-3 ms-auto" action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Pesquisar">
                        <button type="submit" class="btn btn-outline-secondary">Filtrar</button>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Evento</th>
                        <th scope="col">Data</th>
                        <th scope="col">Tempo restante</th>
                        <th scope="col" colspan="3">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                          <tr>
                            <th scope="row">1</th>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->event_date }}</td>
                            @php
                            $eventDate = new DateTime($event->event_date);
                            $dateInterval = $atualDate->diff($eventDate);
                        @endphp
                        @if ($atualDate > $eventDate)
                            <td>Já passou!</td>
                        @else
                            <td>{{ $dateInterval->y }} {{$dateInterval->y != 1 ? 'anos' : 'ano'}}, {{ $dateInterval->m }} {{ $dateInterval->m != 1 ? 'meses' : 'mês' }} e {{ $dateInterval->d }} {{ $dateInterval->d > 1 ? 'dias' : 'dia' }}</td>
                        @endif
                            <td class="float-none">
                                <button class="btn btn-primary" disabled><i class="fas fa-eye"></i></button>
                                <a href="#" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                <form style="display:inline" method="post" action="{{ route('events.destroy', $event->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="confirm('Tem certeza que quer deletar o paciente?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
      </div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inserir novo paciente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="createForm" action="{{ route('events.store') }}" method="post" class="row g-3">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-mt-12 mt-3">
                                <label for="image" class="form-label">Nome</label>
                                <input required value="{{ old('name') }}" class="form-control col" type="text" name="name" id="name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="event_date" class="form-label">Data do evento</label>
                                <input required value="{{ old('event_date') }}" class="form-control col" type="date" name="event_date" id="event_date">
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="name" class="form-label text-muted">Horário do evento (em breve)</label>
                                <input disabled class="form-control col text-muted" type="time" name="date" id="date">
                            </div>
                            <div class="col-md-6 mt-3">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
