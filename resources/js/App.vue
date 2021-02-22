<template>
    <div>
        <header>
            <nav>
                <div class="logo m-15"><img src="/images/logo-soho.png" alt="Logo Soho"></div>
                
                <ul class="m-15">
                    <li class="selected"><a href="#">Inicio</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Casos de éxito</a></li>
                    <li><a href="#">Únete al equipo</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </nav>
            <section class="center d-small-none">
                <h3 class="my-5">Nos especializamos en</h3>
                <h2 class="text-accent my-5">interfaces digitales que los usuarios aman</h2>
                <a href="#" class="button m-15">Hablemos de tu proyecto</a>

            </section>
            <section class="footer d-small-none">
                <i class="material-icons text-danger">sensors</i> <b>EN DIRECTO</b> - SOHO está presente en el <b>DIGITALBANK MONTEVIDEO</b>. "Experiencia de Usuario" por Alvaro Añón (SEO de Soho).
                <a href="#" class="button mx-10">Ver evento</a>
                <a href="#" class="button transparent transparent">Próximos eventos</a>
            </section>
        </header>

        <router-view />
    </div>
</template>

<script>
export default {
    
}
</script>