<!-- Modal -->
<div class="modal fade" id="w_programa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" id="frm_programa" onsubmit="return guardarRegistro()" autocomplete="off">
            <div class="modal-header">
                <h5 class="modal-title" id="titulo_ventana">Modal title</h5>

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
                                            <input type="text" class="form-control" placeholder="ID" id="inputID" name="inputID" readonly>
                                            <input type="text" class="form-control" id="inputAccion" name="inputAccion">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="inputNombre">Nombre</label>
                                            <input class="form-control" type="text" placeholder="Ingrese nombre de la Especialidad" id="inputNombre" name="inputNombre">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12" id="msgenvio">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Description :</label>
										  <textarea class="form-control" rows="3" placeholder="Descripci??n de la Especialidad..." id="inputDesc" name="inputDesc"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group  custom-control custom-checkbox mb-5">
										    <input type="checkbox" class="custom-control-input" id="inputEstado" name="inputEstado" value="A">
										    <label class="custom-control-label" for="inputEstado">Estado</label>
                                        </div>
                                    </div>
                                </div>

                            </section>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button onclick="actualizarPagina()" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </form>

    </div>
</div>