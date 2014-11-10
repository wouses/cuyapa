<div id="modal-1" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Importar Base de Datos</h3>
    </div>
    <form action="<?php echo base_url(); ?>administrador/base_datos/importar" method="post" enctype="multipart/form-data" name="form_importar_bd">
        <div class="modal-body">
            <div id="alert_ibd"></div>
            <span><i class="icon-edit"></i> Cargue el archivo (.sql) </span>
            
            <hr style="margin-top:1px;">
            <div class="control-group">
                <label for="textfield" class="control-label">Archivo</label>
                <div class="controls">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Seleccionar Archivo</span><span class="fileupload-exists">Cambiar</span><input type="file" name="archivo"></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Quitar</a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </form>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <button class="btn btn-primary" onClick="validar21()" >Guardar</button>
    </div>
</div>