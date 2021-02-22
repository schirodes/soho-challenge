<template>
    <div id="app">
        <header>
            <nav>
                <div class="logo m-15"><img src="/images/logo-soho.png" alt="Logo Soho"></div>
                
                <div class="dropdown m-15">
                    <button type="button" class="d-small mx-5"><i class="material-icons">menu</i></button>
                    <ul>
                        <li><router-link to="/">Inicio</router-link></li>
                        <li><router-link to="/admin" class="text-danger">Administrador</router-link></li>
                        <li><router-link to="#Nosotros">Nosotros</router-link></li>
                        <li><router-link to="#Servicios">Servicios</router-link></li>
                        <li><router-link to="#CExito">Casos de éxito</router-link></li>
                        <li><router-link to="#Unete">Únete al equipo</router-link></li>
                        <li><router-link to="#Contacto">Contacto</router-link></li>
                    </ul>
                </div>
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

        <section class="mt-separador d-flex jc-center align-center">
            <a href="#" class="button">Hablemos de tu proyecto</a>
        </section>

        <footer class="mt-separador">
            <i class="material-icons text-accent icon-center d-small-none">add_location</i>
            <section class="d-flex m-10 jc-start">© <b>2017</b>&nbsp;SOHO internet + humana</section>
            <section class="d-flex m-10 jc-center">
                <a href="#" class="text-accent mx-25 no-decoration">Visítanos</a>
                <a href="#" class="text-accent mx-25 no-decoration">Escríbenos</a>
                <a href="#" class="text-accent mx-25 no-decoration">Llámanos</a>
            </section>
            <section class="d-flex m-10 jc-end">
                <a href="#" class="facebook-color no-decoration mx-15">Facebook</a>
                <a href="#" class="twitter-color no-decoration mx-15">Twitter</a>
                <a href="#" class="linkedin-color no-decoration mx-15">LinkedIn</a>
                <a href="#" class="youtube-color no-decoration mx-15">YouTube</a>
            </section>
        </footer>
    </div>
</template>

<script>
export default {
    
}
</script>