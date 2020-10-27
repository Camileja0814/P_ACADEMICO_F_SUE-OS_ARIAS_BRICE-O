<form id="registrar" action="http://localhost/P_ACADEMICO_F_SUE%C3%91OS_ARIAS_BRICE%C3%91O/controllers/usuarioControlador.php" method="POST">
    
<input type="hidden" name="action" value="insert">

    <div class="top-row">
        <div class="field-wrap">
            <label>
                Nombre<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="nombre" />
        </div>

        <div class="field-wrap">
            <label>
                Apellido<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="apellido" />
        </div>
    </div>

    <div class="top-row">
        <div class="field-wrap">
            <select id="tipo_doc" name="tipo_doc" class="req" style="color: rgba(0, 0, 0, 0.5);">
                <option value="" style="color: rgba(0, 0, 0, 0.5);">--Tipo de
                    documento--</option>
                <option value="CC">Cédula</option>
                <option value="TI">Tarjeta de Identidad</option>
            </select>
        </div>


        <div class="field-wrap">
            <label>
                N° Documento<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" pattern="[0-9]{1,20}" title="ingrese solo numeros"
                name="doc" />
        </div>

    </div>




    <div class="field-wrap">
        <label>
            Usuario<span class="req">*</span>
        </label>
        <input type="text" required autocomplete="off" name="user" />
    </div>



    <div class="top-row">

        <div class="field-wrap">
            <select id="tipo_Usu" name="tipo_Usu" class="req" style="color: rgba(0, 0, 0, 0.5);">
                <option value="">--Tipo de Usuario--</option>
                <option value="Administrador">Administrador</option>
                <option value="Profesor">Profesor</option>
                <option value="Estudiante">Estudiante</option>
            </select>
        </div>


        <div class="field-wrap">
            <select id="especialidad" name="especialidad" class="req" style="color: rgba(0, 0, 0, 0.5);">
                <option value="">--Especialidad--</option>
                <option value="">Área Motriz</option>
                <option value="">Área de Lenguaje</option>
                <option value="">Área Socio-afectiva</option>
                <option value="">Área Cognoscitiva</option>
                <option value="">Ninguna</option>
            </select>
        </div>
    </div>



    <div class="top-row">
        <div class="field-wrap">
            <label>
                Contraseña<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password" />
        </div>

        <div class="field-wrap">
            <label>
                Confirme contraseña<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="con_password" />
        </div>
    </div>

    <input type="submit" value="registrar" class="button button-block">

</form>