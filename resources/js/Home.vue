<template>
    <div>
        <!-- ----- Bloque de información ----- -->
        <section class="d-flex flex-flow-c w-100 text-center jc-center align-center mt-separador"> 
            <h1 class="titulo">17 años de experiencia en pos de tu proyecto</h1>
            <p class="subtitulo">Especializados desde 1996 en usabilidad, experiencia del usuario (UX) y diseño de experiencias de proyectos digitales. Aportamos estrategia e innovación centrada en el usuario y los objetivos de negocio de tu proyecto. Cotrabajando mejoraremos tu tasa conversión, KPI's, ROI y los resultados de la actual publicadad PPC (pay per click)</p>
        </section>

        <div class="container_box">
            <section class="box_info box_1">
                <h3>Estrategía, usabilidad y ux</h3>
                <p>
                Te ofrecemos excelente usabilidad y experiencia del usuario en tu proyecto, junto a una visión innovadora
                </p>
            </section>
            <section class="box_info box_2">
                <h3>Mejoramos la experiencia</h3>
                <p>
                Tangibilizamos tu proyecto digital a través de un diseño centrado en el usuario y técnicas avanzadas
                </p>
            </section>
            <section class="box_info box_3">
                <h3>Medición continua de objetivos</h3>
                <p>
                Implementación, testig con usuarios y medición continua son necesarias para garantizar el exito de tu proyecto
                </p>
            </section>
        </div>

        <!-- ----- Proyectos Destacados ----- -->
        <section class="d-flex flex-flow-c w-100 text-center jc-center align-center mt-separador"> 
            <h1 class="titulo">Proyectos destacados</h1>
            <p class="subtitulo">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh tortor. Etiam facilisis tristique ex, sit amet sagittis neque consequat quis. Mauris vehicula tortor est, non suscipit augue pretium at. Praesent rhoncus nibh justo, egestas finibus odio ultricies non. Duis in massa commodo mi vulputate varius. Integer ultrices neque dui, non sodales nibh viverra in. Quisque dignissim vulputate mi, eget faucibus odio rutrum id. Ut tempus fringilla purus sed congue.</p>
            
            <article class="d-flex flex-flow-c w-100">
                <div class="destacado-block" v-for="(destacado, index) in destacados" :class="{'destacado-invertido' : (index && (index % 2 !== 0))}" :style="{backgroundColor: destacado.color_background}" :key="index">
                    <div class="d-flex display"><img :src="'storage/'+destacado.path_display" alt="Display"></div>
                    <div class="d-flex descripcion">
                        <div class="logo"><img :src="'storage/'+destacado.path_logo" alt="Logo"></div>
                        <div class="line-logo" :style="{backgroundColor: destacado.color_logo}"></div>

                        <h3 class="d-flex my-10" :style="{color: destacado.color_titulo}">{{destacado.titulo}}</h3>
                        <p class="d-flex" :style="{color: destacado.color_parrafo}">{{destacado.parrafo}}</p>

                        <div class="d-flex flex-flow-r my-15" :style="{color: destacado.color_hash}">
                            <i class="material-icons d-flex">local_offer</i>
                            <a href="#" :style="{color: destacado.color_hash}" class="d-flex mx-10" v-for="hash in destacado.destacado_hashes" :key="hash.id">{{hash.hash}}</a>
                        </div>

                        <div class="d-flex my-15">
                            <a href="#" class="button" :style="{color:destacado.color_button_text, backgroundColor:destacado.color_button}">Ver detalles</a>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </div>
</template>

<script>
export default {
    data(){
        return{
            destacados:[]
        }
    },
    mounted(){
        this.getDestacados();
    },
    methods:{
        getDestacados(){
            this.axios.get("/destacados/all")
            .then(response=>{
                this.destacados = JSON.parse(JSON.stringify(response.data.destacados));
            });
        }
    }
}
</script>