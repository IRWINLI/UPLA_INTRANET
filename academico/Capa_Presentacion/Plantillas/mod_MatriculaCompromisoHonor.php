<div class="contenedor_cuerpo">
    <fieldset>
        <p class="titulo_modulo">MATRÍCULA ONLINE</p>
        <p class="css_mod_subtitulo">Compromiso de Honor</p>
        <p class="css_mod_parrafo">Estimado(a) <?php echo $_SESSION['nomape']; ?>, la Universidad Peruana Los Andes le da la bienvenida a nuestra comunidad universitaria.
        A continuación, usted llevará a cabo su "Matrícula Académica", pero previo a ello deberá aceptar el "Compromiso de Honor" que se detalla a continuación.</p><br>
            <div class="compromisoHonor">
                <p>Yo, <?php echo $_SESSION['nomape']; ?>:</p>
                <p>Acogiéndome a los deberes de los estudiantes, me comprometo a cumplir las disposiciones consideradas en el Art. 183 del Estatuto de la Universidad de inciso "a", hasta "j":
                <br>
                <p>Art. 183°.- Son deberes de los estudiantes:</p>                    
                    <ul type=a>    
                        <li>Cumplir con la Ley Universitaria, el presente Estatuto y los Reglamentos vigentes de la Universidad.</li>
                        <li>Aceptar el compromiso de honor con la Universidad y respetar los derechos de los demás miembros de la Comunidad Universitaria.</li>
                        <li>Respetar los derechos de los demás miembros de la Comunidad Universitaria.</li>
                        <li>Cumplir con todas las actividades y tareas académicas de su formación profesional de Investigación, Extensión y de Proyección Social, señalados en el Currículo de Estudios.</li>
                        <li>Participar activamente de los certámenes culturales, sociales y deportivos que organiza, promueve o participa la Universidad o las Facultades.</li>
                        <li>Contribuir al prestigio de la Universidad con una excelente labor académica y cumplimiento de sus fines.</li>
                        <li>Asumir la responsabilidad en el gobierno de la Universidad cuando son elegidos.</li>
                        <li>Defender y conservar el patrimonio material y cultural de la Universidad.</li>
                    </ul>
                </p>
                <br>
                <p>Art. 187°.- Las sanciones son:</p>                    
                    <ul type=a>    
                        <li>Amonestación escrita.</li>
                        <li>Suspensión</li>
                        <li>Separación</li>
                        <p>La amonestación escrita la aplica el Decano o el Consejo de Facultad según los casos.</p>
                </p>
                <br>
                <p>Art. 188°.- Son causales de suspensión de un estudiante las siguientes:</p>                    
                    <ul type=a>    
                        <li>Promover, participar o colaborar en la comisión de actos de violencia que ocasionen daños personales y/o materiales, así como los que alteren el normal desarrollo de las actividades académicas y administrativas, sin perjuicio de las acciones penales o civiles a que haya lugar.</li>
                        <li>Por utilizar los ambientes o instalaciones de la Universidad con fines distintos a los de la enseñanza, investigación, administración y bienestar universitario sin perjuicio de ser puesto a disposición de la autoridad correspondiente.</li>
                        <li>Por condena judicial que imponga pena efectiva privativa de la libertad.</li>
                        <li>Por la comisión de actos dolosos de adulteración y/o falsificación de recibos, certificados de estudios y otros documentos oficiales de la universidad sin perjuicio de entablar las acciones penales correspondientes. De igual forma a los que perpetren actos de extorsión a miembros de la comunidad Universitaria.</li>
                    </ul>
                <br>
                <p>Art. 190°.- La suspensión ó separación se aplica pero previo proceso ante el Tribunal de Honor, sancionado por el Consejo de Facultad.</p>
                <br>
                <p>En caso de no cumplir los deberes indicados en el art. 183 del Estatuto aprobado mediante Resolución 001-2013-AU, de la Asamblea Universitaria.</p>
                <p>ACEPTO la aplicación de los artículos 187,188,189 y 190 del Estatuto de la Universidad.</p>
                <br>
                <p>Asimismo menciono que he recibido de la CAA los siguientes Documentos Académicos:</p>
                <ul type=circle>
                    <li>Reglamento Académico</li>
                    <li>Reglamento de Talleres</li>
                    <li>Agenda Universitaria</li>
                    <p>Autorizo que los costos serán cargados en las pensiones en forma equitativa.</p>
                </ul>
                <p>Por lo que me comprometo a tomar conocimiento y cumplir lo normado en cada uno de ellos</p>
                </p>
                
            </div>
            <br>
            <input type="checkbox" name="checkAcuerdo" id="checkAcuerdo" value="Cheese"> Estoy de acuerdo y me comprometo a cumplir con lo especificado en el Compromiso de Honor.</input>
            <br><br>

        <input class="css_btn" type="button" value="CONTINUAR" onclick="comprobarCompromisoHonor()" />

    </fieldset>

</div>



<script>
    function comprobarCompromisoHonor(){
        var aceptado = $("#checkAcuerdo").is(':checked');
        if (aceptado) {
            var params={};
            params['requisitos']="satisfactorio_cumplidos";
            redirect_by_post("matriculaComprobante",params, false);
             
        }
        else
        {
            notificacion(1,"¡No es posible continuar!","Lo sentimos, no es posible continuar con la matrícula si usted aún no ha aceptado el acuerdo.",8);
        }
    }
</script>









