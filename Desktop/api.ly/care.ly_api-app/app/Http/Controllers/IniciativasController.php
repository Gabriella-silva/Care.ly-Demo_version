<?php

namespace App\Http\Controllers;

use App\Models\Iniciativa;
use Illuminate\Http\Request;

class IniciativaController extends Controller {
    // Retorna todas as iniciativas em formato JSON (para o React consumir)
    public function index() {
        return response()->json(Iniciativa::all());
    }

    // Exibe o formulário no painel de administração
    public function create() {
        return view('admin.iniciativas.create');
    }

    // Armazena a iniciativa no banco de dados
    public function store(Request $request) {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'imagem' => 'nullable|image|max:2048',
        ]);

        // Salva a imagem, se houver
        if ($request->hasFile('imagem')){
            $data['imagem'] = $request->file('imagem')->store('uploads', 'public');
        }

        $iniciativa = Iniciativa::create($data);

        // Se for uma requisição API (React, por exemplo)
        if ($request->wantsJson()) {
            return response()->json($iniciativa, 201);
        }

        // Se for o painel de admin (HTML Blade)
        return redirect()->route('admin.iniciativas.create')->with('success', 'Iniciativa cadastrada!');
    }
}
