<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrcamentoRequest;
use App\Models\ModelOrcamento;
use App\User;
class OrcamentoControle extends Controller
{
    private $objUser;
    private $objOrcamento;

    public function __construct(){
        $this->objUser = new User();
        $this->objOrcamento = new ModelOrcamento();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $orcamento=$this->objOrcamento->all()->sortByDesc('data');
       return view('index',compact('orcamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->objUser->all();
        return view('create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrcamentoRequest $request)
    {
        $cadastro=$this->objOrcamento->create([
            'cliente'=>$request->cliente,
            'data'=>$request->data,
            'descricao'=>$request->descricao,
            'valor'=>$request->valor,
            'id_user'=>$request->id_user
        ]);
        if($cadastro){
            return redirect('orcamentos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orcamento=$this->objOrcamento->find($id);
        return view('show',compact('orcamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orcamento=$this->objOrcamento->find($id);
        $users = $this->objUser->all();
        return view('create',compact('orcamento','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrcamentoRequest $request, $id)
    {
        $this->objOrcamento->where(['id' => $id])->update([
        'cliente'=>$request->cliente,
        'data'=>$request->data,
        'descricao'=>$request->descricao,
        'valor'=>$request->valor,
        'id_user'=>$request->id_user
        ]);
        return redirect('orcamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objOrcamento->destroy($id);
        return ($del)?"Sim":"Não";
    }
}
