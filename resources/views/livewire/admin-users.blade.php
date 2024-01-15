<div>
    <div class="card">

        <div class="card-header">
            <input  wire:keydown="limpiar" wire:model="search" class="form-control w-100%" placeholder="Escriba un nombre">
        </div>

        @if ($users->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $usuario)
                        <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>
                            <a class="btn btn-primary" href="{{route('admin.users.edit',$usuario)}}"> Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$users->links()}}
        </div>
        @else
            <div class="card-body">
                <strong> No hay Coincidencias</strong>
            </div>
        @endif
        
    </div>

</div>
