<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ExpedienteModel;
use App\Models\HistoricoExpediente;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $exp=ExpedienteModel::orderBy('id','desc')->get();
        $exp=ExpedienteModel::orderBy('id','desc')->get();
        return view('expediente.index',['exp'=>$exp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    $m=new ExpedienteModel();
    $h=new HistoricoExpediente();

     $m->refnum=$request->ref;
     $m->proveniencia=$request->proveniencia;
     $m->tipo_oficio=$request->tipooficio;
     $m->pgr_num=$request->numpgr;
     $m->assunto=$request->assunto;
     $m->recepcionista=$request->recepcionista;
     $m->procnum=$request->procnum;
     $m->data_recepcao=date('y-m-d',strtotime($request->datarecepcao));
     $m->save();
     //historico
     
     $h->estado='Área administrativa';
     $h->id_user=$request->id_user;
     $h->descricao='O expediente encontra-se na área administrativa';
     $h->id_expediente=$m->id;
     $h->save();

    $sms='Expediente registado com sucesso';
     $exp=ExpedienteModel::find(3)->historicoExpedientes;
        dd( $exp);
     return view ('expediente.index',['exp'=>$exp,'sms'=>$sms ]);

     
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
       // $exp_edit=ExpedienteModel::findOrFail($id);
        $exp=ExpedienteModel::orderBy('id','desc');
          return view('expediente.index1',['exp'=>$exp]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ExpedienteModel::findOrFail($request->id)->update($request->all());
        $sms='Expediente Atualizado  com sucesso';
        $exp=ExpedienteModel::orderBy('id','desc')->get();
    
        return view ('expediente.index1',['exp'=>$exp,'sms'=>$sms ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
