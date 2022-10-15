<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo form_open('');
    
echo validation_errors();

//ANALISTA
if(isset($this->session->ana_id))
{
echo <<<hereDOC

<input type="hidden" name="analista" value="{$analista["ana_id"]}"/>

  <div class="form-group">
    <label for="contrasena">Nueva contraseña</label>
    <input type="password" class="form-control" name="contrasena" id="contrasena" value="{$analista["ana_contrasena"]}">
    <small id="contradetalle" class="form-text text-muted">Mínimo 8 caracteres. Solo alfa numéricos</small>
  </div>
  <div class="form-group">
    <label for="contrasena">Confirma contraseña</label>
    <input type="password" class="form-control" name="confirma_contrasena" id="confirma_contrasena" value="" />
  </div>
hereDOC;

}

/*



*/

//RECEPCION
if(isset($this->session->rec_id))
{
echo <<<hereDOC

<input type="hidden" name="recepcion" value="{$recepcion["rec_id"]}"/>

  <div class="form-group">
    <label for="contrasena">Nueva contraseña</label>
    <input type="password" class="form-control" name="contrasena" id="contrasena" value="{$recepcion["rec_contrasena"]}">
    <small id="contradetalle" class="form-text text-muted">Mínimo 8 caracteres. Solo alfa numéricos</small>
  </div>
  <div class="form-group">
    <label for="contrasena">Confirma contraseña</label>
    <input type="password" class="form-control" name="confirma_contrasena" id="confirma_contrasena" value="" />
  </div>
hereDOC;


}

//TECNICO
if(isset($this->session->rt_id))
{
echo <<<hereDOC

<input type="hidden" name="tecnico" value="{$tecnico["rt_id"]}"/>

  <div class="form-group">
    <label for="contrasena">Nueva contraseña</label>
    <input type="password" class="form-control" name="contrasena" id="contrasena" value="{$tecnico["rt_contrasena"]}">
    <small id="contradetalle" class="form-text text-muted">Mínimo 8 caracteres. Solo alfa numéricos</small>
  </div>
  <div class="form-group">
    <label for="contrasena">Confirma contraseña</label>
    <input type="password" class="form-control" name="confirma_contrasena" id="confirma_contrasena" value="" />
  </div>
hereDOC;

}


echo '<p><input type="submit" name="actualizar" value="Actualizar" class="btn btn-outline-secondary"/>';
echo form_close();

echo"<p>".anchor('menu/','Atrás','class="btn btn-outline-secondary"')."</p>";

