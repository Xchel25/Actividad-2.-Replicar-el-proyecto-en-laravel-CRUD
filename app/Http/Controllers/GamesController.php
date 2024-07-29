<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videogame;
use App\Models\Category;
use App\Http\Requests\StoreVideogame;
use App\Mail\VideogameMail;
use Illuminate\Support\Facades\Mail;

class GamesController extends Controller
{
    // Método para mostrar todos los videojuegos
    public function index()
    {
        $videogames = Videogame::all();
        return view('index', ['games' => $videogames]);
    }

    // Método para la vista de creación
    public function create()
    {
        $categorias = Category::all();  // Obtener todas las categorías
        return view('create', ['categorias' => $categorias]);  // Pasar las categorías a la vista
    }

    // Método de ayuda para mostrar información de un videojuego específico
    public function help($name_game, $categoria = null)
    {
        $date = now();
        return view('show', [
            'nameVideogame' => $name_game,
            'categoryGame' => $categoria,
            'fecha' => $date
        ]);
    }

    // Método para almacenar un nuevo videojuego
    public function storeVideogame(StoreVideogame $request)
    {
        Videogame::create($request->all());
        foreach (['birtlex25@gmail.com'] as $recipient) {
            Mail::to($recipient)->send(new VideogameMail());
        }

        return redirect()->route('games');
    }

    // Método para ver los detalles de un videojuego específico
    public function view($game_id)
    {
        $game = Videogame::find($game_id);
        $categorias = Category::all();
        return view('update', ['categorias' => $categorias, 'game' => $game]);
    }

    // Método para actualizar un videojuego existente
    public function updateVideogame(StoreVideogame $request)
    {
        $request->validate([
            'name_game' => 'required|min:5|max:10',
        ]);

        $game = Videogame::find($request->game_id);
        $game->name = $request->name_game;
        $game->category_id = $request->categoria_id;
        $game->active = 1;
        $game->save();

        return redirect()->route('games');
    }

    // Método para eliminar un videojuego
    public function delete($game_id)
    {
        $game = Videogame::find($game_id);
        $game->delete();
        return redirect()->route('games');
    }
}
