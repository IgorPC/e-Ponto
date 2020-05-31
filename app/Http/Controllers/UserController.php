<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function edit(Request $request, $id)
    {
        $sucesso = $request->session()->get('sucesso');
        $user = $this->user->find($id);
        return view('users.edit', compact('user', 'sucesso'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = $this->user->find($id);
        $data = $request->all();
        $user->update([
            'name' => $data['name'],
            'celular' => $data['celular'],
            'rua' => $data['rua'],
            'numero' => $data['numero'],
            'bairro' => $data['bairro'],
            'cidade' => $data['cidade'],
            'pais' => $data['pais'],
        ]);
        if($user->verify_data == 0){
            $user->update([
                'verify_data' => 1
            ]);
        }

        session()->flash('sucesso', 'Dados atualizados com sucesso');

        return redirect()->route('admin.user.edit', ['id' => $user->id]);
    }
}
