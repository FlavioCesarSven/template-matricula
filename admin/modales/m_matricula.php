<!-- Modal -->
<div class="modal fade" id="w_programa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

            </div>
            <div class="modal-body">

                <div class="pd-20 mb-30">
                    <div class="wizard-content">
                        <div class="tab-wizard wizard-circle wizard">
                            <section>

                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="row">

                                            <div class="col-lg-2 col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputID">ID</label>
                                                    <input type="text" class="form-control" id="inputID" name="inputID" readonly>
                                                    <input type="hidden" class="form-control" id="inputAccion" name="inputAccion">
                                                </div>
                                            </div>

                                            <div class="col-lg-5 col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputNombres">Nombres (*)</label>
                                                    <input type="text" class="form-control" id="inputNombres" name="inputNombres" placeholder="Nombres" maxlength="60">
                                                </div>
                                            </div>

                                            <div class="col-lg-5 col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputApellidos">Apellidos (*)</label>
                                                    <input type="text" class="form-control" id="inputApellidos" name="inputApellidos" placeholder="Apellidos" maxlength="60">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputFecNac">Fech. Nacimiento</label>
                                                    <input type="date" class="form-control" id="inputFecNac" name="inputFecNac">
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6">
                                                <div class="form-group">
                                                    <label for="inputSexo">Sexo (*)</label>
                                                    <select name="inputSexo" id="inputSexo" class="form-control">
                                                        <option selected disabled>Seleccione</option>
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Femenino</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-sm-12">
                                                <?php
                                                require_once '../controller/cProgramasC.php';
                                                $oProgC = new cProgramasC();
                                                $result2 = $oProgC->listar();

                                                foreach ($result2 as $row) {
                                                }
                                                ?>

                                                <div class="form-group">
                                                    <label for="inputPrograma">Programa de Estudio (*)</label>
                                                    <select name="inputPrograma" id="inputPrograma" class="form-control">

                                                        <option selected disabled>Seleccione</option>
                                                        <?php
                                                        foreach ($result2 as $row) {
                                                        ?>
                                                            <option value="<?php echo $row["idprograma"] ?>"><?php echo $row["nomb_pro"] ?></option>
                                                        <?php  } ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 col-sm-12">

                                                <div class="form-group">
                                                    <label for="inputPeriodo">Ciclo (*)</label>
                                                    <select name="inputPeriodo" id="inputPeriodo" class="form-control">

                                                        <option selected disabled>Seleccione Ciclo</option>
                                                        
                                                            <option value="I">I</option>
                                                            <option value="II">II</option>
                                                            <option value="II">III</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-12"">
                                                <div class=" form-group">
                                                    <label>Turno </label>
                                                    <select class="form-control">
                                                        <option selected disabled>Seleccione Turno</option>
                                                        <option>A</option>
                                                        <option>B</option>
                                                        <option>C</option>
                                                </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="inputEstado" name="inputEstado" value="A">
                                                    <label class="form-check-label" for="inputEstado">Estado</label>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-lg-12" id="msg">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2"></div>
                        </div>
                   </div>
                </div>
            </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div>
    </form>

</div>
</div>
</div>