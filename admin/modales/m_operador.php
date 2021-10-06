<!-- Modal -->
<div class="modal fade" id="w_operador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" id="frm_programa" onsubmit="return guardarRegistro()">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulo_ventana">Modal title</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">

                <div class="pd-20 mb-30">
                    <div class="wizard-content">
                        <div class="tab-wizard wizard-circle wizard">
                            <section>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputID">ID :</label>
                                            <input type="text" class="form-control" placeholder="ID" id="inputID" name="inputID">
                                            <input type="text" class="form-control" id="inputAccion" name="inputAccion">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputNombre">Nombre</label>
                                            <input class="form-control" type="text" placeholder="Ingrese nombre" id="inputNombre" name="inputNombre">
                                        </div>
                                    </div>
                                </div>
                                        
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label>Estado :</label>
                                            <select class="form-control">
                                                <option>Seleccione Estado</option>
                                                <option>Activo</option>
                                                <option>Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </section>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" onclick="actualizarPagina()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>

    </div>
</div>
</div>