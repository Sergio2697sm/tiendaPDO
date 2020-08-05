<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Insertar Cliente</h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
                            <div>
                                <label>Nombre:</label>
                                <input type="text" name="nombre">
                            </div>
                            <div>
                                <label>Cantidad:</label>
                                <input type="number" name="cantidad">
                            </div>

                            <div>
                                <label>Precio:</label>
                                <input type="number" name="precio">
                            </div>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="insertar" value="Insertar Producto">
                        </form>
                    </div>
               
                </div>
            </div>
        </div>