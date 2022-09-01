@extends('layouts.layout')

@section('title', 'SICPORTO-EXPEDIENTE')
@section('page', 'Expedientes')

@section('content')

 <!-- DATA TABLE-->
 <section class="p-t-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title-5 m-b-35 text-center">Expedientes</h3>
                @if(isset($sms))

                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Success</span>
                    {{$sms}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @endif
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="rs-select2--light rs-select2--md">
                            <select class="js-select2" name="property">
                                <option selected="selected">All Properties</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <div class="rs-select2--light rs-select2--sm">
                            <select class="js-select2" name="time">
                                <option selected="selected">Today</option>
                                <option value="">3 Days</option>
                                <option value="">1 Week</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        <button class="au-btn-filter">
                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                    </div>
                    <div class="table-data__tool-right">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#mediumModal">
                            <i class="zmdi zmdi-plus"></i>Registar</button>
                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                            <select class="js-select2" name="type">
                                <option selected="selected">Export</option>
                                <option value="">Option 1</option>
                                <option value="">Option 2</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data3">
                    <table class="table table-data2 " id="datatable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Ref nº</th>
                                <th>Data Recepção</th>
                                <th>Proveniência</th>
                                <th>Nº PGR</th>
                                <th>Tipo de óficio</th>
                                <th>Assunto</th>
                                <th>Recepcionista</th>
                                <th>Proc Nº</th>
                                <th>Estado</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                         @if (isset($exp))
                         @php

                         
                         
                     @endphp
                                @foreach ($exp as $e)
                                
                               
                            <tr class="tr-shadow">
                                <td>{{$e->id}}</td>
                                <td>
                                    <span class="block-email">{{$e->refnum}}</span>
                                </td>
                                <td class="desc">{{$e->data_recepcao}}</td>
                                <td>{{$e->proveniencia}}</td>
                                <td>
                                    <span class="status--process">{{$e->pgr_num}}</span>
                                </td>
                                <td>{{$e->tipo_oficio}}</td>
                                <td>{{$e->assunto}}</td>
                                <td>{{$e->recepcionista}}</td>
                                <td>{{$e->procnum}}</td>
                                <td><span class="status--process">{{$e->historico[0]['estado']}}</span></td>
                                <td>
                                    <div class="table-data-feature">
                                         <button class=" edit_data btn btn-primary" type="button" id="{{$e->id}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                         </button>
                                        <button class="btn btn-success btn-sm ml-2" data-toggle="modal" data-target="#entradaModal">Entrada</button>
                                        <button class="btn btn-warning btn-sm ml-2" id="{{$e->id}}">Saída</button> 
                                        <a href="" class="btn btn-secondary btn-sm ml-2">Histórico </a>
                                        <button class="btn btn-info btn-sm ml-2" id="{{$e->id}}">Concluir</button> 
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                      @endif  
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

   
</section>
<!-- END DATA TABLE-->


<!-- modal medium -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Registar Expediente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="/expedientes/store" method="post" novalidate="novalidate">
                                    @csrf

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Ref Nº</label>
                                                <input id="cc-exp" name="ref" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                    data-val-cc-exp="Please enter a valid month and year" 
                                                    autocomplete="cc-exp">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="x_card_code" class="control-label mb-1">Data Recepção</label>
                                            <div class="input-group">
                                                <input id="x_card_code" name="datarecepcao" type="date" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                                    data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Proveniência</label>
                                                <input id="cc-exp" name="proveniencia" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                    data-val-cc-exp="Please enter a valid month and year"
                                                    autocomplete="cc-exp">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="x_card_code" class="control-label mb-1">Nº PGR</label>
                                            <div class="input-group">
                                                <input id="x_card_code" name="numpgr" type="text" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                                    data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <label for="select" class=" form-control-label">Tipo Ofício</label>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <select name="tipooficio" id="select" class="form-control">
                                                        <option selected="selected">Selecione</option>
                                                        <option value="Participação (Crime)">Participação (Crime)</option>
                                                        <option value="Processo Crime">Processo Crime</option>
                                                        <option value="Processo Investigativo">Processo Investigativo</option>
                                                        <option value="Mandado">Mandado</option>
                                                        <option value="Processo de Desalfadegamento">Processo de Desalfadegamento</option>
                                                        <option value="Grau de cumprimento">Grau de cumprimento</option>
                                                        <option value="Informação">Informação</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="x_card_code" class="control-label mb-1">Assunto</label>
                                            <div class="input-group">
                                                <input id="x_card_code" name="assunto" type="text" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                                    data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cc-exp" class="control-label mb-1">Recepcionista</label>
                                                <input id="cc-exp" name="recepcionista" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                    data-val-cc-exp="Please enter a valid month and year" 
                                                    autocomplete="cc-exp">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="x_card_code" class="control-label mb-1">Proc Nº</label>
                                            <div class="input-group">
                                                <input id="x_card_code" name="procnum" type="text" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                                    data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                                <input  name="id_user" type="hidden" value="{{ Auth::user()->id}} " >
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- end modal medium -->


<!-- modal Edit -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Editar Expediente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form  method="post" novalidate="novalidate" id="formedit">
                                    
                                    {{csrf_field()}}
                                    {{ method_field('PUT') }}

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="ref" class="control-label mb-1">Ref Nº</label>
                                                <input id="ref" name="refnum" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                    data-val-cc-exp="Please enter a valid month and year" 
                                                    autocomplete="cc-exp">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="datarecepcao" class="control-label mb-1">Data Recepção</label>
                                            <div class="input-group">
                                                <input id="datarecepcao" name="data_recepcao" type="date" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                                    data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="proveniencia" class="control-label mb-1">Proveniência</label>
                                                <input id="proveniencia" name="proveniencia" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                    data-val-cc-exp="Please enter a valid month and year"
                                                    autocomplete="cc-exp">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="pgrnum" class="control-label mb-1">Nº PGR</label>
                                            <div class="input-group">
                                                <input id="pgrnum" name="pgr_num" type="text" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                                    data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row form-group">
                                                <div class="col col-md-12">
                                                    <label for="select" class=" form-control-label">Tipo Ofício</label>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <select name="tipo_oficio" id="select" class="form-control">
                                                        <option selected="selected">Selecione</option>
                                                        <option value="Participação (Crime)">Participação (Crime)</option>
                                                        <option value="Processo Crime">Processo Crime</option>
                                                        <option value="Processo Investigativo">Processo Investigativo</option>
                                                        <option value="Mandado">Mandado</option>
                                                        <option value="Processo de Desalfadegamento">Processo de Desalfadegamento</option>
                                                        <option value="Grau de cumprimento">Grau de cumprimento</option>
                                                        <option value="Informação">Informação</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="assunto" class="control-label mb-1">Assunto</label>
                                            <div class="input-group">
                                                <input id="assunto" name="assunto" type="text" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                                    data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="recepcionista" class="control-label mb-1">Recepcionista</label>
                                                <input id="recepcionista" name="recepcionista" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                    data-val-cc-exp="Please enter a valid month and year" 
                                                    autocomplete="cc-exp">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="procnum" class="control-label mb-1">Proc Nº</label>
                                            <div class="input-group">
                                                <input id="procnum" name="procnum" type="text" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                                    data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                                <input  name="id_user" type="hidden" value="{{ Auth::user()->id}} " >
                                                <input  name="id" type="hidden" id="id" >
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- end modal medium -->

  



<!-- modal Entrada -->
<div class="modal fade" id="entradaModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Entrada do Expediente ao Gabinete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form  method="post" novalidate="novalidate" id="formedit">
                                    
                                    {{csrf_field()}}
                                    {{ method_field('PUT') }}

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="ref" class="control-label mb-1">Nome</label>
                                                <input id="ref" name="refnum" type="text" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                    data-val-cc-exp="Please enter a valid month and year" 
                                                    autocomplete="cc-exp">
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-6">
                                            <label for="disabled-input" class="control-label mb-1">Data</label>
                                            <div class="input-group">
                                                <input id="disabled-input" value="{{ date('d/m/y') }}"  disabled="" name="data_recepcao" type="text" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code"
                                                    data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                            </div>
                                        </div>
                                    </div>
                                    
                                    

                                    <div class="text-right">
                                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- end modal medium -->






  
  

<!-- meu JS -->

<script>

    $(document).ready(function(){
        //abrir modal para editar
       var table=$('#datatable').DataTable();
       table.on('click', '.edit_data',function(){
        $tr=$(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr=$tr.prev('.parent');
        }
        var data=table.row($tr).data();
        var ref=removeTags(data[1]);
        var pgrnum=removeTags(data[4]);
        console.log(data);
        $('#id').val(data[0]);
        $('#ref').val(ref);
        $('#datarecepcao').val(data[2]);
        $('#proveniencia').val(data[3]);
        $('#pgrnum').val(pgrnum);
        $('#select').val(data[5]);
        $('#assunto').val(data[6]);
        $('#recepcionista').val(data[7]);
        $('#procnum').val(data[8]);
        //abrir o modal
        $('#formedit').attr('action','/expedientes/update'+data[0]);
        $('#EditModal').modal('show');

       });
            
        });
      
    </script>



<!-- end meu js -->


@endsection
