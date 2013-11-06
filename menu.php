<!--[if (gt IE 7)&(lt IE 10)]><ul><![endif]-->
<!--[if !(gt IE 7)&(lt IE 10)]><!--> <ul class="accordion"> <!--<![endif]-->
   <li <?php if ($active_page=="Inicio") echo " class='active'"; ?> id="inicio"><a href="/inicio"><span>Inicio</span></a></li>
   <li <?php if ($active_page=="nosotros") echo " class='active'"; ?>><a href="/nosotros"><span>La empresa</span></a></li>
   <li <?php if ($active_page=="productos") echo " class='active has-sub'"; elseif($active_page!=="productos") echo "class='has-sub'"?>><a><span>Productos</span></a>
      <ul>
         <li class="has-sub"><a href="#"><span>Bombas Sumergibles para Pozo</span></a>
            <ul>
               <li><a href="/kor"><span>Altamira Serie KOR (Acero Inoxidable)</span></a></li>
               <li><a href="/bs"><span>Altamira Serie BS (Hierro)</span></a></li>
               <li><a href="/t"><span>Altamira Serie T</span></a></li>
               <li><a href="/max"><span>Aqua Pak Serie Max</span></a></li>
               <li><a href="/task"><span>Aqua Pak Serie Task</span></a></li>
               <li class="last boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/mbe.html';"><span>Espa (Acuaria)</span></a></li>
               
            </ul>
         </li>
         <li class="has-sub"><a href="#"><span>Motores Sumergibles</span></a>
            <ul>
               <li><a href="/k"><span>Altamira  Serie K</span></a></li>
               <li><a href="/r"><span>Altamira  Serie R</span></a></li>
               <li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/msf.html';"><span>Franklin</span></a></li>
               <li class="last"><a href="/motores"><span>Aqua Pak</span></a></li>
            </ul>
         </li>
         <li class="has-sub"><a href="#"><span>Bombas Sumergibles para Aguas Residuales</span></a>
         	<ul>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/bac.html';"><span>Bombas para Achique (Efluentes)</span> </a></li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/bal.html';"><span>Bombas para Lodos</span></a></li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/triturador.html';"><span>Bombas para Lodos (Trituradora)</span></a></li>
         	</ul>
         </li>
         <li class="has-sub"><a href="#"><span>Bombas de Superficie</span></a>
         	<ul>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/pd.html';"><span>Uso Doméstico, Sistemas de Riego e Hidroneumáticos</span></a></li>
         		<li><a href="/loop"><span>Circuladora para Agua Caliente</span></a></li>
         		<li><a href="/venus"><span>Para Hidromasaje</span></a></li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/bi.html';"><span>Uso Industrial</span></a></li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/bdosificadora.html';"><span>Acondicionamiento de Agua (Dosificadoras)</span></a></li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/fps.htm';"><span>Uso Agrícola</span></a></li>
         	</ul>
         </li>
         <li class="has-sub"><a href="#"><span>Piscinas</span></a>
         	<ul>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/bpiscinas.html';"><span>Bombas</span></a></li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/filtros.html';"><span>Filtros</span></a></li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/bcalor.htm';"><span>Bombas de Calor</span></a></li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/mantenimiento piscinas.htm';"><span>Mantenimiento</span></a></li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/accesorios piscinas.htm';"><span>Accesorios</span></a></li>
         	</ul>
         </li>
         <li class="has-sub"><a href="#"><span>Presurizadores</span></a>
         	<ul>
         		<li class="has-sub">
         			<a href="#"><span>Presurizador Tradicional</span></a>
         			<ul>
         				<li><a href="/minismart"><span>Minismart</span></a></li>
         				<li><a href="/preskit"><span>Una Bomba con Kit</span></a></li>
         				<li><a href="/presurizadores"><span>Una Bomba con Tanque</span></a></li>
         				<li><a href="/velocidad-constante"><span>Múltiple Velocidad Constante</span></a></li>
         			</ul>
         		</li>
         		<li class="has-sub"><a href="#"><span>Presurizador Presión Constante</span></a>
         			<ul>
         				<li class="has-sub"><a href="#"><span>Una Bomba</span></a>
         					<ul>
         						<li  class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/tecnoplus.html';"><span>Tecnoplus</span></a></li>
         						<li <?php if ($active_page=="productos") echo " class='active'"; ?>><a href="/diva"><span>Diva</span></a></li>
         						<li  class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/wvmultiple.html';"><span>Water Variat</span></a></li>
         						<li  class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/fmultiple.html';"><span>SubDrive</span></a></li>
         					</ul>
         				</li>
         				<li class="has-sub"><a href="#"><span>MultiBomba</span></a>
         					<ul>
         						<li  class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/wvmultiple2.html';"><span>Water Variat</span></a></li>
         						<li  class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/presctealtamira.html';"><span>Altamira Industria (AX y TX)</span></a></li>
         						<li  class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/presctealtamirae.html';"><span>Altamira Residencial y Comercial</span></a></li>
         						<li><a href="/presion-constante"><span>Múltiple Velocidad Variable</span></a></li>
         					</ul>
         				</li>
         			</ul>
         		</li>
         	</ul>
         </li>
         <li class="has-sub"><a href="#"><span>Variadores de velocidad</span></a>
         	<ul>
         		<li  class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/variadorv.html';"><span>Water Variat</span></a></li>
         		<li  class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/subdrive.html';"><span>SubDrive</span></a></li>
         		<li <?php if ($active_page=="productos") echo " class='active'"; ?>><a href="/fdrive"><span>F-Drive</span></a></li>
         	</ul>
         </li>
         <li class="has-sub"><a href="#"><span>Tanques</span></a>
         	<ul>
         		<li class="has-sub"><a href="#"><span>Tanques Altamira</span></a>
         			<ul>
         				<li><a href="/prox"><span>Serie Pro-X</span></a></li>
		         	    <li><a href="/proxl"><span>Serie Pro-XL</span></a></li>
		         	    <li><a href="/acero"><span>Serie Acero</span></a></li>
		         	    <li><a href="/sky"><span>Serie Sky</span></a></li>
		         	    <li><a href="/pro"><span>Serie Pro</span></a></li>
		         	</ul>
         		</li>
         		<li class="has-sub"><a href="#"><span>Tanques Aqua Pak</span></a>
         			<ul>
         				<li><a href="/tanques-horizontales"><span>Horizontales</span></a></li>
		         	    <li><a href="/tanques-verticales"><span>Verticales</span></a></li>
		         	</ul>
         		</li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/tanquew.html';"><span>Tanques Well-X-Trol</span></a></li>
         	</ul>
         </li>
         <li class="has-sub"><a href="#"><span>Accesorios</span></a>
         	<ul>
         		<li class="has-sub"><a href="#"><span>Tableros de control</span></a>
         			<ul>
         				<li><a href="/tableros-velocidad-constante"><span>Velocidad constante</span></a></li>
         				<li><a href="/tableros-presion-constante"><span>Presión constante</span></a></li>
         				<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/tableroincendio.html';"><span>Contra incendio</span></a></li>
         			</ul>
         		</li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/medidormec.html';"><span>Medidores de Flujo</span></a></li>
         		<li><a href="/pres10"><span>Control Automático de Presión</span></a></li>
         		<li><a href="/cable"><span>Cable Sumergible</span></a></li>
         		<li><a href="/manometro"><span>Manómetro</span></a></li>
         		<li><a href="/flotador"><span>Switch flotador</span></a></li>
         		<li><a href="/switch"><span>Switch de Presión</span></a></li>
         		<li><a href="/tubos"><span>Tubo para columna</span></a></li>
         		<li><a href="/valvulas"><span>Válvulas check para bombas sumergibles</span></a></li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/arrancador.html';"><span>Arrancadores Magnéticos</span></a></li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/arrancadors.html';"><span>Arrancadores Suaves</span></a></li>
         		<li class="has-sub"><a href="#"><span>Protecciones para Motor</span></a>
         			<ul>
         				<li <?php if ($active_page=="productos") echo " class='active'"; ?>><a href="/procontrol"><span>Procontrol</span></a></li>
         				<li><a href="vde/pro_motor.html" onclick="self.frames['contenido'].location.href = 'vde/mbe.html';"><span>Protecciones para Motores</span></a></li>
         			</ul>
         		</li>
         		<li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/tuboc.html';"><span>Tubo de Columna</span></a></li>
         	</ul>
         </li>
         <li class="last has-sub">
         	<a href="#"><span>Energía renovable</span></a>
         	<ul>
         	    <li <?php if ($active_page=="productos") echo " class='active'"; ?>><a href="/energiarenovable"><span>Sistemas Fotovoltaicos</span></a></li>
         	    <li class="boton"><a href="#" onclick="self.frames['contenido'].location.href = 'vde/calentadors.html';"><span>Calentadores de agua Sol Grande</span></a></li>
         	</ul>
         </li>
      </ul>
   </li>
   <li <?php if ($active_page=="novedades") echo " class='active'"; ?>><a href="/novedades"><span>Nuevos productos</span></a></li>
   <li <?php if ($active_page=="servicios") echo " class='active'"; ?>><a href="/servicios"><span>Servicios</span></a></li>
   <li <?php if ($active_page=="oficinas") echo " class='active'"; ?>><a href="/oficinas"><span>Oficinas de ventas</span></a></li>
   <li <?php if ($active_page=="federatas") echo " class='active'"; ?>><a href="/anexo"><span>Lista de precios</span></a></li>
   <li <?php if ($active_page=="tipodecambio") echo " class='active'"; ?>><a href="/tipo-de-cambio"><span>Tipo de cambio</span></a></li>
   <li <?php if ($active_page=="contacto") echo " class='active'"; ?>><a href="/contacto"><span>Contacto</span></a></li>
</ul>